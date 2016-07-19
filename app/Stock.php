<?php namespace App;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Model;

class Stock extends Model
{
    protected $dates = ['fecha'];

    public function stockholder()
    {
        return $this->belongsTo('App\Stockholder');
    }

    public function setFechaAtrribute($date)
    {
        $this->attributes['fecha'] = Carbon::createFromFormat('d/m/Y', $date)->format('Y-m-d');
    }
}