<?php namespace App;

use DateTime;
use Illuminate\Database\Eloquent\Model;

class Payment extends Model {

    public function getFechaAttribute($value)
    {
        return DateTime::createFromFormat('Y-m-d',$value)->format('d/m/Y');
    }

    public function loan()
    {
        return $this->belongsTo(Loan::class);
    }
}
