<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Cohensive\OEmbed\Facades\OEmbed;

class Video extends Model
{
    use HasFactory;
    protected $fillable = [
        'name',
        'subject_id',
        'inst_id',
        'url',
    ];

    public function Instructors()
    {
        return $this->belongsTo(Instructor::class, 'inst_id');
    }

    public function Subjects()
    {
        return $this->belongsTo(Subject::class, 'subject_id');
    }

    public function getVideoAttribute($value){
        $embed = OEmbed::get($value);
        if ($embed){
            return $embed->html(['width' => 200]);
        }
    }
}
