<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Book extends Model
{
    use HasFactory;
    protected $fillable = [
        'name',
        'subject_id',
        'inst_id',
        'file',
    ];

    public function Instructors()
    {
        return $this->belongsTo(Instructor::class, 'inst_id');
    }

    public function Subjects()
    {
        return $this->belongsTo(Subject::class, 'subject_id');
    }
}
