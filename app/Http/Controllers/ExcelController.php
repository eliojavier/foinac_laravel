<?php namespace App\Http\Controllers;

use App\Accounting;
use App\Http\Requests;
use App\Http\Controllers\Controller;

use Illuminate\Http\Request;
use Maatwebsite\Excel\Facades\Excel;

class ExcelController extends Controller {

	/**
	 * Display a listing of the resource.
	 *
	 * @return Response
	 */
	public function index()
	{
		dd("X");
//		Excel::create('Laravel Excel', function ($excel){
//			$excel->sheet('Asientos', function($sheet){
//				$asientos = Accounting::all();
//				$sheet->fromArray($asientos);
//			});
//		})->export('xls');

		Excel::create('Filename', function($excel) {

			// Set the title
			$excel->setTitle('Our new awesome title');

			// Chain the setters
			$excel->setCreator('Maatwebsite')
				->setCompany('Maatwebsite');

			// Call them separately
			$excel->setDescription('A demonstration to change the file properties');

		})->download('xlsx');
	}

	/**
	 * Show the form for creating a new resource.
	 *
	 * @return Response
	 */
	public function create()
	{
		//
	}

	/**
	 * Store a newly created resource in storage.
	 *
	 * @return Response
	 */
	public function store()
	{
		//
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
