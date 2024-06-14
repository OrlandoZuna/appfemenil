<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Persona;

//use Barryvdh\DomPDF\Facade\pdf as PDF;
use Barryvdh\DomPDF\Facade\pdf as PDF;
use Carbon\Carbon;
use DB;
class PdfController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }

    public function invoice(Request $request, $id) 
    {
        $date = date('Y-m-d');

        $persona = Persona::findOrFail($id);
        //$persona = Persona::find(1);
        $pdf = PDF::loadView('pdf.pdfregistro', compact('date', 'persona'))
            ->setPaper('letter')->set_option('isRemoteEnabled', true);
        //$view =  \View::make('pdf.pdfregistro', compact('date', 'persona'))->render();
        //$pdf = \App::make('dompdf.wrapper');
        //$pdf->set_option('isRemoteEnabled', true);
        //$pdf->loadHTML($view);
        
        return $pdf->stream('pdfregistro.pdf');
    }
    public function getData() 
    {
        $data =  [
            'quantity'      => '1' ,
            'description'   => 'some ramdom text',
            'price'   => '500',
            'total'     => '500'
        ];
        return $data;
    }

    public function edit($id)
    {
        $date = date('Y-m-d');
       
        $persona = Persona::find(1);
        $view =  \View::make('pdf.pdfregistro', compact('data', 'date', 'persona'))->render();
        $pdf = \App::make('dompdf.wrapper');
        $pdf->loadHTML($view);
        return $pdf->stream('pdf.pdfregistro');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
