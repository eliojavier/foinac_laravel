<?php namespace App\Http\Controllers;

use App\Asiento;
use App\Http\Requests;
use App\Http\Controllers\Controller;

use App\Stock;
use App\Stockholder;
use App\User;
use Carbon\Carbon;
use DateTime;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class AccionesController extends Controller {

	/**
	 * Display a listing of the resource.
	 *
	 * @return Response
	 */
	public function index()
	{
        $result = DB::select('SELECT 	stockholders.id AS id, 
										stockholders.name AS accionista, 
										COUNT(stockholders.name) AS numacciones, 
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
		if(Auth::user()->id == 1 or Auth::user()->id == 2){
            $stockholders = Stockholder::lists('name', 'id');
            return view ('acciones/create', compact('stockholders'));
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
			'n_acciones' => 'required',
			'monto' => 'required',
		]);

		if(Auth::user()->id == 1 or Auth::user()->id == 2) {
            for ($i = 0; $i < $request->n_acciones; $i++) {
                $stock = new Stock();

                $stock->stockholder_id = $request->accionista;
                $stock->fecha = DateTime::createFromFormat('d/m/Y', $request->fecha)->format('Y-m-d');
                $stock->monto = 300;
                $stock->save();
            }

			$result = Stockholder::where('id', '=', $request->accionista )->lists('name');

			$accionista = 0;
			foreach ($result as $r){
				$accionista = $r;
			}

            $asiento = new Asiento();
            $asiento->debe = 'Banco';
            $asiento->haber = 'Capital';
            $asiento->monto = $request->monto;
            $asiento->fecha = DateTime::createFromFormat('d/m/Y', $request->fecha)->format('Y-m-d');
            $asiento->descripcion = "Compra de " . $request->n_acciones . " acciones " . $accionista;
            $asiento->save();
        }
        return redirect('acciones');
	}
gogit 
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
