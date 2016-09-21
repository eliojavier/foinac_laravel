<?php namespace App;

use DateTime;
use Illuminate\Database\Eloquent\Model;

class Loan extends Model {

    public function getFechaAttribute($value)
    {
        return DateTime::createFromFormat('Y-m-d',$value)->format('d/m/Y');
    }

    public function payments()
    {
        return $this->hasMany(Payment::class);
    }

    public function stockholder()
    {
        return $this->belongsTo(Stockholder::class);
    }

}
