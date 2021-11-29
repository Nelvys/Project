<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class MedioBasicoResource extends JsonResource
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
            'no_inventory'=>$this->no_inventory,
            'name_object'=>$this->name_object,
            'local_name'=>$this->local_name,
            'responsable'=>$this->responsable,];
    }
}
