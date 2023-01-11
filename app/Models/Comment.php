<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Comment extends Model
{
    use SoftDeletes;
    protected $guarded = [];
    use HasFactory;

    public function user() {
        return $this->belongsTo(User::class);
    }
    public function lesson() {
        return $this->belongsTo(Lesson::class);
    }

}
