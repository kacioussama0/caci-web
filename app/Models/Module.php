<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Module extends Model
{
    use HasFactory;
    use SoftDeletes;


    protected $fillable = [
        'title',
        'description',
        'semester_id',
        'user_id',
        'coefficient',
        'thumbnail',
    ];

    public function semester() {
        return $this->belongsTo(Semester::class);
    }


    public function user() {
        return $this->belongsTo(User::class);
    }

    public function lessons() {
        return $this->hasMany(Lesson::class);
    }

}
