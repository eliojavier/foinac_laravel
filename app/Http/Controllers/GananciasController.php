<?php namespace App\Http\Controllers;

use App\Accounting;
use App\Http\Requests;
use App\Http\Controllers\Controller;

use App\Profit;
use DateTime;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class GananciasController extends Controller {

	/**
	 * Display a listing of the resource.
	 *
	 * @return Response
	 */
	public function index()
	{
		$result = Profit::all();
		return view('ganancias.index', compact('result'));
	}

	/**
	 * Show the form for creating a new resource.
	 *
	 * @return Response
	 */
	public function create()
	{
		return view('ganancias.create');
	}

	/**
	 * Store a newly created resource in storage.
	 *
	 * @return Response
	 */
	public function store(Request $request)
	{
		$this->validate($request,[
			'monto' => 'required',
			'concepto' => 'required',
			'fecha' => 'required'
		]);

		if(Auth::user()->id == 1 or Auth::user()->id == 2) {
			$ganancia = new Profit();
			$ganancia->monto = $request->monto;
			$ganancia->concepto = $request->concepto;
			$ganancia->fecha = DateTime::createFromFormat('d/m/Y', $request->fecha)->format('Y-m-d');
			$ganancia->save();

			//asiento correspondiente
			$asiento = new Accounting();
			$asiento->debe = 'Banco';
			$asiento->haber = 'Ganancia';
			$asiento->monto = $request->monto;
			$asiento->fecha = DateTime::createFromFormat('d/m/Y', $request->fecha)->format('Y-m-d');
			$asiento->descripcion = "Ganancia por monto de bolívares " . $request->monto;
			$asiento->profit_id = $ganancia->id;
			$asiento->save();
		}

		return redirect('ganancias');
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
