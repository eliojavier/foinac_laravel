<?php namespace App;

use Illuminate\Database\Eloquent\Model;

class Accounting extends Model {

    public function getFechaAttribute($value)
    {
        return DateTime::createFromFormat('Y-m-d',$value)->format('d/m/Y');
    }

}
