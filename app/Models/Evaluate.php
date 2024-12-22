<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Evaluate extends Model
{
    use HasFactory;
    protected $fillable = [
        'stud_id',
        'inst_id',
        'date_from',
        'date_to',
        'prcentage',
        'feedback',
    ];

    public function Student()
    {
        return $this->belongsTo(User::class, 'stud_id');
    }

    public function Instructor()
    {
        return $this->belongsTo(Instructor::class, 'inst_id');
    }
}
