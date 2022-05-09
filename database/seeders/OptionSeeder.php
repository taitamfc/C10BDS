<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Option;

class OptionSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
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
