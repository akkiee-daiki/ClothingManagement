<?php

namespace App\Http\Controllers;

class BaseController extends Controller
{

    public function __construct()
    {
        $this->SESS_KEY = implode('_', preg_split('/\\\\/', get_class($this)));
    }
}
