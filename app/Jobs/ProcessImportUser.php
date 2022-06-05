<?php

namespace App\Jobs;

use App\Models\User;
use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldBeUnique;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Foundation\Bus\Dispatchable;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Queue\SerializesModels;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Log;

class ProcessImportUser implements ShouldQueue
{
    use Dispatchable, InteractsWithQueue, Queueable, SerializesModels;

    protected $row;
    protected $user_group_id;
    protected $branch_id;

    /**
     * Create a new job instance.
     *
     * @return void
     */
    public function __construct($row,$user_group_id,$branch_id)
    {
        $this->row = $row;
        $this->user_group_id = $user_group_id;
        $this->branch_id = $branch_id;
    }

    /**
     * Execute the job.
     *
     * @return void
     */
    public function handle()
    {
        $phone = $this->row[2];
            $checkPhone = User::where('phone',$phone)->first();
            if($checkPhone ){
                $user = $checkPhone;
            }else{
                $user = new User();
            }
            $user->name             = $this->row[1];
            $user->gender           = 'male';
            $user->address          = 'Quảng trị';
            $user->email            = $this->row[2].'@gmail.com';
            $user->phone            = '0'.$this->row[2];
            $user->password         = Hash::make(123456);
            $user->user_group_id    = $this->user_group_id;
            $user->branch_id        = $this->branch_id;
            $user->province_id      = 1;
            $user->district_id      = 1;
            $user->ward_id          = 1;
            $user->note             = $this->row[3];
            try {
                $user->save();
            } catch (\Exception $e) {
                Log::error($e->getMessage());
            }
            
    }
}
