<?php namespace App\Http\Controllers;

use App\BankInterest;
use App\Expense;
use App\Loan;
use App\Profit;
use App\Http\Requests;
use App\Stock;
use Illuminate\Support\Facades\Response;

class ReportesController extends Controller {

	public function graficos()
	{
//		$bank_interests = BankInterest::lists('monto', 'fecha');
//		dd($bank_interests);
//		$bank_interests = BankInterest::get(['monto', 'fecha']);
//		$x = $bank_interests->toJson();
//		dd($x);
		$book = array(
			"year" => "JavaScript: The Definitive Guide",
			"author" => "David Flanagan",
			"edition" => 6
		);
//		{ year: '2008', value: 20 },
//		{ year: '2009', value: 10 },
//		{ year: '2010', value: 5 },
//		{ year: '2011', value: 5 },
//		{ year: '2012', value: 20 }
//		return view ('reportes.graficos', compact('book'));
		return view ('reportes/graficos');
	}

	public function interesesBanco()
	{
		$bank_interests = BankInterest::get(['fecha', 'monto'])->toJSON();
		return $bank_interests;
	}

	public function accionistas()
	{
		
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
		$TOTAL_INTERESES_PRESTAMOS = 5979.38; //3129.38;//7568.38;
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
												'TOTAL_GANANCIAS', 'TOTAL_GASTOS', 'CUENTAS_POR_COBRAR', 'TOTAL_DISPONIBLE'));
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
