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
           'name'
            ])
            ->get();
    }

    /**
     * 1レコード取得
     *
     * @param string $brand_id
     * @return \Illuminate\Database\Eloquent\Model|\Illuminate\Database\Query\Builder|object|null
     */
    public function getRecord($brand_id) {
        return DB::table('brand')
            ->where('brand_id', $brand_id)
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
                'name' =>  $input['name'],
                'created_at' => $now,
                'updated_at' => $now
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
                ->update($input);

            DB::commit();
            return true;
        } catch (\Exception $e) {

            DB::rollBack();
            return false;
        }
    }

}
