<?php namespace App\Http\Controllers;

use App\Currency;
use App\Http\Requests;
use App\Http\Controllers\Controller;

use DateTime;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class VentasDivisasController extends Controller {

	/**
	 * Display a listing of the resource.
	 *
	 * @return Response
	 */
	public function index()
	{
		$result = Currency::where('tipo', 'venta')->get();
		return view('ventasdivisas.index', compact('result'));
	}

	/**
	 * Show the form for creating a new resource.
	 *
	 * @return Response
	 */
	public function create()
	{
		$monedas = array(['dolar' => 'dolar', 'euro' => 'euro']);
		return view('ventasdivisas.create', compact('monedas'));
	}

	/**
	 * Store a newly created resource in storage.
	 *
	 * @return Response
	 */
	public function store(Request $request)
	{
		$this->validate($request,[
			'cantidad' => 'required',
			'monto' => 'required',
			'moneda' => 'required',
			'fecha' => 'required'
		]);

		if(Auth::user()->id == 1 or Auth::user()->id == 2) {
			$ventaDivisas = new Currency();

			$ventaDivisas->cantidad = $request->cantidad;
			$ventaDivisas->monto = $request->monto;
			$ventaDivisas->moneda = $request->moneda;
			$ventaDivisas->fecha = DateTime::createFromFormat('d/m/Y', $request->fecha)->format('Y-m-d');
			if($request->tipo == 'compra')
				$ventaDivisas->tipo = "compra";
			else
				$ventaDivisas->tipo = "venta";

			$ventaDivisas->save();
		}

		return redirect('ventasdivisas');
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
