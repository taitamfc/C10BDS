<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Auth;
use App\Models\User;
use App\Models\SystemLog;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

class AuthController extends Controller
{
    /**
     * Create a new AuthController instance.
     *
     * @return void
     */
    public function __construct() {
        $this->middleware('auth:api', ['except' => ['login', 'register','forgotPassWord']]);
    }

    /**
     * Get a JWT via given credentials.
     *
     * @return \Illuminate\Http\JsonResponse
     */
    public function login(Request $request){
        
    	$validator = Validator::make($request->all(), [
            'phone' => 'required',
            'password' => 'required|string|min:6',
        ]);

        if ($validator->fails()) {
            return response()->json($validator->errors(), 422);
        }

        $phone = $request->phone;
        $checkUserByPhone = User::where('phone',$phone)->take(1)->first();

        if ($checkUserByPhone && Hash::check($request->password,$checkUserByPhone->password)) {
            $token = auth('api')->login($checkUserByPhone);
            return $this->createNewToken($token);
        }else{
            return response()->json(['error' => 'Unauthorized'], 401);
        }
    }

    /**
     * Register a User.
     *
     * @return \Illuminate\Http\JsonResponse
     */
    public function register(Request $request) {
        $validator = Validator::make($request->all(), [
            'name' => 'required|string|between:2,100',
            'email' => 'required|string|email|max:100|unique:users',
            'password' => 'required|string|min:6',
        ]);

        if($validator->fails()){
            return response()->json($validator->errors()->toJson(), 400);
        }

        $user = User::create(array_merge(
                    $validator->validated(),
                    ['password' => bcrypt($request->password)]
                ));

        return response()->json([
            'message' => 'User successfully registered',
            'user' => $user
        ], 201);
    }


    /**
     * Log the user out (Invalidate the token).
     *
     * @return \Illuminate\Http\JsonResponse
     */
    public function logout() {
        auth('api')->logout();

        return response()->json(['message' => 'User successfully signed out']);
    }

    /**
     * Refresh a token.
     *
     * @return \Illuminate\Http\JsonResponse
     */
    public function refresh() {
        return $this->createNewToken(auth('api')->refresh());
    }

    /**
     * Get the authenticated User.
     *
     * @return \Illuminate\Http\JsonResponse
     */
    public function userProfile() {
        $userId = auth('api')->user()->id;
        $user = User::with('userGroup')->where('id',$userId)->first();

        $total_sold = DB::table('products')->where('sold_by_user_id',$userId)->count();
        $total_customer = DB::table('customers')->where('user_id',$userId)->count();
        $user->total_sold = $total_sold;
        $user->total_customer = $total_customer;

        return response()->json($user);
    }

    /**
     * Get the token array structure.
     *
     * @param  string $token
     *
     * @return \Illuminate\Http\JsonResponse
     */
    protected function createNewToken($token){
        return response()->json([
            'access_token' => $token,
            'token_type' => 'bearer',
            'expires_in' => auth('api')->factory()->getTTL() * 600,
            'user' => auth('api')->user()
        ]);
    }

    public function changeNotification(Request $request) {
        $userId = auth('api')->user()->id;
        $user = User::where('id', $userId)->update(
            ['receiveNotification' => ($request->status) ? 1 : 0]
        );

        return response()->json([
            'message' => 'User successfully changed notification',
            'user' => $user,
        ], 201);
    }
    public function changePassWord(Request $request) {
        $userId = auth('api')->user()->id;

        if (Hash::check($request->current_password,auth('api')->user()->password)) {
            $user = User::where('id', $userId)->update(
                ['password' => Hash::make($request->new_password)]
            );
    
            return response()->json([
                'message'   => 'Thay đổi mật khẩu thành công',
                'status'    => 1,
            ], 201);
        }else{
            return response()->json([
                'message'   => 'Mật khẩu hiện tại không đúng.',
                'status'    => 0,
            ], 201);
        }
    }
    public function forgotPassWord(Request $request) {
        $SystemLog = new SystemLog();
        $SystemLog->type = 'UserForgot';
        $SystemLog->data = $request->phone .' vừa yêu cầu lấy lại mật khẩu !';
        $saved = $SystemLog->save();
        if ( $saved ) {
            return response()->json([
                'message'   => 'Yêu cầu đổi mật khẩu thành công',
                'status'    => 1,
            ], 201);
        }else{
            return response()->json([
                'message'   => 'Yêu cầu đổi mật khẩu thất bại.',
                'status'    => 0,
            ], 201);
        }
    }
}
