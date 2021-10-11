<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\DB;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Sale;
use App\Client;
use App\Store;
use App\Item;
use App\Sales_detail;
use App\Items_store;
use App\Returnsale;

use App\Transaction;
use App\Manufacture;
use App\Package;
use Carbon\Carbon;
class SaleController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
     public function print()
     {}
    public function index(Request $request)
    {
        //
        $Sale_edit='';
        $Sales_edit='';
        $Sales = Sale::all();
 $Sale_no=Sale::select('num')->orderBy('id', 'desc')->first()['num']+1;
//$Sale_no=5;
if($Sale_no==null||$Sale_no==''){
  $Sale_no=1;

}
            // $clients = Client::where('state', 1)
            // ->orderBy('id')
            // ->get();
            $clients = DB::table('clients')
                        ->join('accounts', 'accounts.id', '=', 'clients.account_id')
                        ->select('clients.*', 'clients.name', 'clients.id','accounts.opening_balance')
                        ->get();
            $stores = Store::
            orderBy('id')
            ->get();
            $items = Item::where('state', 1)
            ->orderBy('id')
            ->get();
            $products = Manufacture::where('state', 1)
            ->orderBy('id')
            ->get();
            $packages = Package::where('state', 1)
            ->orderBy('id')
            ->get();
if($request->input('id')){
  $Sale_edit = DB::table('sales')
              ->join('clients', 'sales.customer_id', '=', 'clients.id')
              ->select('sales.*', 'clients.balance')->where('sales.id',$request->input('id'))
              ->get();

              $Sales_edit = DB::table('sales')
                          ->join('sales_details', 'sales.id', '=', 'sales_details.sale_id')
                          // ->join('items_stores', 'sales_details.product_id', '=', 'items_stores.item_id')

                          ->join('manufactures', 'manufactures.id', '=', 'sales_details.product_id')
                          // ->innerjoin('manufactures', 'manufactures.id', '=', 'sales_details.sale_id')
                          ->join('packages', 'packages.id', '=', 'sales_details.p_type_id')

                          ->select('sales_details.*','manufactures.*','packages.*')->where('sales.id',$request->input('id'))

                          ->get();
              // print_r($Sales_edit);
  // $Sale_edit = Sale::findOrFail($request->input('id'));
  // return view('Items.edit', compact('item'));
}
        return view('Sales.index', array('Sales_edit'=>$Sales_edit,'Sale_edit'=>$Sale_edit,'packages'=>$packages,'products'=>$products,'stores'=>$stores,'clients'=>$clients,'Sale_no'=>$Sale_no,'Sales'=>$Sales));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        //return view('bowner.Sale.create');
      //  $clients = Client::all();
      $clients = Client::where('state', 1)
                     ->orderBy('id')
                     ->get();

      $Sale_no=Sale::orderBy('id', 'desc')->first()->num;

        return view('Sales.create', compact(array('Sale_no'=>$Sale_no,'Clients'=>$clients)));

    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {


        $Client = Client::findOrFail($request->client_id);
        $new_balance= $Client->balance+$request->total;

        // Make sure you've got the Page model
        if($Client) {
            $Client->balance = $new_balance;
          $Client->save();
          // create transaction
          $trans_no=Transaction::select('trans_id')->orderBy('trans_id', 'desc')->first()['num']+1;

          $transaction = new Transaction();

          $transaction->account_id = $Client->account_id;
          $transaction->trans_id =$trans_no;
          $transaction->depit =$request->total ;
          $transaction->credit = 0;


          $transaction->save();
        }

        $Sale = new Sale();
        $Sale->num = $request->sale_no;
        // $Sale->date = $request->sale_date;
        $Sale->date  = Carbon::parse($request->date)->format('Y-m-d H:i:s');

        $Sale->customer_id = $request->client_id;
        $Sale->total= $request->total;
        $Sale->save();

foreach ( $request->sale_items as $Sale_item) {
// echo($Sale_item['product_id']);
// print_r($Sale_item['product_id']);

  // $items_store = Items_store::findOrFail( $Sale_item['product_id']);
  $items_store = Items_store::where('item_id', $Sale_item['product_id'])->firstOrFail();
  // Make sure you've got the Page model
  if($items_store) {
      // $items_store->quantity -=$Sale_item['product_qty'];
      $items_store->quantity=$items_store->quantity-$return_item['return_qty'];

    $items_store->save();
  }

  $package = Package::findOrFail( $Sale_item['package_type']);
  // Make sure you've got the Page model
  if($package) {
      $package->quantity -=$Sale_item['package_num2'];
    $package->save();
  }
// $items_store->save();

  $Sale_details = new Sales_detail();
  $Sale_details->sale_id = $Sale->id;
  $Sale_details->product_id = $Sale_item['product_id'];
  $Sale_details->sale_price = $Sale_item['product_sale_price'];

  $Sale_details->p_type_id =$Sale_item['package_type'];
  $Sale_details->p_weight =$Sale_item['package_weight'];

  $Sale_details->p_count =$Sale_item['package_num2'];
  $Sale_details->product_qty =$Sale_item['product_qty'];

  // $Sale_details->total_cost = $Sale_item['item_id'];
  $Sale_details->save();


$items_store = new Items_store();
$items_store->item_id=$Sale_item['product_id'];
$items_store->store_id=1;
$items_store->quantity+=$Sale_item['product_qty'];

$items_store->save();

}


        Session::flash('created_message', 'The new Sale has been added');


        $Sales = Sale::all();
        $Sale_no=Sale::select('num')->orderBy('id', 'desc')->first()['num']+1;

            $clients = Client::where('state', 1)
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
              'msg' => 'The new Sale has been created',
          );
         return response()->json($response);
            // return view('Sales.index', array('items'=>$items,'stores'=>$stores,'Clients'=>$clients,'Sale_no'=>$Sale_no,'Sales'=>$Sales))
            // ->with('success', 'Sale created successfully');
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
        $Sale = Sale::findOrFail($id);

        return view('Sales.edit', compact('Sale'));
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
        $Sale = Sale::findOrFail($request->id);

      /*  $this->validate($request, [
            'phone' => 'required|digits_between:9,11,phone,'.$Sale->id,
        ]);*/


                $Client = Client::findOrFail($request->client_id);
                $new_balance= $Client->balance+$request->total;

                // Make sure you've got the Page model
                if($Client) {
                    $Client->balance = $new_balance;
                  $Client->save();
                }
                // $Sale = new Sale();
                $Sale->num = $request->sale_no;
                // $Sale->date = $request->sale_date;
                // $Sale->date  = Carbon::parse($request->date)->format('Y-m-d H:i:s');

                $Sale->customer_id = $request->client_id;
                $Sale->total= $request->total;
                $Sale->save();



//////old Details
$Sale_details = new Sales_detail();

        foreach ( $request->sale_items as $Sale_item) {
        // echo($Sale_item['product_id']);
        // print_r($Sale_item['product_id']);

          // $items_store = Items_store::findOrFail( $Sale_item['product_id']);
          // $items_store = Items_store::where('item_id', $Sale_item['product_id'])->firstOrFail();
          // // Make sure you've got the Page model
          // if($items_store) {
          //     $items_store->quantity -=$Sale_item['product_qty'];
          //   $items_store->save();
          // }

          // $package = Package::findOrFail( $Sale_item['package_type']);
          // // Make sure you've got the Page model
          // if($package) {
          //     $package->quantity -=$Sale_item['package_num2'];
          //   $package->save();
          // }
        // $items_store->save();
        $check_find = Sales_detail::where(array('sale_id'=>$request->id,'product_id'=>$Sale_item['product_id']))->first();
if($check_find === null){
  $Sale_details = new Sales_detail();
  $Sale_details->sale_id = $Sale->id;
  $Sale_details->product_id = $Sale_item['product_id'];
  $Sale_details->sale_price = $Sale_item['product_sale_price'];

  $Sale_details->p_type_id =$Sale_item['package_type'];
  $Sale_details->p_weight =$Sale_item['package_weight'];

  $Sale_details->p_count =$Sale_item['package_num2'];
  $Sale_details->product_qty =$Sale_item['product_qty'];

  // $Sale_details->total_cost = $Sale_item['item_id'];
  $Sale_details->save();


               }else{
                 $Sale_details = Sales_detail::where(array('sale_id'=>$request->id,'product_id'=>$Sale_item['product_id']))
                          ->update([
                              'sale_price'=> $Sale_item['product_sale_price'],
                              'p_type_id' => $Sale_item['package_type'],
                              'p_weight' => $Sale_item['package_weight'],
                              'p_count'=> $Sale_item['package_num2'],
                              'product_qty'=>$Sale_item['product_qty']
                          ]);


   }

        // $items_store = new Items_store();
        // $items_store->item_id=$Sale_item['product_id'];
        // $items_store->store_id=1;
        // $items_store->quantity+=$Sale_item['product_qty'];
        //
        // $items_store->save();

        }


                Session::flash('created_message', 'The new Sale has been added');


                $Sales = Sale::all();
                $Sale_no=Sale::select('num')->orderBy('id', 'desc')->first()['num']+1;

                    $clients = Client::where('state', 1)
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
                      'msg' => 'The new Sale has been created',
                  );
                 return response()->json($response);

        Session::flash('update_message', 'The new Sale has been updated');

      //  return redirect('Sales.index');
      $response = array(
        'status' => 'success',
        'msg' => 'The new Sale has been updated',
    );
   return response()->json($response);
    //return redirect()->action('SaleController@index');

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */

     public function revesesale(Request $request){
       //
       $Sale_edit='';
       $Sales_edit='';
       $Sales = Sale::all();
       $return_no=Returnsale::select('reverse_no')->orderBy('id', 'desc')->first()['num']+1;
       //$Sale_no=5;
       if($return_no==null||$return_no==''){
        $return_no=1;

       }

// $Sale_no=Sale::select('num')->orderBy('id', 'desc')->first()['num']+1;
$Sale_no = Sale::where('id',$_GET['id'])->pluck('num')[0];

           // $clients = Client::where('state', 1)
           // ->orderBy('id')
           // ->get();
           $clients = DB::table('clients')
                       ->join('accounts', 'accounts.id', '=', 'clients.account_id')
                       ->select('clients.*', 'clients.name', 'clients.id','accounts.opening_balance')
                       ->get();
           $stores = Store::
           orderBy('id')
           ->get();
           $items = Item::where('state', 1)
           ->orderBy('id')
           ->get();
           $products = Manufacture::where('state', 1)
           ->orderBy('id')
           ->get();
           $packages = Package::where('state', 1)
           ->orderBy('id')
           ->get();
           $previous_returns=Returnsale::get();
if($request->input('id')){
 $Sale_edit = DB::table('sales')
             ->join('clients', 'sales.customer_id', '=', 'clients.id')
             ->select('sales.*', 'clients.balance')->where('sales.id',$request->input('id'))
             ->get();

             $Sales_edit = DB::table('sales')
                         ->join('sales_details', 'sales.id', '=', 'sales_details.sale_id')
                         ->join('manufactures', 'manufactures.id', '=', 'sales_details.product_id')
                         // ->innerjoin('manufactures', 'manufactures.id', '=', 'sales_details.sale_id')
                         ->join('packages', 'packages.id', '=', 'sales_details.p_type_id')
                         // ->leftjoin('returns', 'returns.reverse_no', '=', 'sales.num')
                         ->select('sales_details.*','sales_details.id as sale_detail_id' ,'manufactures.*','packages.*')->where('sales.id',$request->input('id'))

                         ->get();
             // print_r($Sales_edit);
 // $Sale_edit = Sale::findOrFail($request->input('id'));
 // return view('Items.edit', compact('item'));
}
return view('Sales.reversesale', array('previous_returns'=>$previous_returns,'return_no'=>$return_no,'Sale_no'=>$Sale_no,'Sales_edit'=>$Sales_edit,'Sale_edit'=>$Sale_edit,'packages'=>$packages,'products'=>$products,'stores'=>$stores,'clients'=>$clients,'Sale_no'=>$Sale_no,'Sales'=>$Sales));

  // return view('Sales.reversesale');
     }
     public function createReturn(Request $request){

       $Client = Client::findOrFail($request->client_id);
       $new_balance= $Client->balance-$request->total;

       // Make sure you've got the Page model
       if($Client) {
           $Client->balance = $new_balance;
         $Client->save();
         // create transaction
         $trans_no=Transaction::select('trans_id')->orderBy('trans_id', 'desc')->first()['num']+1;

         $transaction = new Transaction();

         $transaction->account_id = $Client->account_id;
         $transaction->trans_id =$trans_no;
         $transaction->depit =0 ;
         $transaction->credit = $request->total;


         $transaction->save();
       }
       /// insert return details
       foreach ( $request->return_items as $return_item) {
         $return = new Returnsale();
           $return->reverse_no= $request->return_no;

           $return->sale_no = $request->sale_no;
           $return->sale_detail_id = $return_item['sale_detail_id'];
           $return->product_id =$return_item['product_id'];
           $return->reverse_qty = $return_item['return_qty'];
           $return->previous_qty = $return_item['previous_quantity'];

             $return->save();
/// return package
             $return_package=Package::findOrFail( $return_item['package_type']);
             $return_package->quantity+=$return_item['package_count'];
             $return_package->save();



             /// return product
             $return_product=Items_store::where('item_id', $return_item['product_id'])->first();

                $return_product->quantity=$return_product->quantity+$return_item['return_qty'];
                $return_product->save();
             // $affected = DB::table('items_stores')
             //               ->where('item_id', $return_item['item_id'])
             //               ->update(['quantity' => $return_item['return_quantity']]);
                           // Items_store::where('item_id', $return_item['item_id'])->decrement('quantity', $return_item['return_quantity']);

             // $Items_store = Items_store::where('item_id',$return_item['item_id'])->first()->update('quantity',$return_item['now_quantity']-$return_item['return_quantity']);
             // ->where('id', 1)
             //               ->update(['votes' => 1]);
             // $Items_store[0]->quantity= $Items_store->quantity-$return_item['return_quantity'];
             // $Items_store->save();
       }



               $response = array(
                 'status' => 'success',
                 'msg' => 'The new Sale has been returned',
             );

                return response()->json($response);

     }
    public function destroy($id)
    {
        //
      /*  $Sale = Sale::findOrFail($id);

        $Sale->delete();

        Session::flash('deleted_message', 'The Sale has been deleted');

        return redirect('/bowner/Sale');*/
        Sale::find($id)->delete();
        return redirect()->route('Sales.index')
            ->with('success', 'Sale deleted successfully');
    }
}
