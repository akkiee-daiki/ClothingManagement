<?php

namespace App\Repositories;

use Carbon\CarbonImmutable;
use Illuminate\Support\Facades\DB;

class BrandRepository
{

    /**
     * 一覧取得
     *
     * @param array $input
     * @return \Illuminate\Support\Collection
     */
    public function getList($input) {
        return DB::table('brand')
            ->select([
                'brand_id',
                'name',
                'Japanese_name'
            ])
            ->whereNull('deleted_at')
            ->get();
    }

    /**
     * 1レコード取得
     *
     * @param string $brand_id
     * @return \Illuminate\Database\Eloquent\Model|\Illuminate\Database\Query\Builder|object|null
     */
    public function getRecord(string $brand_id) {
        return DB::table('brand')
            ->where('brand_id', $brand_id)
            ->whereNull('deleted_at')
            ->first();
}

    /**
     * 新規登録
     *
     * @param array $input
     * @return bool
     */
    public function insertRow($input) {

        DB::beginTransaction();
        try {

            $now = CarbonImmutable::now();

            DB::table('brand')->insert([
                'name'          => $input['name'],
                'Japanese_name' => $input['Japanese_name'],
                'created_at'    => $now,
                'updated_at'    => $now
            ]);

            DB::commit();
            return true;
        } catch (\Exception $e) {

            DB::rollBack();
            return false;
        }
    }

    /**
     * 更新
     *
     * @param $brand_id
     * @param $input
     * @return bool
     */
    public function updateRow($brand_id, $input) {
        DB::beginTransaction();
        try {

            $input['updated_at'] = CarbonImmutable::now();

            DB::table('brand')
                ->where('brand_id', $brand_id)
                ->whereNull('deleted_at')
                ->update($input);

            DB::commit();
            return true;
        } catch (\Exception $e) {

            DB::rollBack();
            return false;
        }
    }

    /**
     * 削除
     *
     * @param array $input
     * @return bool
     */
    public function destroyRow(array $input) {
        $brand_id = $input['brand_id'];
        unset($input['brand_id']);

        $input['deleted_at'] = CarbonImmutable::now();

        DB::beginTransaction();
        try {

            DB::table('brand')
                ->where('brand_id', $brand_id)
                ->whereNull('deleted_at')
                ->update($input);
            DB::commit();
            return true;

        } catch (\Exception $e) {

            DB::rollBack();
            return false;

        }
    }


}
