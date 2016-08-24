<?php namespace App;

use Carbon\Carbon;
use DateTime;
use Illuminate\Database\Eloquent\Model;

class Stock extends Model
{
    protected $dates = ['fecha'];

    public function stockholder()
    {
        return $this->belongsTo('App\Stockholder');
    }

    public function getFechaAttribute($value)
    {
        return DateTime::createFromFormat('Y-m-d',$value)->format('d/m/Y');
    }

//    public function setFechaAtrribute($date)
//    {
//        $this->attributes['fecha'] = Carbon::createFromFormat('d/m/Y', $date)->format('Y-m-d');
//    }
}