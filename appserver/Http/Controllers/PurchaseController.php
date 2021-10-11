<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Session;
use Illuminate\Http\Request;

use App\Http\Requests;
use App\Invoice;
use App\Supplier;
use App\Store;
use App\Item;
use App\Invoices_details;
use App\Items_store;
use DB;

use App\Refund;


class purchaseController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
      $invoices = Invoice::all();
    $invoice_no=Invoice::select('num')->orderBy('id', 'desc')->first()['num']+1;
    $return_no='';
    $return_no=Refund::select('refund_no')->orderBy('id', 'desc')->first()['refund_no']+1;
    //$invoice_no=5;
    // print_r()
    if($return_no==null||$return_no==''){
    $return_no=1;

    }
    $invoice_id=$_GET['id'];
    // print_r($invoice_no);

    // $supplier=Invoice::where('id',$invoice_no )->first();
    $invoice_no=Invoice::where('id',$invoice_id )->first();

          $supplier_name = Supplier::where('id',$invoice_no->supplier_id )->get();


$invoice_no=$invoice_no->num;
          $stores = Store::
          orderBy('id')
          ->get();
          $items_id = invoices_details::where('invoice_id',$invoice_id )
          ->orderBy('id')
          ->pluck('item_id')->toArray();
          // ->get('item_id');
          $items = Item::whereIn('id',$items_id )
          ->orderBy('id')
          ->get();
          $invoices_details = Items_store::whereIn('item_id',$items_id )
          ->orderBy('item_id')
          ->get();
          $invoices_refunds= Refund::where('invoice_no',$invoice_no )
          ->orderBy('id')
          ->get();
          // $Items_store=Items_store::all();
          if($request->input('id')){
            // $updated_manufacture=Manufacture::findOrFail($_GET['id']);
            $updated_invoice = DB::table('invoices')


                           ->join('refunds', 'invoices.num', '=', 'refunds.invoice_no')


                        ->select('invoices.*','refunds.*')->where('invoices.id',$request->input('id'))

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
          // print_r($updated_invoice);
      return view('purchases.index', array('updated_invoice'=>$updated_invoice,'invoices_refunds'=>$invoices_refunds,'invoices_details'=>$invoices_details,'invoice_no'=>$invoice_no,'return_no'=>$return_no,'items'=>$items,'stores'=>$stores,'supplier_name'=>$supplier_name,'invoice_no'=>$invoice_no,'invoices'=>$invoices));
        // return view('purchases.index');
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




foreach ( $request->refund_items as $refund_item) {
  $Refund = new Refund();
    $Refund->refund_no= $request->return_no;

    $Refund->invoice_no = $request->invoice_no;
    $Refund->item_id =$refund_item['item_id'];
    $Refund->refund_quantity = $refund_item['refund_quantity'];
    $Refund->previous_quantity = $refund_item['previous_quantity'];

      $Refund->save();
      // $affected = DB::table('items_stores')
      //               ->where('item_id', $refund_item['item_id'])
      //               ->update(['quantity' => $refund_item['refund_quantity']]);
                    Items_store::where('item_id', $refund_item['item_id'])->decrement('quantity', $refund_item['refund_quantity']);

      // $Items_store = Items_store::where('item_id',$refund_item['item_id'])->first()->update('quantity',$refund_item['now_quantity']-$refund_item['refund_quantity']);
      // ->where('id', 1)
      //               ->update(['votes' => 1]);
      // $Items_store[0]->quantity= $Items_store->quantity-$refund_item['refund_quantity'];
      // $Items_store->save();
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
