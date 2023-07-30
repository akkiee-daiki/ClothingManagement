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

    /**
     * 一覧
     *
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View
     */
    public function index()
    {
        session()->forget($this->SESS_KEY . '.input');

        $input = [];

        $list = $this->brandService->getList($input);
        var_dump($list);

        return view('brand.index')->with([
            'list' => $list
        ]);
    }

    /**
     * 新規作成入力
     *
     * @param Request $request
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View
     */
    public function create(Request $request)
    {
        $input = session($this->SESS_KEY . '.input') ?? [];
        return view('brand.create')->with([
            'input' => $input
        ]);
    }

    /**
     * 新規作成確認
     *
     * @param BrandRequest $request
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View
     */
    public function create_confirm(BrandRequest $request)
    {
        $input = $request->only(['name']);

        session()->put($this->SESS_KEY . '.input', $input);

        return view('brand.confirm')->with([
            'input' => $input
        ]);
    }

    /**
     * 新規作成登録
     *
     * @param Request $request
     * @return \Illuminate\Http\RedirectResponse
     */
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

    /**
     * 編集入力
     *
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View
     */
    public function edit()
    {
        return view('brand.create');
    }

    /**
     * 編集確認
     *
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View
     */
    public function edit_confirm()
    {
        return view('brand.create_confirm');
    }

    /**
     * 更新
     *
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View
     */
    public function update()
    {
        return view('brand.update');
    }


}
