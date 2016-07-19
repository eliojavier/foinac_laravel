<?php namespace App\Http\Controllers;

use App\Http\Requests;
use App\Http\Controllers\Controller;

use App\Stock;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class AdministracionController extends Controller {

	public function acciones()
	{
		$result = DB::select('SELECT stockholders.name AS accionista, COUNT(stockholders.name) AS numacciones, SUM(stocks.monto) montoinversion
                                FROM stockholders, stocks
                                WHERE stockholders.id = stocks.stockholder_id
                                GROUP BY stockholders.name');

        return view('administracion.acciones', compact('result'));
	}

    public function prestamos()
    {

//        $result = DB::select('SELECT stockholders.name AS accionista, loans.monto, loans.fecha
//                                FROM stockholders, loans
//                                WHERE stockholders.id = loans.stockholder_id
//                                AND loans.fuePagado = 0
//                                ORDER BY stockholders.name');

        $result = DB::select('SELECT stockholders.name AS accionista, 
                              loans.monto AS monto, 
                              SUM(payments.montoCapital) AS pagoCapital, 
                              (loans.monto - SUM(payments.montoCapital)) AS deuda,
                              loans.fecha AS fecha
                                FROM stockholders, loans, payments
                                WHERE stockholders.id = loans.stockholder_id AND 
                                      loans.id = payments.loan_id AND 
                                      loans.fuePagado = 0
                                ORDER BY stockholders.name');

        return view('administracion.prestamos', compact('result'));

    }

    public function pagos()
    {
        $result = DB::select('');

        return view('administracion.pagos', compact('result'));
    }
}
