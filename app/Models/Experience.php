<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Experience extends Model
{
    protected $fillable = ['employee_id', 'company', 'position'];

    public function employee()
    {
        return $this->belongsTo(Employee::class);
    }
}
