<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Department extends Model
{
      protected $table = 'hr_department';
    // Mass assignable fields
    protected $fillable = [
        'dept_code',
        'dept_name',
        'dept_parentcode',
        'description',
        'company_id',
    ];
}