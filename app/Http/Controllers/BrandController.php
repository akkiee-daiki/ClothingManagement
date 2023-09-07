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
        session()->forget($this->SESS_KEY . '.new');

        $input = [];

        $list = $this->brandService->getList($input);

        return view('brand.index')->with([
            'list' => $list,
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

        session()->put($this->SESS_KEY . '.new', 'new');

        return view('brand.create')->with([
            'input' => $input,
            "SESS_KEY" => $this->SESS_KEY
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
            'input' => $input,
            "SESS_KEY" => $this->SESS_KEY
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
        $request->session()->regenerateToken();

        $input = session($this->SESS_KEY . '.input');

        // DB登録
        if (!$this->brandService->insertRow($input)) {
            abort(500);
        }

        session()->flash('message', '登録が完了しました。');
        session()->forget($this->SESS_KEY . '.input');
        session()->forget($this->SESS_KEY . '.new');

        return redirect()->route('brand.index');
    }

    /**
     * 編集入力
     *
     * @param string $brand_id
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View
     */
    public function edit($brand_id)
    {
        $record = $this->brandService->getRecord($brand_id);
        $input = [
          'brand_id' => $brand_id,
          'name' => $record->name
        ];

        return view('brand.create', ['brand_id' => $brand_id])->with([
            'SESS_KEY' => $this->SESS_KEY,
            'brand_id' => $brand_id,
            'input' => $input
        ]);
    }

    /**
     * 編集確認
     *
     * @param string $brand_id
     * @param Request $request
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View
     */
    public function edit_confirm(string $brand_id, Request $request)
    {
        $input = $request->only(['name']);

        session()->put($this->SESS_KEY . '.input', $input);

        return view('brand.confirm')->with([
            'SESS_KEY' => $this->SESS_KEY,
            'brand_id' => $brand_id,
            'input' => $input,
            'SESS_KEY' => $this->SESS_KEY
        ]);
    }

    /**
     * 更新
     *
     * @param string $brand_id
     * @param Request $request
     * @return \Illuminate\Http\RedirectResponse
     */
    public function update(string $brand_id, Request $request)
    {
        $request->session()->regenerateToken();

        $input = session($this->SESS_KEY . '.input');

        if (!$this->brandService->updateRow($brand_id, $input)) {
            abort(500);
        }

        session()->flash('message', '更新が完了しました。');

        return redirect()->route('brand.index');
    }

}
