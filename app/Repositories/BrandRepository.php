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

}
