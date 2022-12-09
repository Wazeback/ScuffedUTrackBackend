<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Project extends Model
{
    use HasFactory;
    use SoftDeletes;

    protected $fillable = [
        'name',
        'group_id',
        'start',
        'end',
    ];

    public function sprint()
    {
        return $this->hasMany(Sprint::class);
    }

    public function group()
    {
        return $this->belongsTo(Group::class);
    }





}
