<?php

namespace Database\Seeders;

use App\Models\Branch;
use App\Models\Customer;
use App\Models\Product;
use App\Models\ProductCategory;
use App\Models\User;
use App\Models\UserGroup;
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
    }
    public function importProductCategories()
    {
        $product_categories = [
            [
                'name' => 'Đất công nghiệp',
            ]
        ];
        foreach ($product_categories as $productCategory) {
            $objproductCategory = new ProductCategory();
            foreach ($productCategory as $field => $value) {
                $objproductCategory->$field = $value;
            }
            $objproductCategory->save();
        }
    }
    public function importRoles()
    {
        $groups     = ['Branch'];
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
        $branch->id = 1;
        $branch->name = 'Chi nhánh 1';
        $branch->address = 'Thanh Hóa';
        $branch->phone = '0977983360';
        $branch->province_id = 1;
        $branch->district_id = 3;
        $branch->ward_id = 4;
        $branch->save();


        $branch = new Branch();
        $branch->id = 2;
        $branch->name = 'Chi nhánh 2';
        $branch->address = 'Nghệ An';
        $branch->phone = '0164851161';
        $branch->province_id = 8;
        $branch->district_id = 1;
        $branch->ward_id = 7;
        $branch->save();


        $branch = new Branch();
        $branch->id = 3;
        $branch->name = 'Chi nhánh 3';
        $branch->address = 'Hà Tĩnh';
        $branch->phone = '0979061738';
        $branch->province_id = 6;
        $branch->district_id = 7;
        $branch->ward_id = 1;
        $branch->save();


        $branch = new Branch();
        $branch->id = 4;
        $branch->name = 'Chi nhánh 4';
        $branch->address = 'Quảng Bình';
        $branch->phone = '0854383246';
        $branch->province_id = 2;
        $branch->district_id = 9;
        $branch->ward_id = 5;
        $branch->save();
    }
    public function importUserGroups()
    {
        $userGroup = new UserGroup();
        $userGroup->name = 'Nhóm 1';
        $userGroup->description = '5 thành viên';
        $userGroup->save();
        $userGroup = new UserGroup();
        $userGroup->name = 'Nhóm 2';
        $userGroup->description = '7 thành viên';
        $userGroup->save();
        $userGroup = new UserGroup();
        $userGroup->name = 'Nhóm 3';
        $userGroup->description = '15 thành viên';
        $userGroup->save();
        $userGroup = new UserGroup();
        $userGroup->name = 'Nhóm 4';
        $userGroup->description = '13 thành viên';
        $userGroup->save();
    }
    public function importUsers()
    {
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
        $user->save();

        $user = new User();
        $user->name = 'Lê Biên Thùy';
        $user->email = 'thuy@gmail.com';
        $user->password = Hash::make('123456');
        $user->day_of_birth = '1995/11/15';
        $user->phone = '01648511610';
        $user->address = 'Quảng Trị';
        $user->start_day = '2021/10/29';
        $user->user_group_id  = '4';
        $user->branch_id  = '4';
        $user->note = '123';
        $user->province_id  = '30';
        $user->district_id  = '343';
        $user->ward_id  = '6192';
        $user->gender = 'Nam';
        $user->save();

        $user = new User();
        $user->name = 'Admin';
        $user->email = 'admin@gmail.com';
        $user->password = Hash::make('123456');
        $user->day_of_birth = '1995/11/15';
        $user->phone = '01648511610';
        $user->address = 'Quảng Trị';
        $user->start_day = '2021/10/29';
        $user->user_group_id  = 1;
        $user->branch_id  = 1;
        $user->note = '123';
        $user->province_id  = '30';
        $user->district_id  = '343';
        $user->ward_id  = '6192';
        $user->gender = 'Nam';
        $user->save();
    }
    public function importProducts()
    {
        $products = [
            [
                'name' => 'Bán đất biển Ocean Dune ngay trung tâm thành phố',
                'address' => 'Ocean Dunes',
                'description' => 'KHU A: A1 140m2 đối diện biệt thự 740m2 10 tỷ 5<br>A2',
                'price' => 995256,
                'product_category_id' => 1,
                'province_id' => 1,
                'district_id' => 1,
                'ward_id' => 1,
                'unit' => 'agree',
                'status' => 'draft',
                'juridical' => 'red_book_pink_book',
                'area' => 140,
                'houseDirection' => 'East', //East, West, South, North, Northeast, Northwest, Southeast,  Southwest
                'stress_width' => 7,
                'facade' => 7,
                'linkYoutube' => 'https://file4.batdongsan.com.vn/resize/745x510/2022/04/17/20220417200500-9939_wm.jpeg',
                'branch_id' => 1,
                'user_id' => 1,
                'google_map' => 'East, West, South, North, Northeast, Northwest, Southeast,  Southwest',
                'product_type' => 'Sản phẩm thường',
                'product_hot' => '0',
                'product_start_date' => '2000-01-01',
                'product_end_date' => '2000-01-01'
            ]
        ];

        foreach ($products as $product) {
            $objProduct = new Product();
            foreach ($product as $field => $value) {
                $objProduct->$field = $value;
            }
            $objProduct->save();
        }
    }
    public function importUserGroupRoles()
    {
        for ($i = 1; $i <= 7; $i++) {
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
        $Customer->email = 'trang@gmail.com';
        $Customer->address = 'Thanh Hóa';
        $Customer->phone = '0977983360';
        $Customer->save();
    }
}
