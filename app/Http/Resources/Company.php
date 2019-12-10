<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class Company extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return array
     */
    public function toArray($request)
    {
        return  [
        'company_name'        =>  $this->company_name,
        'vacation_days'       =>  $this->vacation_days,
        'sick_days'           =>  $this->sick_days,
        'working_days'        =>  $this->working_days,
        'billability'         =>  $this->billability,
        'billability_year'    =>  $this->billability_year,
        'effective_days'      =>  $this->effective_days,
        'expected_profit'      =>  $this->expected_profit
        ];
    }
}
