<?php

namespace App\Http\Controllers;

use App\Services\BrandService;
use Illuminate\Http\Request;
use App\Http\Requests\BrandRequest;

class BrandController extends BaseController
{
    protected string $SESS_KEY;

    public function __construct(private BrandService $brandService)
    {
        parent::__construct();
    }

    public function index()
    {
        session()->forget($this->SESS_KEY . '.input');

        return view('brand.index');
    }

    public function create(Request $request)
    {
        $input = session($this->SESS_KEY . '.input') ?? [];
        return view('brand.create')->with([
            'input' => $input
        ]);
    }

    public function create_confirm(BrandRequest $request)
    {
        $input = $request->only(['name']);

        session()->put($this->SESS_KEY . '.input', $input);

        return view('brand.confirm')->with([
            'input' => $input
        ]);
    }

    public function store(Request $request)
    {
        // 二重登録禁止
        $input = session($this->SESS_KEY . '.input');

        // DB登録
        if (!$this->brandService->insertRow($input)) {
            abort(500);
        }

        session()->flash('message', '登録が完了しました。');
        session()->forget($this->SESS_KEY . '.input');

        return redirect()->route('brand.index');
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
