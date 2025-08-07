<?php


namespace App\Models;
use Illuminate\Database\Eloquent\Model;

class candidates extends Model
{
    protected $fillable = [
        'user_id',
        'first_name',
        'last_name',
        'email',
        'phone',
        'resume_url',
    ];

    public function user()
    {
        return $this->belongsTo(\App\Models\users::class);
    }
}
