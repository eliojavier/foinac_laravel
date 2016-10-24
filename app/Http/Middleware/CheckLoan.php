<?php namespace App\Http\Middleware;

use App\Http\Controllers\PrestamosController;
use App\Loan;
use App\Stock;
use Closure;

class CheckLoan {

	/**
	 * Handle an incoming request.
	 *
	 * @param  \Illuminate\Http\Request  $request
	 * @param  \Closure  $next
	 * @return mixed
	 */
	public function handle($request, Closure $next)
	{
		//monto de inversión
		$monto_inversion = Stock::where('stockholder_id', $request->accionista)->sum('monto');

		//préstamos que no han sido pagados
		$prestamos = Loan::where('stockholder_id', $request->accionista)->where('fuePagado', 0)->get();

		$monto_prestamos = 0;
		$monto_pagos = 0;
		foreach ($prestamos as $prestamo){
			$monto_prestamos += $prestamo->monto;
			foreach ($prestamo->payments as $payment){
				$monto_pagos += $payment->montoCapital;
			}
		}

		//doble del monto invertido menos prestamos solicitados con sus pagos realizados
		$monto_disponible = (2 * $monto_inversion) - ($monto_prestamos - $monto_pagos);

		if ($request->monto > $monto_disponible)
			return redirect ('prestamos/create')->with('status', 'Monto disponible para préstamo es de ' . $monto_disponible . ' BsF.');
		return $next($request);
	}

}
