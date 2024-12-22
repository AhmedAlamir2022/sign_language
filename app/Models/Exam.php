<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Exam extends Model
{
    use HasFactory;
    protected $fillable = [
        'name',
        'subject_id',
        'inst_id',
        'date',
    ];

    public function Subjects()
    {
        return $this->belongsTo(Subject::class, 'subject_id');
    }

    public function Instructors()
    {
        return $this->belongsTo(Instructor::class, 'inst_id');
    }
}
