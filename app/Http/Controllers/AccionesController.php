<?php namespace App\Http\Controllers;

use App\Accounting;
use App\Http\Requests;
use App\Stock;
use App\Stockholder;
use DateTime;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class AccionesController extends Controller {

	public function __construct()
	{
		$this->middleware('admin', ['only' => ['create', 'store']]);
	}

	/**
	 * Display a listing of the resource.
	 *
	 * @return Response
	 */
	public function index()
	{
        $result = DB::select('SELECT 	stockholders.id AS id, 
										stockholders.name AS accionista, 
										(SUM(stocks.monto)/300) AS numacciones, 
										SUM(stocks.monto) AS montoinversion
                                FROM stockholders, stocks
                                WHERE stockholders.id = stocks.stockholder_id
                                GROUP BY stockholders.name');

        return view('acciones.index', compact('result'));
	}

	/**
	 * Show the form for creating a new resource.
	 *
	 * @return Response
	 */
	public function create()
	{
		$stockholders = Stockholder::lists('name', 'id');
		return view('acciones/create', compact('stockholders'));
	}

	/**
	 * Store a newly created resource in storage.
	 *
	 * @param Request $request
	 * @return Response
	 */
	public function store(Request $request)
	{
		$this->validate($request, [
			'accionista' => 'required',
			'fecha' => 'required',
			'n_acciones' => 'required',
		]);
		
		$VALOR_ACCION = 300;
		$MONTO = $VALOR_ACCION * $request->n_acciones;
		
		$stock = new Stock();
		$stock->stockholder_id = $request->accionista;
		$stock->fecha = DateTime::createFromFormat('d/m/Y', $request->fecha)->format('Y-m-d');
		$stock->monto = $MONTO;
		$stock->save();

		//nombre del accionista
		$result = Stockholder::where('id', $request->accionista)->first(['name']);
		$accionista = $result->name;

		//asiento correspondiente
		$asiento = new Accounting();
		$asiento->debe = 'Banco';
		$asiento->haber = 'Capital';
		$asiento->monto = $MONTO;
		$asiento->fecha = DateTime::createFromFormat('d/m/Y', $request->fecha)->format('Y-m-d');
		$asiento->descripcion = "Compra de " . $request->n_acciones . " acción(es) " . $accionista;
		$asiento->stock_id = $stock->id;
		$asiento->save();

        return redirect('asientos');
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
