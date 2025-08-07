<?php

namespace App\Modules\Applications\Services;

use App\Modules\Applications\Repositories\ApplicationRepositoryInterface;

class ApplicationService
{
    protected $applicationRepository;

    public function __construct(ApplicationRepositoryInterface $applicationRepository)
    {
        $this->applicationRepository = $applicationRepository;
    }

    public function apply(array $data)
    {
        return $this->applicationRepository->apply($data);
    }
}
