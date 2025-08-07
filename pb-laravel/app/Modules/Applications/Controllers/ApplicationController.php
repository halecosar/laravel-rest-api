<?php

namespace App\Modules\Applications\Controllers;

use App\Http\Controllers\Controller;
use App\Modules\Applications\Requests\ApplyRequestCreate;
use OpenApi\Annotations as OA;
use App\Modules\Applications\Services\ApplicationService;

class ApplicationController extends Controller
{

    protected $applicationService;

    public function __construct(ApplicationService $applicationService)
    {
        $this->applicationService = $applicationService;
    }

    /**
     * @OA\Post(
     *     path="/api/apply",
     *     tags={"Applications"},
     *     summary="Create a new job application",
     *     description="Allows a candidate to apply for a job posting",
     *     operationId="createApplication",
     *     @OA\RequestBody(
     *         required=true,
     *         @OA\JsonContent(
     *             required={"candidate_id", "job_posting_id"},
     *             @OA\Property(property="candidate_id", type="integer", example=1),
     *             @OA\Property(property="job_posting_id", type="integer", example=5)
     *         )
     *     ),
     *     @OA\Response(
     *         response=201,
     *         description="Application created successfully",
     *         @OA\JsonContent(
     *             type="object",
     *             @OA\Property(property="success", type="boolean", example=true),
     *             @OA\Property(property="data", type="object",
     *                 @OA\Property(property="id", type="integer", example=10),
     *                 @OA\Property(property="candidate_id", type="integer", example=1),
     *                 @OA\Property(property="job_posting_id", type="integer", example=5),
     *                 @OA\Property(property="applied_at", type="string", format="date-time", example="2025-08-06T14:30:00Z"),
     *                 @OA\Property(property="status", type="string", example="applied"),
     *                 @OA\Property(property="created_at", type="string", format="date-time", example="2025-08-06T14:31:00Z"),
     *                 @OA\Property(property="updated_at", type="string", format="date-time", example="2025-08-06T14:31:00Z")
     *             )
     *         )
     *     ),
     *     @OA\Response(
     *         response=400,
     *         description="Bad request"
     *     )
     * )
     */
    public function apply(ApplyRequestCreate $request)
    {
        $data = $request->validated();

        $data['applied_at'] = now();
        $data['status'] = 'applied';

        return $this->applicationService->apply($data);
    }
}
