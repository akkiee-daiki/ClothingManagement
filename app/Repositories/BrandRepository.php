<?php

namespace App\Repositories;

use Carbon\CarbonImmutable;
use Illuminate\Support\Facades\DB;

class BrandRepository
{
    /**
     * 新規登録
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
