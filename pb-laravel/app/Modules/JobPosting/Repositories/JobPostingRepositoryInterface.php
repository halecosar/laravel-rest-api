<?php

namespace App\Modules\JobPosting\Repositories;

interface JobPostingRepositoryInterface

{
    public function create(array $data);
    public function findById(int $id);
    public function update(int $id,array $data);
    public function delete(int $id);

}