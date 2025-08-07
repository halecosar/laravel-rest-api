<?php


namespace App\Models;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class applications extends Model
{
    protected $fillable = [
        'candidate_id',
        'job_posting_id',
        'applied_at',
        'status',
    ];

    public function candidate(): BelongsTo
    {
        return $this->belongsTo(\App\Models\candidates::class);
    }

    public function jobPosting(): BelongsTo
    {
        return $this->belongsTo(\App\Models\job_postings::class);
    }
}
