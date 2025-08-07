<?php

namespace App\Modules\Candidate\Repositories;

interface CandidateRepositoryInterface

{
    public function create(array $data);
    public function findById(int $id);
    public function update(int $id,array $data);
    public function delete(int $id);

}
