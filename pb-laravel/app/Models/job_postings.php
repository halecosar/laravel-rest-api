<?php
namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class job_postings extends Model
{
    protected $fillable = [
        'title',
        'description',
        'location',
        'posted_by',
    ];
    
    public function postedBy()
    {
        return $this->belongsTo(\App\Models\users::class, 'posted_by');
    }
}


