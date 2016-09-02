<?php namespace App\Http\Controllers;

use App\Asiento;
use App\Http\Requests;
use App\Http\Controllers\Controller;

use App\Loan;
use App\Payment;
use DateTime;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use PhpParser\Node\Expr\Array_;

class PagosController extends Controller {

	/**
	 * Display a listing of the resource.
	 *
	 * @return Response
	 */
	public function index()
	{
        $result = DB::select('SELECT stockholders.name AS accionista, 
									DATE_FORMAT(payments.fecha, "%d/%m/%Y") AS fecha,
                              		loans.monto AS prestamo,
                              		payments.montoCapital AS pagoCapital,
                              		payments.montoInteres AS pagoInteres
                              FROM stockholders, loans, payments
                              WHERE stockholders.id = loans.stockholder_id AND 
									payments.loan_id = loans.id AND
                                    loans.fuePagado = 0
                              ORDER BY payments.fecha');

		return view('pagos.index', compact('result'));
	}

	/**
	 * Show the form for creating a new resource.
	 *
	 * @return Response
	 */
	public function create()
	{
		if(Auth::user()->id == 1 or Auth::user()->id == 2) {
			$result = DB::select('SELECT CONCAT (sh.name, "--" , ROUND(l.monto,0)) AS prestamo, l.id
										FROM stockholders sh, loans l
										WHERE sh.id = l.stockholder_id');
			
			$prestamos = array();
			
			foreach ($result as $r) {
				$prestamos = array_add($prestamos, $r->id, $r->prestamo);
			}
			return view('pagos/create', compact('prestamos'));
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
			'prestamo' => 'required',
			'fecha' => 'required',
			'montoInteres' => 'required',
            'montoCapital' => 'required'
		]);

        if(Auth::user()->id == 1 or Auth::user()->id == 2) {
            $payment = new Payment();
            $payment->loan_id = $request->prestamo;
            $payment->fecha = DateTime::createFromFormat('d/m/Y', $request->fecha)->format('Y-m-d');
            $payment->montoInteres = $request->montoInteres;
            $payment->montoCapital = $request->montoCapital;
            $payment->save();

            $result = DB::select('SELECT stockholders.name
                                    FROM stockholders, loans, payments
                                    WHERE payments.loan_id = ' . $request->prestamo .
                                        ' AND payments.loan_id = loans.id
                                          AND loans.stockholder_id = stockholders.id
                                    LIMIT 1');

            $accionista = 0;

            foreach ($result as $r){
                foreach ($r as $k){
                    $accionista = $k;
                }
            }

            $asiento = new Asiento();
            $asiento->debe = 'Banco';
            $asiento->haber = 'Cuentas por cobrar';
            $asiento->monto = $request->montoCapital;
            $asiento->fecha = DateTime::createFromFormat('d/m/Y', $request->fecha)->format('Y-m-d');
            $asiento->descripcion = "Amortización prestamo " .$accionista;
            $asiento->save();

            $asiento = new Asiento();
            $asiento->debe = 'Banco';
            $asiento->haber = 'Intereses por prestamo';
            $asiento->monto = $request->montoInteres;
            $asiento->fecha = DateTime::createFromFormat('d/m/Y', $request->fecha)->format('Y-m-d');
            $asiento->descripcion = "Pago intereses préstamo " .$accionista;
            $asiento->save();
        }
        return redirect('pagos');
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
