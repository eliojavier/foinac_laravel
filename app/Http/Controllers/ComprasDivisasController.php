<?php namespace App\Http\Controllers;

use App\Currency;
use App\Http\Requests;
use DateTime;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class ComprasDivisasController extends Controller {

	/**
	 * Display a listing of the resource.
	 *
	 * @return Response
	 */
	public function index()
	{
		$result = Currency::all();
		return view('comprasdivisas.index', compact('result'));
	}

	/**
	 * Show the form for creating a new resource.
	 *
	 * @return Response
	 */
	public function create()
	{
		if(Auth::user()->id == 1 or Auth::user()->id == 2) {
			$monedas = array(['dolar' => 'dolar', 'euro' => 'euro']);
			return view('comprasdivisas.create', compact('monedas'));

		}
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
			$compraDivisas = new Currency();
			
			$compraDivisas->cantidad = $request->cantidad;
			$compraDivisas->monto = $request->monto;
			$compraDivisas->moneda = $request->moneda;
			$compraDivisas->fecha = DateTime::createFromFormat('d/m/Y', $request->fecha)->format('Y-m-d');
			$compraDivisas->tipo = "compra";
			
			$compraDivisas->save();
		}

		return redirect('comprasdivisas');
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
