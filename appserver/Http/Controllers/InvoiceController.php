<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Session;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

use App\Http\Requests;
use App\Invoice;
use App\Supplier;
use App\Store;
use App\Item;
use App\Invoices_details;
use App\Items_store;

use App\Transaction;

use Carbon\Carbon;

class InvoiceController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        //
        $invoices = Invoice::all();
        $invoice_edit='';
        $updated_invoice='';
 $invoice_no=Invoice::select('num')->orderBy('id', 'desc')->first()['num']+1;
//$invoice_no=5;
if($invoice_no==null||$invoice_no==''){
  $invoice_no=1;

}
            $suppliers = Supplier::where('state', 1)
            ->orderBy('id')
            ->get();

            $stores = Store::
            orderBy('id')
            ->get();
            $items = Item::where('state', 1)
            ->orderBy('id')
            ->get();
            if($request->input('id')){
              // $updated_manufacture=Manufacture::findOrFail($_GET['id']);
              $updated_invoice = DB::table('invoices')
                          ->select('invoices.*')->where('invoices.id',$request->input('id'))
                          ->get();
                          $invoice_edit = DB::table('invoices')
                                      ->join('invoices_details', 'invoices.id', '=', 'invoices_details.invoice_id')
                                      // ->join('items_stores', 'items_stores.item_id', '=', 'invoices_details.item_id')
                                      //
                                      ->join('items', 'invoices_details.item_id', '=', 'items.id')
                                      ->join('suppliers', 'invoices.supplier_id', '=', 'suppliers.id')

                                      // ->innerjoin('manufactures', 'manufactures.id', '=', 'sales_details.sale_id')

                                      ->select('invoices.*','invoices_details.*','items.name as item_name','suppliers.*')->where('invoices.id',$request->input('id'))
                                      // ->select('invoices.*','invoices_details.*')->where('invoices.id',$request->input('id'))

                                      ->get();

            }
            // print_r($invoice_edit);
        return view('invoices.index', array('invoice_edit'=>$invoice_edit,'updated_invoice'=>$updated_invoice,'items'=>$items,'stores'=>$stores,'suppliers'=>$suppliers,'invoice_no'=>$invoice_no,'invoices'=>$invoices));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        //return view('bowner.Invoice.create');
      //  $suppliers = Supplier::all();
      $suppliers = Supplier::where('state', 1)
                     ->orderBy('id')
                     ->get();

      $invoice_no=Invoice::orderBy('id', 'desc')->first()->num;

        return view('Invoices.create', compact(array('invoice_no'=>$invoice_no,'suppliers'=>$suppliers)));

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
      $Invoice = new Invoice();

      /*  $this->validate($request, [
            'phone' => 'required|digits_between:9,11|unique:Invoices',
        ]);*/
        /////////update supplier balnce
        $new_balance= $request->supplier_balance-$request->total;
        // Supplier::where('id', $request->supplier_id)->update(array('balance' => $new_balance));

        // -----or-----

        $Supplier = Supplier::findOrFail( $request->supplier_id);
        // Make sure you've got the Page model
        if($Supplier) {
            $Supplier->balance = $new_balance;
          $Supplier->save();
          $trans_no=Transaction::select('trans_id')->orderBy('trans_id', 'desc')->first()['num']+1;


                  $transaction = new Transaction();

                  // $this->validate($request, [
                  //     'phone' => 'required|digits_between:9,11|unique:suppliers',
                  // ]);
          //open balnce to supplier
          //safe account
                  $transaction->account_id =$Supplier->id;
                  $transaction->trans_id =$trans_no;
                  $transaction->depit =0 ;
                  $transaction->credit =$request->total ;


                  $transaction->save();
        }
        // $this->validate($request, [
        //     'name' => 'required|max:255',
        //     'freight_cost' => 'max:255',
        //
        //     'phone' => 'max:255',
        //     'code' => 'max:255',
        //     'balance' => 'max:255',
        //
        //
        //     /*            'pricebook_id' => 'max:255',*/
        // ]);

        $Invoice->num = $request->invoice_no;

       $Invoice->date = Carbon::parse($request->invoice_date)->format('Y-m-d H:i:s');

        $Invoice->freight_cost = $request->freight_charge;

        $Invoice->other_expenses = 0;
        $Invoice->discount = $request->discount;
        $Invoice->paid= 0;
        $Invoice->debt =0;
        $Invoice->notes ='';
        $Invoice->supplier_id = $request->supplier_id;
        $Invoice->total= $request->total;
        $Invoice->save();

foreach ( $request->invoice_items as $invoice_item) {
  $Invoice_details = new Invoices_details();
  $Invoice_details->unit_price = $invoice_item['item_price'];
  $Invoice_details->quantity = $invoice_item['item_quantity'];
  $Invoice_details->total_item_price = $invoice_item['total_items'];

  $Invoice_details->invoice_id =$Invoice->id;
  $Invoice_details->item_id = $invoice_item['item_id'];
  $Invoice_details->save();
  $items_store = new Items_store();
$items_store->item_id=$invoice_item['item_id'];
$items_store->store_id=$invoice_item['store_id'];
$items_store->quantity=$invoice_item['item_quantity'];

$items_store->save();

}


        Session::flash('created_message', 'The new Invoice has been added');


        $invoices = Invoice::all();
        $invoice_no=Invoice::select('num')->orderBy('id', 'desc')->first()['num']+1;

            $suppliers = Supplier::where('state', 1)
            ->orderBy('id')
            ->get();

            $stores = Store::
            orderBy('id')
            ->get();
            $items = Item::where('state', 1)
            ->orderBy('id')
            ->get();
            $response = array(
              'status' => 'success',
              'msg' => 'The new invoice has been updated',
          );
         return response()->json($response);
            // return view('invoices.index', array('items'=>$items,'stores'=>$stores,'suppliers'=>$suppliers,'invoice_no'=>$invoice_no,'invoices'=>$invoices))
            // ->with('success', 'Invoice created successfully');
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
        //
        $Invoice = Invoice::findOrFail($id);

        return view('Invoices.edit', compact('Invoice'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request)
    {
        //
        $Invoice = Invoice::findOrFail($request->id);

      /*  $this->validate($request, [
            'phone' => 'required|digits_between:9,11,phone,'.$Invoice->id,
        ]);*/

        $Invoice->num = $request->num;
        $Invoice->date = $request->date;
        $Invoice->freight_cost = $request->freight_cost;

        $Invoice->other_expenses = $request->other_expenses;
        $Invoice->discount = $request->discount;
        $Invoice->paid= $request->paid;
        $Invoice->debt = $request->debt;
        $Invoice->notes = $request->notes;
        $Invoice->supplier_id = $request->supplier_id;
        $Invoice->total= $request->total;
        $Invoice->save();

        Session::flash('update_message', 'The new Invoice has been updated');

      //  return redirect('Invoices.index');
      $response = array(
        'status' => 'success',
        'msg' => 'The new Invoice has been updated',
    );
   return response()->json($response);
    //return redirect()->action('InvoiceController@index');

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
      /*  $Invoice = Invoice::findOrFail($id);

        $Invoice->delete();

        Session::flash('deleted_message', 'The Invoice has been deleted');

        return redirect('/bowner/Invoice');*/
        Invoice::find($id)->delete();
        return redirect()->route('Invoices.index')
            ->with('success', 'Invoice deleted successfully');
    }
}
