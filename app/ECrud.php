<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class ECrud extends Model
{
    //
    
    protected $fillable = [
        'e_first_name', 'e_last_name', 'e_net', 'e_brutto', 'e_yearlybrut', 'e_image'
       ];
}
