<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Option;

class ConfigController extends Controller
{
    public function index()
    {
        $options = Option::all();
        $option_groups = [];
        foreach( $options as $option ){
            $option_groups[$option->option_group][] = $option;
        }
        return view('admin.configs.index',compact('option_groups'));
    }

    public function store(Request $request)
    {
        
        $configs = $request->all();
        unset($configs['_token']);
        foreach( $configs as $config_group => $config_options){
            foreach( $config_options as $option_name => $option_value ){
                update_option($option_name, $option_value,$config_group);
            }
        }
        return redirect()->back();

    }
}
