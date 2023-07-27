<?php

namespace App\Services;

use App\Repositories\BrandRepository;

class BrandService
{
    public function __construct(private BrandRepository $brandRepository)
    {
    }

    public function getList($input) {
        return $this->brandRepository->getList($input);
    }

    public function insertRow($input) {
        return $this->brandRepository->insertRow($input);
    }

}
