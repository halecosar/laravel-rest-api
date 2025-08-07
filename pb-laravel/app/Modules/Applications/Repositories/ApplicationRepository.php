<?php

namespace App\Modules\Applications\Repositories;

use App\Models\applications;
use App\Modules\Applications\Repositories\ApplicationRepositoryInterface;

class ApplicationRepository implements ApplicationRepositoryInterface
{
    public function apply(array $data)
    {
        return applications::create($data);
    }
}
