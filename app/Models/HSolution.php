<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class HSolution extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
        'stud_id',
        'inst_id',
        'homework_id',
        'hs_file',
    ];

    public function Instructor()
    {
        return $this->belongsTo(Instructor::class, 'inst_id');
    }

    public function Homework()
    {
        return $this->belongsTo(Homework::class, 'homework_id');
    }

    public function Student()
    {
        return $this->belongsTo(User::class, 'stud_id');
    }
}
