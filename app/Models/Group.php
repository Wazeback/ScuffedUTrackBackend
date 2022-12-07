<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Group extends Model
{
    use HasFactory;

    protected $fillable = [
        'group',
        'year_id',
    ];

    public function users()
    {
        return $this->hasmany(User::class);
    }

    public function Project()
    {
        return $this->hasmany(Project::class);
    }

}
