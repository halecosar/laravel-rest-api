<?php

namespace App\Modules\JobPosting\Repositories;

use App\Models\job_postings;
use App\Modules\JobPosting\Repositories\JobPostingRepositoryInterface;

class JobPostingRepository implements JobPostingRepositoryInterface
{
    public function create(array $data)
    {
        return job_postings::create($data);
    }

    public function findById($id)
    {
        return job_postings::find($id);
    }

    public function update($id, array $data)
    {
        $job_postings = job_postings::find($id);
        if ($job_postings) {
            $job_postings->update($data);
            return $job_postings;
        }
        return null;
    }

    public function delete($id)
    {
        $job_postings = job_postings::find($id);
        if ($job_postings) {
            $job_postings->delete();
            return true;
        }
        return false;
    }
}
