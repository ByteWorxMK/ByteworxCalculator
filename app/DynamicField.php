<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class DynamicField extends Model
{
    //
    protected $fillable = [
        'name', 'brutto', 'net', 'billable', 'profit'
    ];
}
