<?php

namespace Tests\Feature;

use App\Models\Product;
use App\Repositories\ProductRepository;
use Tests\TestCase;
use Faker\Factory as Faker;
use Illuminate\Support\Facades\Log;

class ProductTest extends TestCase
{
    // public function setUp(): void
    // {
    //     parent::setUp();

    //     $this->faker = Faker::create();
    //     // chuẩn bị dữ liệu test
    //     $this->products = [
    //         'name' => $this->faker->name,
    //         'address' => $this->faker->name,
    //         'price' => rand(50000000,50000000000),
    //         'description' => $this->faker->name,
    //         'product_category_id' => rand(1,2),
    //         'area' => rand(65,232),
    //         'juridical' => $this->faker->name,
    //         'unit' => $this->faker->name,
    //         'status' => $this->faker->name,
    //         'houseDirection' => $this->faker->name,
    //         'facade' => rand(7,12),
    //         'google_map' => $this->faker->name,
    //         'branch_id' => rand(1,2),
    //         'linkYoutube' => $this->faker->name,
    //         'user_id' => rand(1,2),
    //         'stress_width' => rand(7,10),
    //         'province_id' => rand(1,2),
    //         'district_id' => rand(1,2),
    //         'ward_id' => rand(1,2),
    //         'sold_by_user_id' => rand(1,2),
    //         'product_type' => $this->faker->name,
    //         'product_hot' => $this->faker->name,
    //         'product_start_date' => $this->faker->date,
    //         'product_end_date' => $this->faker->date,
    //         'product_open' => rand(0,1),
    //         'product_open_date' => $this->faker->date,
    //         'user_contact_id' => rand(1,2),
    //     ];
    //     // khởi tạo lớp product
    //     $this->product = new ProductRepository();
    // }

    /**
     * A basic unit test store
     *
     * @return void
     */
    // public function testStore()
    // {
    //     // Gọi hàm tạo
    //     $product = $this->product->storeProduct($this->products);
    //     // Kiểm tra xem kết quả trả về có là thể hiện của lớp Category hay không
    //     $this->assertInstanceOf(Product::class, $product);
    //     // Kiểm tra data trả về
    //     $this->assertEquals($this->product['name'], $product->name);
    //     $this->assertEquals($this->product['address'], $product->address);
    //     $this->assertEquals($this->product['price'], $product->price);
    //     $this->assertEquals($this->product['description'], $product->description);
    //     $this->assertEquals($this->product['product_category_id'], $product->product_category_id);
    //     $this->assertEquals($this->product['area'], $product->area);
    //     $this->assertEquals($this->product['juridical'], $product->juridical);
    //     $this->assertEquals($this->product['unit'], $product->unit);
    //     $this->assertEquals($this->product['status'], $product->status);
    //     $this->assertEquals($this->product['houseDirection'], $product->houseDirection);
    //     $this->assertEquals($this->product['facade'], $product->facade);
    //     $this->assertEquals($this->product['google_map'], $product->google_map);
    //     $this->assertEquals($this->product['branch_id'], $product->branch_id);
    //     $this->assertEquals($this->product['linkYoutube'], $product->linkYoutube);
    //     $this->assertEquals($this->product['user_id'], $product->user_id);
    //     $this->assertEquals($this->product['stress_width'], $product->stress_width);
    //     $this->assertEquals($this->product['province_id'], $product->province_id);
    //     $this->assertEquals($this->product['district_id'], $product->district_id);
    //     $this->assertEquals($this->product['ward_id'], $product->ward_id);
    //     $this->assertEquals($this->product['sold_by_user_id'], $product->sold_by_user_id);
    //     $this->assertEquals($this->product['product_type'], $product->product_type);
    //     $this->assertEquals($this->product['product_hot'], $product->product_hot);
    //     $this->assertEquals($this->product['product_start_date'], $product->product_start_date);
    //     $this->assertEquals($this->product['product_end_date'], $product->product_end_date);
    //     $this->assertEquals($this->product['product_open'], $product->product_open);
    //     $this->assertEquals($this->product['product_open_date'], $product->product_open_date);
    //     $this->assertEquals($this->product['user_contact_id'], $product->user_contact_id);
    //     // Kiểm tra dữ liệu có tồn tại trong cơ sở dữ liệu hay không
    //     $this->assertDatabaseHas('products', $this->products);
    // }

    public function testStoreRequireds(){
        $this->faker = Faker::create();
        /*
        'name' => 'required',
        'address' => 'required',
        'price' => 'required',
        'description' => 'required',
        'area' => 'required',
        'juridical' => 'required',
        'unit' => 'required',
        'status' => 'required',
        'houseDirection' => 'required',
        'facade' => 'required',
        'stress_width' => 'required',
        'product_category_id' => 'required',
        'province_id' => 'required',
        'district_id' => 'required',
        'ward_id' => 'required',
        'product_type' => 'required',
    */
        $product = new Product();
        // $old_product = $product;
        $product->name = $this->faker->name;
        $product->address = $this->faker->address;
        $product->price = rand(50000000,50000000000);
        $product->description = $this->faker->text;
        $product->area = rand(65,232);
        $product->juridical = 'red_book_pink_book';
        $product->unit = 'VND';
        $product->status = 'selling';
        $product->houseDirection = 'West';
        $product->facade = rand(7,12);
        $product->stress_width = rand(7,10);
        $product->product_category_id = rand(1,2);
        $product->province_id = rand(1,2);
        $product->district_id = rand(1,2);
        $product->ward_id = rand(1,2);
        $product->product_type = 'Block';
        $product->branch_id = 1;
        $product->user_id = 1;
        try {
            $product->save();
            $this->assertTrue(true);
        } catch (\Exception $e) {
            Log::error($e->getMessage());
            $this->assertTrue(false);
        }

        // $product->price = '';
        // $product->description = '';
        // $product->product_category_id = '';
        // $product->area = '';
        // $product->unit = '';
        // $product->houseDirection ='';
        // $product->facade ='';
        // $product->status ='';
        // $product->juridical ='';
        // $product->google_map ='';
        // $product->linkYoutube ='';
        // $product->stress_width ='';
        // $product->province_id ='';
        // $product->ward_id ='';
        // $product->district_id ='';
        // $product->product_type ='';
        // $product->product_hot ='';
        // $product->product_start_date ='';
        // $product->product_end_date ='';
        // $product->product_open ='';
        // $product->product_open_date ='';
        // $product->user_contact_id ='';
    }
}
