<?php namespace App\Http\Controllers;

use App\BankInterest;
use App\Expense;
use App\Http\Requests;
use App\Loan;
use App\Payment;
use App\Stock;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Response;

class ReportesController extends Controller {

	public function acciones()
	{
		$acciones = DB::select('SELECT MONTHNAME(fecha) AS month, COUNT(id) AS value FROM stocks GROUP BY MONTH(fecha)');

		$response = Stock::all();

		return Response::json($response);
//		return Response::json([
//			'status' => 'success',
//			'response' => $response->toJson()
//		]);

//		return Response::json([
//			'status' => 'success',
//			'photos' => $photos->toJson(),
//		]);
//
//		return Response::json($response);
//		$rows = array();
//		foreach ($acciones as $accion){
//			$rows[] = $accion;
//		}
//		$a = array(['1'=>'2']);
//		//return response()->json('ok', 200);
//		$response = array(
//			'status' => 'success',
//			'msg' => 'Setting created successfully',
//		);
//
//		//$response = (json_encode($rows));
//		return Response::json($rows);
//		//return json_encode($response);
//
//		return response()->json($response);
//		//dd(json_encode($rows));
//		//echo;
	}

	/**
	 * Display a listing of the resource.
	 *
	 * @return Response
	 */
	public function index()
	{
		return view('reportes.acciones');
//		$total_acciones = Stock::sum('monto');
//		$total_interesesBanco = BankInterest::sum('monto');
//		$total_interesesPrestamos = Payment::sum('montoInteres');
//		$total_prestamos = Loan::sum('monto') - Payment::sum('montoCapital');
//		$total_gastos = Expense::sum('monto');
//
////		echo($total_acciones);
////		echo('-');
////		echo($total_interesesBanco);
////		echo('-');
////		echo($total_interesesPrestamos);
////		echo('-');
////		echo($total_prestamos);
////		echo('-');
////		echo($total_gastos);
//
//		$total_disponible = $total_acciones +
//							$total_interesesBanco +
//							$total_interesesPrestamos -
//							$total_gastos -
//							$total_prestamos;
//
////		echo($total_disponible);
//
		$acciones = DB::select('SELECT MONTHNAME(fecha) AS month, COUNT(id) AS value FROM stocks GROUP BY MONTH(fecha)');
		$acciones = Stock::all();
		$stocks = Stock::groupby('stockholder_id')->select('id', DB::raw('count(*) as total'))->get();
		//dd($acciones);
		$rows = array();
		foreach ($acciones as $accion){
			$rows[] = $accion;
		}
		$response = array(
			'status' => 'success',
			'msg' => 'Setting created successfully',
		);
		$response = (json_encode($rows)); 
		//dd(json_encode($response));
		//return Response::json($rows);
		//return view('reportes.acciones', compact('response'));
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
