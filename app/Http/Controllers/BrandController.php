<?php

namespace App\Http\Controllers;

use App\Http\Controllers\BaseController;
use Illuminate\Http\Request;

class BrandController extends BaseController
{

    public function __construct(string $SESS_KEY)
    {
        parent::__construct($SESS_KEY);
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
