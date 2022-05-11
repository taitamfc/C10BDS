<?php

namespace Database\Seeders;

use App\Models\Branch;
use App\Models\Customer;
use App\Models\ProductImage;
use App\Models\Product;
use App\Models\ProductCategory;
use App\Models\User;
use App\Models\UserGroup;
use App\Models\Option;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        $this->importProductCategories();
        $this->importRoles();
        $this->importBranches();
        $this->importUserGroups();
        $this->importUsers();
        $this->importProducts();
        $this->importUserGroupRoles();
        $this->importCustomers();
        $this->importConfigs();
    }
    public function importProductCategories()
    {
        // $product_categories = [
        //     [
        //         'name' => 'Đất công nghiệp',
        //     ]
        // ];
        // foreach ($product_categories as $productCategory) {
        //     $objproductCategory = new ProductCategory();
        //     foreach ($productCategory as $field => $value) {
        //         $objproductCategory->$field = $value;
        //     }
        //     $objproductCategory->save();
        // }
        $product_category = new ProductCategory();
        $product_category->name = 'Đất công nghiệp';
        $product_category->save();
        $product_category = new ProductCategory();
        $product_category->name = 'Đất thổ cư';
        $product_category->save();
    }
    public function importRoles()
    {
        $groups     = ['Branch', 'Product', 'Customer', 'ProductCategory', 'User', 'UserGroup','Customer','Config','SystemLog'];
        $actions    = ['viewAny', 'view', 'create', 'update', 'delete', 'restore', 'forceDelete'];
        foreach ($groups as $group) {
            foreach ($actions as $action) {
                DB::table('roles')->insert([
                    'group_name' => $group,
                    'name' => $group . '_' . $action,

                ]);
            }
        }
    }
    public function importBranches()
    {
        $branch = new Branch();
        $branch->name = 'Quảng Trị';
        $branch->address = 'Quảng Trị';
        $branch->phone = '0977983360';
        $branch->province_id = 1;
        $branch->district_id = 3;
        $branch->ward_id = 4;
        $branch->save();


        $branch = new Branch();
        $branch->name = 'Đà Nẵng';
        $branch->address = 'Đà Nẵng';
        $branch->phone = '0164851161';
        $branch->province_id = 8;
        $branch->district_id = 1;
        $branch->ward_id = 7;
        $branch->save();


        $branch = new Branch();
        $branch->name = 'Quảng Bình';
        $branch->address = 'Quảng Bình';
        $branch->phone = '0979061738';
        $branch->province_id = 6;
        $branch->district_id = 7;
        $branch->ward_id = 1;
        $branch->save();
    }
    public function importUserGroups()
    {
        $userGroup = new UserGroup();
        $userGroup->name = 'Supper Admin';
        $userGroup->description = '';
        $userGroup->save();
        $userGroup = new UserGroup();
        $userGroup->name = 'Quản Lý';
        $userGroup->description = '';
        $userGroup->save();
        $userGroup = new UserGroup();
        $userGroup->name = 'Nhân Viên';
        $userGroup->description = '';
        $userGroup->save();
    }
    public function importUsers()
    {
        $user = new User();
        $user->name = 'Admin';
        $user->email = 'admin@gmail.com';
        $user->password = Hash::make('123456');
        $user->day_of_birth = '1995/11/15';
        $user->phone = '0123456789';
        $user->address = 'Quảng Trị';
        $user->start_day = '2021/10/29';
        $user->user_group_id  = 1;
        $user->branch_id  = 1;
        $user->note = '123';
        $user->province_id  = '30';
        $user->district_id  = '343';
        $user->ward_id  = '6192';
        $user->gender = 'Nam';
        $user->avatar = 'https://e7.pngegg.com/pngimages/348/800/png-clipart-man-wearing-blue-shirt-illustration-computer-icons-avatar-user-login-avatar-blue-child.png';
        $user->save();

        $user = new User();
        $user->name = 'Mai Chiếm An';
        $user->email = 'an@gmail.com';
        $user->password = Hash::make('123456');
        $user->day_of_birth = '2003/06/27';
        $user->phone = '0916663237';
        $user->address = 'Quảng Trị';
        $user->start_day = '2021/10/29';
        $user->user_group_id  = '1';
        $user->branch_id  = '1';
        $user->note = '123';
        $user->province_id  = '30';
        $user->district_id  = '335';
        $user->ward_id  = '6083';
        $user->gender = 'Nam';
        $user->avatar = 'https://e7.pngegg.com/pngimages/348/800/png-clipart-man-wearing-blue-shirt-illustration-computer-icons-avatar-user-login-avatar-blue-child.png';

        $user->save();

        $user = new User();
        $user->name = 'Đặng Thùy Ngân';
        $user->email = 'ngan@gmail.com';
        $user->password = Hash::make('123456');
        $user->day_of_birth = '2002/05/22';
        $user->phone = '0977983360';
        $user->address = 'Quảng Trị';
        $user->start_day = '2021/10/29';
        $user->user_group_id  = '2';
        $user->branch_id  = '2';
        $user->note = '123';
        $user->province_id  = '30';
        $user->district_id  = '343';
        $user->ward_id  = '6199';
        $user->gender = 'Nữ';
        $user->avatar = 'https://e7.pngegg.com/pngimages/348/800/png-clipart-man-wearing-blue-shirt-illustration-computer-icons-avatar-user-login-avatar-blue-child.png';

        $user->save();

        $user = new User();
        $user->name = 'Võ Văn Tuấn';
        $user->email = 'tuan@gmail.com';
        $user->password = Hash::make('123456');
        $user->day_of_birth = '2002/04/24';
        $user->phone = '0777333274';
        $user->address = 'Quảng Trị';
        $user->start_day = '2021/10/29';
        $user->user_group_id  = '3';
        $user->branch_id  = '3';
        $user->note = '123';
        $user->province_id  = '30';
        $user->district_id  = '342';
        $user->ward_id  = '6183';
        $user->gender = 'Nam';
        $user->avatar = 'https://e7.pngegg.com/pngimages/348/800/png-clipart-man-wearing-blue-shirt-illustration-computer-icons-avatar-user-login-avatar-blue-child.png';

        $user->save();
    }
    public function importProducts()
    {
        $products = [
            'Chính chủ bán gấp đất mặt biển Bình Thuận 1,5r/m2, có đường quy hoạch 30m cắt ngang trước đất',
            'Hiếm, đất nền Hòa Lạc, gần công nghệ cao, ĐH FPT, đường lớn 10m + vỉa hè 5m, sổ đỏ trọn đời',
            'Đất giá F0 chỉ từ 660tr/nền thổ cư view đồi, hạ tầng đầy đủ, sổ hồng cầm tay. Bán nhanh trong ngày',
            'Chính Chủ cần bán khu nhà đất mặt biển view cực kỳ đẹp ngay trung tâm TP. Quy Nhơn. LH: 0982000***',
            'Chính chủ cần bán 700m2 đất MT đường Hưng Nhơn,Tân Kiên,Bình Chánh giá tốt. LH chính chủ 0976827***',
            'Ôm nguồn đất chính chủ giá đầu tư 445tr - 630tr',
            'Block 5 lô Vĩnh Thái',
            'Block 8 lô Gio Linh',
            'Bán đất biển Ocean Dune ngay trung tâm thành phố'
        ];

        $fields = [
            'address' => 'Ocean Dunes',
            'description' => 'KHU A: A1 140m2 đối diện biệt thự 740m2 10 tỷ 5<br>A2',
            'price' => 995256,
            'product_category_id' => 1,
            'province_id' => 1,
            'district_id' => 1,
            'ward_id' => 1,
            'unit' => 'agree',
            'status' => 'selling',
            'juridical' => array_rand(array_flip(['red_book_pink_book', 'waiting_book'])),
            'area' => rand(5, 15),
            'houseDirection' => array_rand(array_flip(['East', 'West', 'South', 'North', 'Northeast', 'Northwest', 'Southeast',  'Southwest'])),
            'stress_width' => rand(5, 15),
            'facade' => rand(5, 15),
            'linkYoutube' => 'https://file4.batdongsan.com.vn/resize/745x510/2022/04/17/20220417200500-9939_wm.jpeg',
            'branch_id' => 1,
            'user_id' => 1,
            'google_map' => 'Quảng Trị là tỉnh ven biển thuộc vùng Bắc Trung Bộ Việt Nam. Phía bắc giáp tỉnh Quảng Bình, phía nam giáp tỉnh Thừa Thiên-Huế,',
            'product_type' => array_rand( array_flip(['Regular','Block','Consignment'])),
            'product_hot' => array_rand([0,1]),
            'product_open' => array_rand([0,1]),
            'product_start_date' => date('Y-m-d'),
            'product_open_date' => date('Y-m-d'),
            'product_end_date' => date('Y-m-d', strtotime('+10 days')),
            'product_images' => [
                'https://file4.batdongsan.com.vn/resize/745x510/2022/04/17/20220417200500-9939_wm.jpeg',
                'https://file4.batdongsan.com.vn/2022/04/05/20220405105613-203d_wm.jpg',
            ]
        ];

        $product_images = [];
        foreach ($products as $product) {
            $objProduct = new Product();
            $objProduct->name = $product;
            foreach ($fields as $field => $value) {
                if ($field != 'product_images') {
                    $objProduct->$field = $value;
                }
            }
            $objProduct->save();
            $product_images = $fields['product_images'];
            foreach ($product_images as $product_image) {
                $objProductImage = new ProductImage();
                $objProductImage->product_id = $objProduct->id;
                $objProductImage->image_url = $product_image;
                $objProductImage->save();
            }
        }
    }
    public function importUserGroupRoles()
    {
        for ($i = 1; $i <= 63; $i++) {
            DB::table('user_group_role')->insert([
                'user_group_id' => 1,
                'role_id' => $i,
            ]);
        }
    }
    public function importCustomers()
    {
        $Customer = new Customer();
        $Customer->name = 'NGUYEN THI HUYEN TRANG';
        $Customer->address = 'Thanh Hóa';
        $Customer->phone = '0977983360';
        $Customer->user_id = 1;
        $Customer->save();
    }
    public function importConfigs()
    {
        $configs = [
            [
                'option_name'  => 'site_logo',
                'option_group' => 'General',
                'option_value' => 'images/logo.png',
                'option_label' => 'Logo',
                'option_type'  => 'text',
            ],
            [
                'option_name'  => 'site_name',
                'option_group' => 'General',
                'option_value' => 'Quang Group',
                'option_label' => 'Tên ứng dụng',
                'option_type'  => 'text',
            ]
        ];
        foreach( $configs as $config ){
            $objConfig = new Option();
            foreach( $config as $field => $value ){
                $objConfig->$field = $value;
            }
            $objConfig->save();
        }   
    }
}
