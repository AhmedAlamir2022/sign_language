<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Prodcast extends Model
{
    use HasFactory;
    protected $fillable = [
        'title',
        'inst_id',
        'interviwer',
        'quest',
        'url',
    ];

    public function Instructor()
    {
        return $this->belongsTo(Instructor::class, 'inst_id');
    }
}
