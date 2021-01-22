<?php

namespace App\Http\Controllers;

use App\Brand;
use Illuminate\Http\Request;

class BrandController extends Controller
{
    public function addBrand()
    {
        $brand = [
            ['brand_name'=>'Apple'],
            ['brand_name'=>'Samsung'],
            ['brand_name'=>'Huawei'],
            ['brand_name'=>'Honor'],
            ['brand_name'=>'Xiaomi'],
            ['brand_name'=>'Oppo'],
            ['brand_name'=>'realme'],
            ['brand_name'=>'Acer'],
            ['brand_name'=>'Asus'],
            ['brand_name'=>'Lenovo'],
            ['brand_name'=>'Dell'],
            ['brand_name'=>'Hp'],
            ['brand_name'=>'MSI'],
            ['brand_name'=>'Sony'],
            ['brand_name'=>'LG'],
            ['brand_name'=>'Sharp'],
            ['brand_name'=>'Philips'],
        ];
        Brand::insert($brand);
        return "Brand has been added ! ! !";
    }
}
