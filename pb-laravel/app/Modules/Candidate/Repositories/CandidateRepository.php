<?php

namespace App\Modules\Candidate\Repositories;

use App\Models\candidates;
use App\Modules\Candidate\Repositories\CandidateRepositoryInterface;

class CandidateRepository implements CandidateRepositoryInterface
{
    public function create(array $data)
    {
        return candidates::create($data);
    }

    public function findById($id)
    {
        return candidates::find($id); //eleqoentten geliyor.
    }

    public function update($id, array $data)
    {
        $candidate = candidates::find($id);
        if ($candidate) {
            $candidate->update($data);
            return $candidate;
        }
        return null;
    }

    public function delete($id)
    {
        $candidate = candidates::find($id);
        if ($candidate) {
            $candidate->delete();
            return true;
        }
        return false;
    }
}
