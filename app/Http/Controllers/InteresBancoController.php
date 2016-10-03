<?php namespace App\Http\Controllers;

use App\Accounting;
use App\BankInterest;
use App\Http\Requests;
use App\Http\Controllers\Controller;

use DateTime;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class InteresBancoController extends Controller {

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
		$result = BankInterest::all();
		return view ('interesbanco/index', compact('result'));
	}

	/**
	 * Show the form for creating a new resource.
	 *
	 * @return Response
	 */
	public function create()
	{
		return view('interesbanco/create');
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
			'fecha' => 'required',
		]);

		$interesBanco = new BankInterest();
		$interesBanco->monto = $request->monto;
		$interesBanco->fecha = DateTime::createFromFormat('d/m/Y', $request->fecha)->format('Y-m-d');
		$interesBanco->concepto = $request->concepto;
		$interesBanco->save();

		//asiento correspondiente
		$asiento = new Accounting();
		$asiento->debe = 'Banco';
		$asiento->haber = 'Interés bancario';
		$asiento->monto = $request->monto;
		$asiento->fecha = DateTime::createFromFormat('d/m/Y', $request->fecha)->format('Y-m-d');
		$asiento->descripcion = "Interés bancario por monto de bolívares " . $request->monto;
		$asiento->bank_interest_id = $interesBanco->id;
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
