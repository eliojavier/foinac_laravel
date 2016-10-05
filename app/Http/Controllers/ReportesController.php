<?php namespace App\Http\Controllers;

use App\BankInterest;
use App\Expense;
use App\Loan;
use App\Payment;
use App\Profit;
use Illuminate\Support\Facades\Request;

use App\Http\Requests;
use App\Stock;
use Illuminate\Support\Facades\Response;

class ReportesController extends Controller {

	public function graficos()
	{
		$book = array(
			"title" => "JavaScript: The Definitive Guide",
			"author" => "David Flanagan",
			"edition" => 6
		);
		return view ('reportes.graficos');
	}
	
	/**
	 * Display a listing of the resource.
	 *
	 * @return Response
	 */
	public function index()
	{
		//valores 30 septiembre
		$TOTAL_ACCIONES = 0;
		$TOTAL_INTERESES_PRESTAMOS = 2590.5;//7568.38;
		$TOTAL_INTERESES_BANCO = 2830.18;
		$TOTAL_GANANCIAS = 1000;
		$TOTAL_PRESTAMOS = 0;
		$TOTAL_PAGOS = 0;
		$TOTAL_GASTOS = 21.6;

		$TOTAL_ACCIONES += Stock::sum('monto');
		$TOTAL_INTERESES_BANCO += BankInterest::sum('monto');
		$TOTAL_GASTOS += Expense::sum('monto');
		$TOTAL_GANANCIAS += Profit::sum('monto');

		$prestamos = Loan::where('fuePagado', 0)->get();

		foreach ($prestamos as $prestamo){
			$TOTAL_PRESTAMOS += $prestamo->monto;
			foreach ($prestamo->payments as $payment){
				$TOTAL_PAGOS += $payment->montoCapital;
				$TOTAL_INTERESES_PRESTAMOS += $payment->montoInteres;
			}
		}
		
		$CUENTAS_POR_COBRAR =  $TOTAL_PRESTAMOS - $TOTAL_PAGOS;

		$TOTAL_DISPONIBLE = + $TOTAL_ACCIONES
							+ $TOTAL_INTERESES_PRESTAMOS
							+ $TOTAL_INTERESES_BANCO
							+ $TOTAL_GANANCIAS
							+ $TOTAL_PAGOS
							- $TOTAL_PRESTAMOS
							- $TOTAL_GASTOS;

		return view('reportes/acciones', compact('TOTAL_ACCIONES', 'TOTAL_INTERESES_PRESTAMOS', 'TOTAL_INTERESES_BANCO',
												'TOTAL_GANANCIAS', 'TOTAL_PRESTAMOS', 'TOTAL_GASTOS', 'CUENTAS_POR_COBRAR', 'TOTAL_DISPONIBLE'));
	}

	/**
	 * Show the form for creating a new resource.
	 *
	 * @return Response
	 */
	public function create()
	{
		//
	}

	/**
	 * Store a newly created resource in storage.
	 *
	 * @return Response
	 */
	public function store()
	{
		//
	}

	/**
	 * Display the specified resource.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function show($id)
	{
		//
	}

	/**
	 * Show the form for editing the specified resource.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function edit($id)
	{
		//
	}

	/**
	 * Update the specified resource in storage.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function update($id)
	{
		//
	}

	/**
	 * Remove the specified resource from storage.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function destroy($id)
	{
		//
	}

}
