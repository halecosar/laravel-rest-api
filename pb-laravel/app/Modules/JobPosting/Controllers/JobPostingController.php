<?php

namespace App\Modules\JobPosting\Controllers;

use App\Http\Controllers\Controller;
use App\Modules\JobPosting\Requests\JobPostingRequestCreate;
use OpenApi\Annotations as OA;
use App\Modules\JobPosting\Services\JobPostingService;

class JobPostingController extends Controller
{
    protected $jobPostingService;

    public function __construct(JobPostingService $jobPostingService)
    {
        $this->jobPostingService = $jobPostingService;
    }

    /**
     * @OA\Get(
     *     path="/api/job-postings/{id}",
     *     tags={"JobPostings"},
     *     summary="Find job posting by ID",
     *     description="Returns a single job posting",
     *     operationId="findJobPostingById",
     *     @OA\Parameter(
     *         name="id",
     *         in="path",
     *         description="ID of job posting to return",
     *         required=true,
     *         @OA\Schema(type="integer", example=1)
     *     ),
     *     @OA\Response(
     *         response=200,
     *         description="Successful operation",
     *         @OA\JsonContent(
     *             @OA\Property(property="id", type="integer", example=1),
     *             @OA\Property(property="title", type="string", example="Software Engineer"),
     *             @OA\Property(property="description", type="string", example="Job description here..."),
     *             @OA\Property(property="location", type="string", example="Istanbul"),
     *             @OA\Property(property="posted_by", type="integer", example=2),
     *             @OA\Property(property="created_at", type="string", format="date-time", example="2025-08-06T12:34:56Z"),
     *             @OA\Property(property="updated_at", type="string", format="date-time", example="2025-08-06T12:34:56Z")
     *         )
     *     ),
     *     @OA\Response(response=404, description="Job posting not found")
     * )
     */
    public function findbyId(int $id)
    {
        return $this->jobPostingService->findById($id);
    }

    /**
     * @OA\Post(
     *     path="/api/job-postings",
     *     tags={"JobPostings"},
     *     summary="Create a new job posting",
     *     description="Creates a new job posting in the system",
     *     operationId="createJobPosting",
     *     @OA\RequestBody(
     *         required=true,
     *         @OA\JsonContent(
     *             required={"title", "description", "location", "posted_by"},
     *             @OA\Property(property="title", type="string", example="Software Engineer"),
     *             @OA\Property(property="description", type="string", example="Job description here..."),
     *             @OA\Property(property="location", type="string", example="Istanbul"),
     *             @OA\Property(property="posted_by", type="integer", example=2)
     *         )
     *     ),
     *     @OA\Response(
     *         response=201,
     *         description="Job posting created successfully",
     *         @OA\JsonContent(
     *             type="object",
     *             @OA\Property(property="success", type="boolean", example=true),
     *             @OA\Property(property="data", type="object",
     *                 @OA\Property(property="id", type="integer", example=1),
     *                 @OA\Property(property="title", type="string", example="Software Engineer"),
     *                 @OA\Property(property="description", type="string", example="Job description here..."),
     *                 @OA\Property(property="location", type="string", example="Istanbul"),
     *                 @OA\Property(property="posted_by", type="integer", example=2)
     *             )
     *         )
     *     ),
     *     @OA\Response(response=400, description="Bad request")
     * )
     */
    public function create(JobPostingRequestCreate $request)
    {
        return $this->jobPostingService->create($request->validated());
    }

    /**
     * @OA\Put(
     *     path="/api/job-postings/{id}",
     *     tags={"JobPostings"},
     *     summary="Update an existing job posting",
     *     description="Updates the details of an existing job posting",
     *     operationId="updateJobPosting",
     *     @OA\Parameter(
     *         name="id",
     *         in="path",
     *         required=true,
     *         description="ID of the job posting to update",
     *         @OA\Schema(type="integer")
     *     ),
     *     @OA\RequestBody(
     *         required=true,
     *         @OA\JsonContent(
     *             @OA\Property(property="title", type="string", example="Senior Software Engineer"),
     *             @OA\Property(property="description", type="string", example="Updated job description..."),
     *             @OA\Property(property="location", type="string", example="Ankara"),
     *             @OA\Property(property="posted_by", type="integer", example=3)
     *         )
     *     ),
     *     @OA\Response(
     *         response=200,
     *         description="Job posting updated successfully",
     *         @OA\JsonContent(
     *             type="object",
     *             @OA\Property(property="success", type="boolean", example=true),
     *             @OA\Property(property="data", type="object",
     *                 @OA\Property(property="id", type="integer", example=1),
     *                 @OA\Property(property="title", type="string", example="Senior Software Engineer"),
     *                 @OA\Property(property="description", type="string", example="Updated job description..."),
     *                 @OA\Property(property="location", type="string", example="Ankara"),
     *                 @OA\Property(property="posted_by", type="integer", example=3)
     *             )
     *         )
     *     ),
     *     @OA\Response(response=400, description="Bad request"),
     *     @OA\Response(response=404, description="Job posting not found")
     * )
     */
    public function update(int $id, JobPostingRequestCreate $request)
    {
        return $this->jobPostingService->update($id, $request->validated());
    }

    /**
     * @OA\Delete(
     *     path="/api/job-postings/{id}",
     *     tags={"JobPostings"},
     *     summary="Delete a job posting",
     *     description="Deletes a job posting by ID",
     *     operationId="deleteJobPosting",
     *     @OA\Parameter(
     *         name="id",
     *         in="path",
     *         required=true,
     *         description="ID of the job posting to delete",
     *         @OA\Schema(type="integer")
     *     ),
     *     @OA\Response(
     *         response=200,
     *         description="Job posting deleted successfully",
     *         @OA\JsonContent(
     *             type="object",
     *             @OA\Property(property="success", type="boolean", example=true),
     *             @OA\Property(property="message", type="string", example="Job posting deleted successfully")
     *         )
     *     ),
     *     @OA\Response(response=404, description="Job posting not found")
     * )
     */
    public function delete(int $id)
    {
        return $this->jobPostingService->delete($id);
    }
}
