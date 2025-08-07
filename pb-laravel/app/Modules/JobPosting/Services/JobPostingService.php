<?php

namespace App\Modules\JobPosting\Services;

use App\Modules\JobPosting\Repositories\JobPostingRepositoryInterface;

class JobPostingService
{
    protected $jobPostingRepository;

    public function __construct(JobPostingRepositoryInterface $jobPostingRepository)
    {
        $this->jobPostingRepository = $jobPostingRepository;
    }

    public function create(array $data)
    {
        return $this->jobPostingRepository->create($data);
    }

    public function findById(int $id)
    {
        return $this->jobPostingRepository->findById($id);
    }
     public function update(int $id, array $data)
    {
        return $this->jobPostingRepository->update($id, $data);
    }
     public function delete(int $id)
    {
        return $this->jobPostingRepository->delete($id);
    }
}
