<?php namespace App\Http\Controllers;

use App\Http\Requests;
use App\Http\Controllers\Controller;

use App\Stock;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class PerfilController extends Controller {

	public function misacciones()
	{
		$user_id = Auth::user()->id;
		$result = DB::select('SELECT 	stockholders.id AS id, 
										stockholders.name AS accionista, 
										(SUM(stocks.monto)/300) AS numacciones, 
										SUM(stocks.monto) AS montoinversion
                                  FROM stockholders, stocks
                                  WHERE stockholders.id = stocks.stockholder_id 
                                		AND stockholders.id =' . $user_id .
                                ' GROUP BY stockholders.name');
		
		return view('perfiles.misacciones', compact('result'));
	}

	public function misprestamos()
	{
		$user_id = Auth::user()->id;
		
		$result = DB::select ('SELECT 	loans.id AS id,
 										stockholders.name AS accionista, 
										DATE_FORMAT(loans.fecha, "%d/%m/%Y") AS fecha,
                              			loans.monto AS prestamo,
                              			SUM(payments.montoCapital) AS pagos,
                              			(loans.monto - SUM(payments.montoCapital)) AS deuda,
                              			SUM(payments.montoInteres) AS interesespagados
								  FROM stockholders INNER JOIN loans ON stockholders.id = loans.stockholder_id
								  LEFT JOIN payments ON payments.loan_id = loans.id 
								  WHERE loans.fuePagado = 0 AND stockholders.id =' . $user_id . 
								' GROUP BY loans.id
                              	  ORDER BY stockholders.name, loans.fecha');

		return view('perfiles.misprestamos', compact('result'));
	}

	public function misganancias()
	{
		
	}
}
