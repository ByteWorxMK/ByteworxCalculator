<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class CompanySettings extends Model
{
    //
    public $table='company_list';
    protected $fillable = [
        'company_name','vacation_days', 'sick_days', 'working_days', 'billability', 'billability_year', 'effective_days', 'expected_profit'
    ];
}
