<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Issue extends Model
{
    use HasFactory;
    use SoftDeletes;

    protected $fillable = [
        'user_id',
        'status_id',
        'sprint_id',
        'priority_id',
        'subject_id',
        'subject_id',
        'title',
        'description',
        'state',
        'dueDate',
        'estimation',
        'spentTime',
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

   public function status() {
       return $this->belongsTo(Status::class);
   }


}
