<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Issue extends Model
{
    use HasFactory;

    protected $fillable = [
    ];

   public function sprint()
   {
       return $this->belongsTo(Sprint::class);
   }

   public function priority()
   {
       return $this->belongsTo(Priority::class);

   }

   public function subject()
   {
       return $this->belongsTo(Subject::class);

   }


}
