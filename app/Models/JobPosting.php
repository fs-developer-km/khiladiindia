<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class JobPosting extends Model
{
    use HasFactory;

    protected $fillable = [
        'vendor_id',
        'title',
        'description',
        'location',
        'salary',
        'deadline',
        'status'
    ];

    protected $dates = ['deadline', 'created_at', 'updated_at'];

    // Relation with Vendor
    public function vendor()
    {
        return $this->belongsTo(Vendor::class, 'vendor_id');
    }

    // Check if wishlisted by user
    public function wishlistedByUser($user_id)
    {
        return \DB::table('job_wishlists')
                  ->where('user_id', $user_id)
                  ->where('job_id', $this->id)
                  ->exists();
    }
}
