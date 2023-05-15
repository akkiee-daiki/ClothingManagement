<?php

namespace App\Http\Controllers;

use App\Http\Controllers\BaseController;
use Illuminate\Http\Request;

class BrandController extends BaseController
{
    public function index()
    {
        return view('brand.index');
    }
}
