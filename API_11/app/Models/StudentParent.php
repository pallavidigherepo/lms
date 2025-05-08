<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;
use function Illuminate\Events\queueable;

class StudentParent extends Model
{
    use HasFactory;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'mother_name',
        'mother_email',
        'mother_mobile',
        'mother_qualification',
        'mother_occupation',
        'father_name',
        'father_email',
        'father_mobile',
        'father_qualification',
        'father_occupation',
        'parent_email',
        'parent_password',
        'parent_aadhaar_number',
        'is_parent_aadhaar_verified'
    ];

    /**
     * @return HasMany
     */
    public function students() :HasMany
    {
        return $this->hasMany(Student::class);
    }
}
