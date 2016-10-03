<?php namespace App\Http\Middleware;

use App\Loan;
use Closure;

class CheckPayment {

	/**
	 * Handle an incoming request.
	 *
	 * @param  \Illuminate\Http\Request  $request
	 * @param  \Closure  $next
	 * @return mixed
	 */
	public function handle($request, Closure $next)
	{
		//obtengo el préstamo
		$prestamo = Loan::where('id', $request->prestamo)->get();

		//veo sus pagos
		$pagos = 0;
		foreach ($prestamo->payments as $payment){
			$pagos += $payment->montoCapital;
		}
		//pagar prestamos
		//id del prestamo, ver su monto, sumar sus pagos con el pago actual, si son iguales actualizc la BD
		return $next($request);
	}

}
