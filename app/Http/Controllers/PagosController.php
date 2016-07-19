<?php namespace App\Http\Controllers;

use App\Http\Requests;
use App\Http\Controllers\Controller;

use App\Loan;
use App\Payment;
use DateTime;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Http\Request;
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
		//
	}

	/**
	 * Show the form for creating a new resource.
	 *
	 * @return Response
	 */
	public function create()
	{
		$result = DB::select('SELECT CONCAT (sh.name, "--" , ROUND(l.monto,0)) AS prestamo, l.id
									FROM stockholders sh, loans l
									WHERE sh.id = l.stockholder_id');


        $prestamos = array();
        $ids = array();

//        foreach ($result as $key=>$value){
//            echo($key);
//            echo("salto");
//        }

        foreach ($result as $r){

                echo($r->prestamo);
                echo($r->id);
               $prestamos = array_add($prestamos, $r->id, $r->prestamo);

        }

        foreach ($result as $r){
            foreach ($r as $k){
                $ids = array_add($ids,$r->id, null);
            }
        }

//        foreach ($result as $r){
//            $prestamos[] = $r->prestamo ;
//            $prestamos[] = $r->id;
//        }


		return view ('pagos/create', compact('prestamos'));
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

		$payment = new Payment();

		$payment->loan_id = $request->prestamo;
		$payment->fecha=DateTime::createFromFormat('d/m/Y', $request->fecha)->format('Y-m-d');
		$payment->montoInteres = $request->montoInteres;
		$payment->montoCapital = $request->montoCapital;

		$payment->save();
		
		

        
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
