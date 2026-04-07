<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Education extends Model
{
   protected $fillable = ['employee_id', 'degree', 'institute'];
  protected $table = 'educations';
    public function employee()
    {
        return $this->belongsTo(Employee::class);
    }
}
