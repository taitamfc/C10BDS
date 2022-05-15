<?php
if (!function_exists('get_option')) {
    function get_option($key)
    {
        $value = '';
        return $value;
    }
}
if (!function_exists('update_option')) {
    function update_option($key, $value,$group = '')
    {
        $objOption = new \App\Models\Option;
        if( $group ){
            $objOption = $objOption::where('option_group',$group)->where('option_name',$key)->first();
        }else{
            $objOption = $objOption::where('option_name',$key)->first();
        }
        $objOption->option_value = $value;
        $objOption->save();
    }
}
