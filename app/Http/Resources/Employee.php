<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class Employee extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return array
     */
    public function toArray($request)
    {
        return [
        'position'              =>  $this->position,
        'role'                  =>  $this->role,
        'first_name'            =>  $this->first_name,
        'last_name'             =>  $this->last_name,
        'net'                   =>  $this->net,
        'brutto'                =>  $this->brutto,
        'yearlynet'             =>  $this->yearlynet,
        'yearlybrut'            =>  $this->yearlybrut,
        'socialcostmonth'       =>  $this->socialcostmonth,
        'socialcostyear'        =>  $this->socialcostyear,
        'administrative'        =>  $this->administrative,
        'expenses'              =>  $this->expenses,
        'hardware'              =>  $this->hardware,
        'othercosts'            =>  $this->othercosts,
        'companycostperyear'    =>  $this->companycostperyear,
        'companycostpermonth'   =>  $this->companycostpermonth,
        //'image'                 =>  $new_name,
        'c1'                    =>  $this->c1,
        'c2'                    =>  $this->c2,
        'c3'                    =>  $this->c3,
        'c4'                    =>  $this->c4,
        'p1'                    =>  $this->p1,
        'p2'                    =>  $this->p2,
        'p3'                    =>  $this->p3,
        'p4'                    =>  $this->p4
        ];
        
    }
}
