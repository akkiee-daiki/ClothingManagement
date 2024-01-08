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
    public function getList(array $input) {
        return $this->brandRepository->getList($input);
    }

    /**
     * 一行取得
     *
     * @param string $brand_id
     * @return mixed
     */
    public function getRecord(string $brand_id) {
        return $this->brandRepository->getRecord($brand_id);
    }

    /**
     * レコード作成
     *
     * @param array $input
     * @return bool
     */
    public function insertRow(array $input) {
        return $this->brandRepository->insertRow($input);
    }

    /**
     * レコード更新
     *
     * @param $brand_id
     * @param array $input
     * @return bool
     */
    public function updateRow($brand_id, array $input) {
        return $this->brandRepository->updateRow($brand_id, $input);
    }

    /**
     * レコード削除
     *
     * @param array $input
     * @return bool
     */
    public function destroyRow(array $input) {
        return $this->brandRepository->destroyRow($input);
    }

}
