<?php

namespace App\Services;

use App\Repositories\BrandRepository;

class BrandService
{
    public function __construct(private BrandRepository $brandRepository)
    {
    }

    /**
     * 一覧取得
     *
     * @param array $input
     * @return \Illuminate\Support\Collection
     */
    public function getList($input) {
        return $this->brandRepository->getList($input);
    }

    /**
     * レコード作成
     *
     * @param array $input
     * @return bool
     */
    public function insertRow($input) {
        return $this->brandRepository->insertRow($input);
    }

}
