<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class BaseController extends Controller
{
    protected string $SESS_KEY;

    public function __construct(string $SESS_KEY)
    {
        $SESS_KEY = implode('_', preg_split('/\\\\/', get_class($this)));
    }
}
