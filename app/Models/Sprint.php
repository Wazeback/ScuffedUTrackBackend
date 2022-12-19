<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Sprint extends Model
{
    use HasFactory;
    use SoftDeletes;

    protected $fillable = [
        'name',
        'project_id',
        'start',
        'end',
    ];

    public function issues()
    {
        return $this->hasMany(Issue::class);
    }

    public function project()
    {
        return $this->belongsTo(Project::class);
    }

}
