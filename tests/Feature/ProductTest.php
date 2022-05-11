<?php

namespace Tests\Feature;

use App\Repositories\ProductRepository;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;
use Faker\Factory as Faker;

class ProductTest extends TestCase
{
    public function setUp(): void
    {
        parent::setUp();

        $this->faker = Faker::create();
        // chuẩn bị dữ liệu test
        $this->products = [
            'name' => $this->faker->name,
            'address' => $this->faker->name,
            'price' => $this->faker->name,
            'description' => $this->faker->name,
            'product_category_id' => $this->faker->name,
            'area' => $this->faker->name,
            'juridical' => $this->faker->name,
            'status' => $this->faker->name,
            'houseDirection' => $this->faker->name,
            'facade' => $this->faker->name,
            'google_map' => $this->faker->name,
            'linkYoutube' => $this->faker->name,
            'user_id' => $this->faker->name,
            'stress_width' => $this->faker->name,
            'province_id' => $this->faker->name,
            'district_id' => $this->faker->name,
            'ward_id' => $this->faker->name,
            'product_start_date' => $this->faker->name,
            'product_end_date' => $this->faker->name,
            'product_open' => $this->faker->name,
            'product_open_date' => $this->faker->name,
            'user_contact_id' => $this->faker->name,
        ];
        // khởi tạo lớp product
        $this->product = new ProductRepository();
    }

    /**
     * A basic unit test store
     *
     * @return void
     */
    public function testStore()
    {
        // Gọi hàm tạo
        $product = $this->product->storeProduct($this->products);
        // Kiểm tra xem kết quả trả về có là thể hiện của lớp Category hay không
        $this->assertInstanceOf(Product::class, $product);
        // Kiểm tra data trả về
        $this->assertEquals($this->product['name'], $product->name);
        $this->assertEquals($this->product['address'], $product->address);
        $this->assertEquals($this->product['price'], $product->price);
        $this->assertEquals($this->product['description'], $product->description);
        $this->assertEquals($this->product['product_category_id'], $product->product_category_id);
        $this->assertEquals($this->product['area'], $product->area);
        $this->assertEquals($this->product['juridical'], $product->juridical);
        $this->assertEquals($this->product['status'], $product->status);
        $this->assertEquals($this->product['facade'], $product->facade);
        $this->assertEquals($this->product['google_map'], $product->google_map);
        $this->assertEquals($this->product['linkYoutube'], $product->linkYoutube);
        $this->assertEquals($this->product['user_id'], $product->user_id);
        $this->assertEquals($this->product['stress_width'], $product->stress_width);
        $this->assertEquals($this->product['province_id'], $product->province_id);
        $this->assertEquals($this->product['district_id'], $product->district_id);
        $this->assertEquals($this->product['ward_id'], $product->ward_id);
        $this->assertEquals($this->product['product_start_date'], $product->product_start_date);
        $this->assertEquals($this->product['product_end_date'], $product->product_end_date);
        $this->assertEquals($this->product['product_start_date'], $product->product_start_date);
        $this->assertEquals($this->product['product_open'], $product->product_open);
        $this->assertEquals($this->product['product_open_date'], $product->product_open_date);
        $this->assertEquals($this->product['user_contact_id'], $product->user_contact_id);
        // Kiểm tra dữ liệu có tồn tại trong cơ sở dữ liệu hay không
        $this->assertDatabaseHas('products', $this->products);
    }
}
