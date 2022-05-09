<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Option extends Model
{
    use HasFactory;
    protected $table = 'options';
    public $timestamps = false;
    protected $fillable = [
        'option_name', 'option_group', 'option_value', 'option_label'
    ]; 
}
