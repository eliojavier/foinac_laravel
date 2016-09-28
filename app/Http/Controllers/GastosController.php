<?php namespace App\Http\Controllers;

use App\Accounting;
use App\Expense;
use App\Http\Requests;
use App\Http\Controllers\Controller;

use DateTime;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class GastosController extends Controller {

	/**
	 * Display a listing of the resource.
	 *
	 * @return Response
	 */
	public function index()
	{
		$result = Expense::all();
		return view('gastos.index', compact('result'));
	}

	/**
	 * Show the form for creating a new resource.
	 *
	 * @return Response
	 */
	public function create()
	{
		return view('gastos.create');
	}

	/**
	 * Store a newly created resource in storage.
	 *
	 * @param Request $request
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
			$gasto = new Expense();
			$gasto->monto = $request->monto;
			$gasto->concepto = $request->concepto;
			$gasto->fecha = DateTime::createFromFormat('d/m/Y', $request->fecha)->format('Y-m-d');
			$gasto->save();

			//asiento correspondiente
			$asiento = new Accounting();
			$asiento->debe = 'Gastos bancarios';
			$asiento->haber = 'Banco';
			$asiento->monto = $request->monto;
			$asiento->fecha = DateTime::createFromFormat('d/m/Y', $request->fecha)->format('Y-m-d');
			$asiento->descripcion = "Gastos de operación por monto de bolívares " . $request->monto;
			$asiento->expense_id = $gasto->id;
			$asiento->save();
		}

		return redirect('gastos');
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
