<?php

namespace App\Modules\Candidate\Services;

use App\Modules\Candidate\Repositories\CandidateRepositoryInterface;

class CandidateService
{
    protected $candidateRepository;

    public function __construct(CandidateRepositoryInterface $candidateRepository)
    {
        $this->candidateRepository = $candidateRepository;
    }

    public function createCandidate(array $data)
    {
        return $this->candidateRepository->create($data);
    }

    public function findById(int $id)
    {
        return $this->candidateRepository->findById($id);
    }
     public function update(int $id, array $data)
    {
        return $this->candidateRepository->update($id, $data);
    }
     public function delete(int $id)
    {
        return $this->candidateRepository->delete($id);
    }
}
