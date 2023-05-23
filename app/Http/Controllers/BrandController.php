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

    }
}
