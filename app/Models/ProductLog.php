<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class ProductLog extends Model
{
    use HasFactory, SoftDeletes;
    protected $table = 'product_logs';
    protected static $logAttributes = ['name'];
    protected static $logName = 'product_logs';
    public $timestamps = true;

    public function getDescriptionForEvent(string $eventName): string
    {
        return "Product Log has been {$eventName}";
    }
    /**
     * The attributes that are mass assignable.
     *
     * @var product()
     * @var user()
     * 
     */

    public function product()
    {
        return $this->belongsTo(Product::class, 'product_id', 'id');
    }
    public function user()
    {
        return $this->belongsTo(User::class, 'user_id', 'id');
    }
    public function fetchAll()
    {
        return $this->model->with('product', 'user')->get();
    }
}
