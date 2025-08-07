<?php

namespace App\Modules\Candidate\Controllers;

use App\Http\Controllers\Controller;
use App\Modules\Candidate\Requests\CandidateRequestCreate;
use OpenApi\Annotations as OA;
use App\Modules\Candidate\Services\CandidateService;

class CandidateController extends Controller
{
    protected $candidateService;

    public function __construct(CandidateService $candidateService)
    {
        $this->candidateService = $candidateService;
    }

    /**
     * @OA\Get(
     *     path="/api/candidates/{id}",
     *     tags={"Candidates"},
     *     summary="Find candidate by ID",
     *     description="Returns a single candidate",
     *     operationId="findCandidateById",
     *     @OA\Parameter(
     *         name="id",
     *         in="path",
     *         description="ID of candidate to return",
     *         required=true,
     *         @OA\Schema(type="integer", example=1)
     *     ),
     *     @OA\Response(
     *         response=200,
     *         description="Successful operation",
     *         @OA\JsonContent(
     *             @OA\Property(property="id", type="integer", example=1),
     *             @OA\Property(property="user_id", type="integer", example=2),
     *             @OA\Property(property="first_name", type="string", example="John"),
     *             @OA\Property(property="last_name", type="string", example="Doe"),
     *             @OA\Property(property="email", type="string", example="john@example.com"),
     *             @OA\Property(property="phone", type="string", example="+905555555555"),
     *             @OA\Property(property="resume_url", type="string", example="http://example.com/resume.pdf")
     *         )
     *     ),
     *     @OA\Response(response=404, description="Candidate not found")
     * )
     */
    public function findbyId(int $id)
    {
        return $this->candidateService->findById($id);
    }

    /**
     * @OA\Post(
     *     path="/api/candidates",
     *     tags={"Candidates"},
     *     summary="Create a new candidate",
     *     description="Creates a new candidate in the system",
     *     operationId="createCandidate",
     *     @OA\RequestBody(
     *         required=true,
     *         @OA\JsonContent(
     *             required={"user_id", "first_name", "last_name", "email", "phone"},
     *             @OA\Property(property="user_id", type="integer", example=2),
     *             @OA\Property(property="first_name", type="string", example="Jane"),
     *             @OA\Property(property="last_name", type="string", example="Doe"),
     *             @OA\Property(property="email", type="string", format="email", example="jane@example.com"),
     *             @OA\Property(property="phone", type="string", example="+905555555556"),
     *             @OA\Property(property="resume_url", type="string", example="http://example.com/resume.pdf")
     *         )
     *     ),
     *     @OA\Response(
     *         response=201,
     *         description="Candidate created successfully",
     *         @OA\JsonContent(
     *             type="object",
     *             @OA\Property(property="success", type="boolean", example=true),
     *             @OA\Property(property="data", type="object",
     *                 @OA\Property(property="id", type="integer", example=1),
     *                 @OA\Property(property="first_name", type="string", example="Jane"),
     *                 @OA\Property(property="last_name", type="string", example="Doe"),
     *                 @OA\Property(property="email", type="string", example="jane@example.com")
     *             )
     *         )
     *     ),
     *     @OA\Response(response=400, description="Bad request")
     * )
     */
    public function create(CandidateRequestCreate $request)
    {
        return $this->candidateService->createCandidate($request->validated());
    }

    /**
     * @OA\Put(
     *     path="/api/candidates/{id}",
     *     tags={"Candidates"},
     *     summary="Update an existing candidate",
     *     description="Updates the details of an existing candidate",
     *     operationId="updateCandidate",
     *     @OA\Parameter(
     *         name="id",
     *         in="path",
     *         required=true,
     *         description="ID of the candidate to update",
     *         @OA\Schema(type="integer")
     *     ),
     *     @OA\RequestBody(
     *         required=true,
     *         @OA\JsonContent(
     *             @OA\Property(property="first_name", type="string", example="Jane"),
     *             @OA\Property(property="last_name", type="string", example="Smith"),
     *             @OA\Property(property="email", type="string", example="jane.smith@example.com"),
     *             @OA\Property(property="phone", type="string", example="+905555555557"),
     *             @OA\Property(property="resume_url", type="string", example="http://example.com/resume-new.pdf")
     *         )
     *     ),
     *     @OA\Response(
     *         response=200,
     *         description="Candidate updated successfully",
     *         @OA\JsonContent(
     *             type="object",
     *             @OA\Property(property="success", type="boolean", example=true),
     *             @OA\Property(property="data", type="object",
     *                 @OA\Property(property="id", type="integer", example=1),
     *                 @OA\Property(property="first_name", type="string", example="Jane"),
     *                 @OA\Property(property="last_name", type="string", example="Smith"),
     *                 @OA\Property(property="email", type="string", example="jane.smith@example.com")
     *             )
     *         )
     *     ),
     *     @OA\Response(response=400, description="Bad request"),
     *     @OA\Response(response=404, description="Candidate not found")
     * )
     */
    public function update(int $id, CandidateRequestCreate $request)
    {
        return $this->candidateService->update($id, $request->validated());
    }

    /**
     * @OA\Delete(
     *     path="/api/candidates/{id}",
     *     tags={"Candidates"},
     *     summary="Delete a candidate",
     *     description="Deletes a candidate by ID",
     *     operationId="deleteCandidate",
     *     @OA\Parameter(
     *         name="id",
     *         in="path",
     *         required=true,
     *         description="ID of the candidate to delete",
     *         @OA\Schema(type="integer")
     *     ),
     *     @OA\Response(
     *         response=200,
     *         description="Candidate deleted successfully",
     *         @OA\JsonContent(
     *             type="object",
     *             @OA\Property(property="success", type="boolean", example=true),
     *             @OA\Property(property="message", type="string", example="Candidate deleted successfully")
     *         )
     *     ),
     *     @OA\Response(response=404, description="Candidate not found")
     * )
     */
    public function delete(int $id)
    {
        return $this->candidateService->delete($id);
    }
}
