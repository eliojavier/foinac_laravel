<?php namespace App;

use DateTime;
use Illuminate\Database\Eloquent\Model;

class Profit extends Model {

    public function getFechaAttribute($value)
    {
        return DateTime::createFromFormat('Y-m-d',$value)->format('d/m/Y');
    }

}
