<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Semester extends Model
{
    use SoftDeletes;
    use HasFactory;

    protected $fillable = [
        'title',
        'slug',
        'user_id'
    ];

    public function user() {
        return $this->belongsTo(User::class);
    }

    public function modules() {
        return $this->hasMany(Module::class);
    }

}
