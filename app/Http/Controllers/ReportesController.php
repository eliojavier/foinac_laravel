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

	public function acciones()
	{
		//$acciones = DB::select('SELECT MONTHNAME(fecha) AS month, COUNT(id) AS value FROM stocks GROUP BY MONTH(fecha)');
		$acciones = Stock::find(1);
		if(Request::ajax()){
			return 'ok';
		}
		return "f";
	}

		//return Response::json($response);
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


	/**
	 * Display a listing of the resource.
	 *
	 * @return Response
	 */
	public function index()
	{
		//valores 30 septiembre
		$TOTAL_ACCIONES = 0;
		$TOTAL_INTERESES_PRESTAMOS = 0;
		$TOTAL_INTERESES_BANCO = 0;
		$TOTAL_GANANCIAS = 0;
		$TOTAL_PRESTAMOS = 0;
		$TOTAL_GASTOS = 0;

		$TOTAL_ACCIONES += Stock::sum('monto');
		$TOTAL_INTERESES_PRESTAMOS += Payment::sum('montoInteres');
		$TOTAL_INTERESES_BANCO += BankInterest::sum('monto');
		$TOTAL_GANANCIAS += Profit::sum('monto');
		$TOTAL_PRESTAMOS += (Loan::sum('monto') - Payment::sum('montoCapital'));
		$TOTAL_GASTOS += Expense::sum('monto');

		$TOTAL_DISPONIBLE = + $TOTAL_ACCIONES
							+ $TOTAL_INTERESES_PRESTAMOS
							+ $TOTAL_INTERESES_BANCO
							+ $TOTAL_GANANCIAS
							- $TOTAL_PRESTAMOS
							- $TOTAL_GASTOS;
		

		return view('reportes/acciones', compact('TOTAL_ACCIONES', 'TOTAL_INTERESES_PRESTAMOS', 'TOTAL_INTERESES_BANCO',
												'TOTAL_GANANCIAS', 'TOTAL_PRESTAMOS', 'TOTAL_GASTOS', 'TOTAL_DISPONIBLE'));
//
//		$acciones = DB::select('SELECT MONTHNAME(fecha) AS month, COUNT(id) AS value FROM stocks GROUP BY MONTH(fecha)');
//		$acciones = Stock::all();
//		$stocks = Stock::groupby('stockholder_id')->select('id', DB::raw('count(*) as total'))->get();
//		//dd($acciones);
//		$rows = array();
//		foreach ($acciones as $accion){
//			$rows[] = $accion;
//		}
//		$response = array(
//			'status' => 'success',
//			'msg' => 'Setting created successfully',
//		);
//		$response = (json_encode($rows));
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
