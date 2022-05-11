<?php

namespace App\Repositories;

use App\Product;

class ProductRepository
{
    protected $model;

    public function __construct()
    {
        $this->model = $this->model = app()->make(Product::class);
    }

    // Tạo Product
    public function storeProduct($data) : Product
    {
        $product = $this->model->create($data);

        return $product;
    }

    // Update product
    public function updateProduct($data, $product) : bool
    {
        return $product->update($data);
    }

    // Show product
    // public function showProduct($product_id) : Product
    // {
    //     return $this->model->findOrFail($product_id);
    // }

    // Destroy category
    public function destroyProduct($product) : bool
    {
        return $this->model->delete();
    }
}
