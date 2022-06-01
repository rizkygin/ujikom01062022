<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Auth;
use App\Models\Debt;
use App\Models\Payment;

use App\Exports\PaymentExport;
use Excel;

use PDF;

class PaymentController extends Controller
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

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {

        $debts = Debt::all();
        return view('createPayment',compact(['debts']));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        Payment::create([
            'user_id' =>  Auth::id(),
            'debt_id' => $request->debt,
            'month' => $request->jumlah_bulan
        ]);
        return redirect('/home')->with('status','Sukses Menambah Pembiayaan') ;
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
    public function edit($id)
    {
        $edit = Payment::find($id);
        $debts = Debt::all();
        // dd($edit);
        return view('createPayment',compact(['edit','debts']));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {

        $payment = Payment::find($id);
        $payment->month = $request->jumlah_bulan;
        $payment->debt_id = $request->debt;
        $payment->save();
        return redirect('/home')->with('status','Success Edited');

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        Payment::destroy($id);

        return back()->with('delete', 'Pembiayaan '.$id.' Dihapus');
    }

    public function export_excel(){
        return Excel::download(new PaymentExport, 'payment.xlsx');
    }
    public function export_pdf (){
        $payments = Payment::all();

    	$pdf = PDF::loadview('exports.payment',['payments'=>$payments]);
    	return $pdf->download('recap-payment-pdf');
    }
}
