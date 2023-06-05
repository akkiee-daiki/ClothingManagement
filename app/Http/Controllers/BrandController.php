<?php

namespace App\Http\Controllers;

use App\Http\Controllers\BaseController;
use Illuminate\Http\Request;

class BrandController extends BaseController
{
    protected string $SESS_KEY;

    public function __construct()
    {
        parent::__construct();
    }

    public function index()
    {
        return view('brand.index');
    }

    public function create()
    {
        return view('brand.create');
    }

    public function create_confirm()
    {
        return view('brand.confirm');
    }

    public function store()
    {
        return view('brand.store');
    }

    public function edit()
    {
        return view('brand.create');
    }

    public function edit_confirm()
    {
        return view('brand.create_confirm');
    }

    public function update()
    {
        return view('brand.update');
    }


}
