<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Employee extends Model
{
    //  'position', 'role', 'image',
     public $table='employee';
    protected $fillable = [
       'position', 'role', 'first_name', 'last_name', 'net', 'brutto', 'yearlynet' , 'yearlybrut', 'socialcostmonth' , 'socialcostyear', 'administrative' , 'expenses', 'hardware', 'othercosts', 'companycostperyear', 'companycostpermonth',   'c1', 'c2', 'c3', 'c4', 'p1', 'p2', 'p3', 'p4', 'image'
       ];
}
