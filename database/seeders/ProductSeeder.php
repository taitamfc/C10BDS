<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class ProductSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $products = [
            [
                'product_category_id' => 1,
                'province_id' => 1,
                'district_id' => 1,
                'ward_id' => 1,
                'address' => 'Đường Đỗ Mười',
                'name' => 'Bán lô TĐC Bắc Sông Cấm, xã dương quan, vị trí đầu tư chiến lược cực tốt',
                'description' => 'TĐC C13  Bắc Sông Cấm, Dương Quan, Thủy Nguyên, HP<br>Cần chuyển nhượng lô đất rất đẹp trong khu phân lô TĐC Bắc sông cấm, Đường rộng 7m, vỉa hè 3m, khe kĩ thuật 2m. khu dân cư văn hóa, dân trí cao, an ninh tuyệt đối.<br>Vị trí gần sát cầu Nguyễn Trãi, gần Trung tâm hành chính Thành Phố Thủy Nguyên, xung quanh các dự án Bellhome, Centa city, Hoàng Huy Newcity, Vin wonder Vũ Yên<br>Khu vực đầu tư chiến lược cực tốt cả về ngắn hạn và trung hạn.<br>- Hướng : Bắc<br>- Diện tích : 105m, 7x15<br>- Sổ hồng chính chủ<br>- Giá : 6 tỉ 899 triệu có thỏa thuận<br>___________________<br>Tô Hiệu Bất Động Sản Thủy Nguyên<br> Hotline: <span class="hidden-phone hidden-mobile m-cover js__btn-tracking" tracking-id="lead-phone-ldp" tracking-label="loc=Sale-Listing Details-body,prid=33271271" raw="0854.093.999">0854.093.***</span> (sms, facebook, zalo)<br> Chuyên: Đất Tái Định Cư - Đất Đấu Giá - Đất Phân Lô.<br> Website : dothibacsongcam.com.vn<br> Địa Chỉ: Dương Quan, Thuỷ Nguyên, Hải Phòng.',
                'price' => '6.899.000.000',
                'unit' => 'vnd',
                'juridical' => 'red_book_pink_book',//
                'area' => 105,
                'houseDirection' => 'East',//East, West, South, North, Northeast, Northwest, Southeast,  Southwest
                'stress_width' => 7,
                'facade' => 7,
                'product_images' => [
                    'image_url' => 'https://file4.batdongsan.com.vn/resize/745x510/2022/04/17/20220417203716-efd7_wm.jpg',
                    'image_url' => 'https://file4.batdongsan.com.vn/resize/745x510/2022/04/17/20220417203716-d032_wm.jpg',
                    'image_url' => 'https://file4.batdongsan.com.vn/resize/745x510/2022/04/17/20220417203716-a54a_wm.jpg',
                    'image_url' => 'https://file4.batdongsan.com.vn/resize/745x510/2022/04/17/20220417203716-0eb2_wm.jpg'
                ],
                'linkYoutube' => '',
                'branch_id' => 1,
                'user_id' => 1,
                'google_map' => ''
            ],
            [
                'product_category_id' => 1,
                'province_id' => 1,
                'district_id' => 1,
                'ward_id' => 1,
                'address' => 'Xã Lộ 25',
                'name' => 'Chủ ngợp cần bán gấp lô gốc 3 mặt tiền',
                'description' => 'TĐC C13  Bắc Sông Cấm, Dương Quan, Thủy Nguyên, HP<br>Cần chuyển nhượng lô đất rất đẹp trong khu phân lô TĐC Bắc sông cấm, Đường rộng 7m, vỉa hè 3m, khe kĩ thuật 2m. khu dân cư văn hóa, dân trí cao, an ninh tuyệt đối.<br>Vị trí gần sát cầu Nguyễn Trãi, gần Trung tâm hành chính Thành Phố Thủy Nguyên, xung quanh các dự án Bellhome, Centa city, Hoàng Huy Newcity, Vin wonder Vũ Yên<br>Khu vực đầu tư chiến lược cực tốt cả về ngắn hạn và trung hạn.<br>- Hướng : Bắc<br>- Diện tích : 105m, 7x15<br>- Sổ hồng chính chủ<br>- Giá : 6 tỉ 899 triệu có thỏa thuận<br>___________________<br>Tô Hiệu Bất Động Sản Thủy Nguyên<br> Hotline: <span class="hidden-phone hidden-mobile m-cover js__btn-tracking" tracking-id="lead-phone-ldp" tracking-label="loc=Sale-Listing Details-body,prid=33271271" raw="0854.093.999">0854.093.***</span> (sms, facebook, zalo)<br> Chuyên: Đất Tái Định Cư - Đất Đấu Giá - Đất Phân Lô.<br> Website : dothibacsongcam.com.vn<br> Địa Chỉ: Dương Quan, Thuỷ Nguyên, Hải Phòng.',
                'price' => '4.000.000.000',
                'unit' => 'vnd',
                'juridical' => 'red_book_pink_book',//
                'area' => 105,
                'houseDirection' => 'West',//East, West, South, North, Northeast, Northwest, Southeast,  Southwest
                'stress_width' => 7,
                'facade' => 7,
                'product_images' => [
                    'image_url' => 'https://file4.batdongsan.com.vn/resize/745x510/2022/04/15/20220415202357-b09c_wm.jpg',
                    'image_url' => 'https://file4.batdongsan.com.vn/resize/745x510/2022/04/15/20220415202357-29e4_wm.jpg'
                ],
                'linkYoutube' => '',
                'branch_id' => 1,
                'user_id' => 1,
                'google_map' => ''
            ],
            [
                'product_category_id' => 1,
                'province_id' => 1,
                'district_id' => 1,
                'ward_id' => 1,
                'address' => 'Ocean Dunes',
                'name' => 'Bán đất biển Ocean Dune ngay trung tâm thành phố',
                'description' => 'KHU A:<br>A1 140m2 đối diện biệt thự 740m2 10 tỷ 5<br>A2 140m2 mặt tiền mậu thân 15 tỷ<br>A3 140m2 hướng biển 9 tỷ 5<br>A4 140m2 hướng phố gần cv hoà bình 8 tỷ 7<br>A5 140m2 đối diện công viên thể thao 8 tỷ 7<br>A6 100m2 đối diện công viên thể thao 6 tỷ 5 buông sổ<br>A7 105m2 đối diện trường nguyễn trãi 5 tỷ<br>KHU B<br>B3 140m2 hướng biển 9 tỷ 8<br>B4 đối diện công viên hoà bình 11 tỷ<br>B6 140m2 8 tỷ 5<br>KHU C<br>Biệt thự C2 240m2 18 tỷ<br>C6 140m2 view công viên 9 tỷ<br>KHU D<br>Biệt thự D2 240m2 16 tỷ<br>Cặp D3 hướng phố gần ngã tư 9 tỷ5 / lô<br>D3 140m2 hướng biển 9 tỷ 7<br>D4 140m2 hướng phố 8 tỷ 5<br>D5 133m2 7 tỷ 6<br>KHU E<br>E1 140m2 mặt tiền biển đường 30m2 16 tỷ<br>E2 140m2 hướng phố 9 tỷ 7 / lô<br>Cặp E3 hướng biển 19 tỷ / cặp<br>E4 140m2 hướng phố 8 tỷ / lô',
                'price' => '0',
                'unit' => 'agree',
                'juridical' => 'red_book_pink_book',//
                'area' => 140,
                'houseDirection' => 'East',//East, West, South, North, Northeast, Northwest, Southeast,  Southwest
                'stress_width' => 7,
                'facade' => 7,
                'product_images' => [
                    'image_url' => 'https://file4.batdongsan.com.vn/resize/745x510/2022/04/17/20220417200500-9939_wm.jpeg',
                    'image_url' => 'https://file4.batdongsan.com.vn/resize/745x510/2022/04/17/20220417200456-3af6_wm.jpeg'
                ],
                'linkYoutube' => '',
                'branch_id' => 1,
                'user_id' => 1,
                'google_map' => ''
            ]
        ];

        foreach( $products as $product ){
            foreach( $product as $field => $value ){
                $objProduct = new Product();
                if( $field != 'product_images' ){
                    $objProduct->$field = $value;
                }
                $objProduct->save();
                if( $field == 'product_images' ){
                    $objProduct->product_images()->createMany($value);
                }
            }
        }
    }
}
