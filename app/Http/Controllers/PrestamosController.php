<?php namespace App\Http\Controllers;

use App\Http\Requests;
use App\Http\Controllers\Controller;

use App\Loan;
use App\Stockholder;
use DateTime;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class PrestamosController extends Controller {

	/**
	 * Display a listing of the resource.
	 *
	 * @return Response
	 */
	public function index()
	{
        $result = DB::select
                            ('SELECT stockholders.name AS accionista, 
										loans.fecha AS fecha,
                              			loans.monto AS prestamo,
                              			SUM(payments.montoCapital) AS pagos,
                              			(loans.monto - SUM(payments.montoCapital)) AS deuda,
                              			SUM(payments.montoInteres) AS interesespagados
                              FROM stockholders, loans, payments
                              WHERE stockholders.id = loans.stockholder_id AND 
									payments.loan_id = loans.id AND
                                    loans.fuePagado = 0
                              ORDER BY stockholders.name');

        return view('prestamos.index', compact('result'));
	}

	/**
	 * Show the form for creating a new resource.
	 *
	 * @return Response
	 */
	public function create()
	{
        if(Auth::user()->id == 1 or Auth::user()->id == 2) {
            $stockholders = Stockholder::lists('name', 'id');

            return view('prestamos/create', compact('stockholders'));
        }
        return redirect('home');
	}

	/**
	 * Store a newly created resource in storage.
	 *
	 * @return Response
	 */
	public function store(Request $request)
	{
		$this->validate($request, [
			'accionista' => 'required',
			'fecha' => 'required',
			'monto' => 'required'
		]);

		$loan = new Loan();

		$loan->stockholder_id = $request->accionista;
		$loan->fecha=DateTime::createFromFormat('d/m/Y', $request->fecha)->format('Y-m-d');
		$loan->monto = $request->monto;

		$loan->save();

        return redirect('prestamos');
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
