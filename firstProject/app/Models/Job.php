<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Support\Arr;

class Job extends Model
{
    use HasFactory;

    protected $table = 'job_listings';
    protected $guarded = [];

    public function employer()
    {
        return $this->BelongsTo(Employer::class);
    }

    public function tags()
    {
        return $this->belongsToMany(Tag::class, foreignPivotKey:"job_listing_id");
    }
}
