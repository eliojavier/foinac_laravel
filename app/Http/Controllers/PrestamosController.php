<?php namespace App\Http\Controllers;

use App\Accounting;
use App\Http\Requests;
use App\Loan;
use App\Payment;
use App\Stockholder;
use DateTime;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class PrestamosController extends Controller {

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
        $result = DB::select ('SELECT 	loans.id AS id,
 										stockholders.name AS accionista, 
										DATE_FORMAT(loans.fecha, "%d/%m/%Y") AS fecha,
                              			loans.monto AS prestamo,
                              			SUM(payments.montoCapital) AS pagos,
                              			(loans.monto - SUM(payments.montoCapital)) AS deuda,
                              			SUM(payments.montoInteres) AS interesespagados
								FROM stockholders INNER JOIN loans ON stockholders.id = loans.stockholder_id
								LEFT JOIN payments ON payments.loan_id = loans.id 
								WHERE loans.fuePagado = 0
								GROUP BY loans.id
                              	ORDER BY loans.fecha');

        return view('prestamos.index', compact('result'));
	}

	/**
	 * Show the form for creating a new resource.
	 *
	 * @return Response
	 */
	public function create()
	{
		$stockholders = Stockholder::lists('name', 'id');
		return view('prestamos/create', compact('stockholders'));
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
		$loan->monto = $request->monto;
		$loan->fecha = DateTime::createFromFormat('d/m/Y', $request->fecha)->format('Y-m-d');
		$loan->concepto = $request->concepto;
		$loan->save();

		$result = Stockholder::where('id', $request->accionista)->first(['name']);
		$accionista = $result->name;

		//asiento correspondiente
		$asiento = new Accounting();
		$asiento->debe = 'Cuentas por cobrar';
		$asiento->haber = 'Banco';
		$asiento->monto = $request->monto;
		$asiento->fecha = DateTime::createFromFormat('d/m/Y', $request->fecha)->format('Y-m-d');
		$asiento->descripcion = "Préstamo " . $accionista . " por monto de bolívares " . $request->monto;
		$asiento->loan_id = $loan->id;
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
		$loan = Loan::find($id);
		$payments = Payment::where('loan_id', '=', $id)->get();
		 return view ('prestamos/show', compact('loan', 'payments'));
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
