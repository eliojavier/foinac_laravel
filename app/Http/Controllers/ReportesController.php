<?php namespace App\Http\Controllers;

use App\BankInterest;
use App\Expense;
use App\Http\Requests;
use App\Loan;
use App\Payment;
use App\Stock;
use Illuminate\Support\Facades\DB;

class ReportesController extends Controller {

	/**
	 * Display a listing of the resource.
	 *
	 * @return Response
	 */
	public function index()
	{
		$total_acciones = Stock::sum('monto');
		$total_interesesBanco = BankInterest::sum('monto');
		$total_interesesPrestamos = Payment::sum('montoInteres');
		$total_prestamos = Loan::sum('monto') - Payment::sum('montoCapital');
		$total_gastos = Expense::sum('monto');

//		echo($total_acciones);
//		echo('-');
//		echo($total_interesesBanco);
//		echo('-');
//		echo($total_interesesPrestamos);
//		echo('-');
//		echo($total_prestamos);
//		echo('-');
//		echo($total_gastos);

		$total_disponible = $total_acciones +
							$total_interesesBanco +
							$total_interesesPrestamos -
							$total_gastos -
							$total_prestamos;

//		echo($total_disponible);
		
		$acciones = DB::select('SELECT MONTHNAME(fecha) AS month, COUNT(id) AS value FROM stocks GROUP BY MONTH(fecha)');
		$rows = array();
		foreach ($acciones as $accion){
			$rows[] = $accion;
		}
		return response()->json($rows);
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
