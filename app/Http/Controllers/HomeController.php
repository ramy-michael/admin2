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
use App\Client;


use App\Sale;
use App\Sales_detail;
use Illuminate\Support\Facades\DB;

class HomeController extends Controller
{
    // public function index()
    // {
    //     return view('home/index');
    // }

    public function minor()
    {
      $Invoices = Invoice::orderBy('id','desc')
                     ->get();
foreach ($Invoices as $Invoice) {
  $items = Invoices_details::where('invoice_id', $Invoice->num)->get();
                 //->orderBy('id')
                $items_arr=[];
  $x=0;
foreach($items as $item){

$item_name= Item::where('id', $item->item_id)->first();
$items_arr[$x]['item_name']=$item_name->name;
$items_arr[$x]['item_qty']=$item->quantity;
$items_arr[$x]['item_price']=$item_name->unit_price;


$x++;
}
$Invoice->items_arr=$items_arr;
  // code...
  // $Invoices->setAttribute('items', $items);

  // $Invoices->items=$items;
}

      return view('home/minor', compact('Invoices'));
        // return view('home/minor');
    }

    public function index()
    {
      // $Sales = Sale::orderBy('id','desc')
      //                ->get();

                     $Sales = DB::table('sales')
            ->join('clients', 'clients.id', '=', 'sales.customer_id')
            // ->join('orders', 'users.id', '=', 'orders.user_id')
            ->select('sales.*', 'clients.name')
            ->get();
    foreach ($Sales as $Sale) {
    $products = Sales_detail::where('Sale_id', $Sale->num)->get();
                 //->orderBy('id')
                $products_arr=[];
    $x=0;
    foreach($products as $product){

    $product_name= product::where('id', $product->product_id)->first();
    $products_arr[$x]['product_name']=$product_name->name;
    $products_arr[$x]['product_qty']=$product->quantity;
    $products_arr[$x]['product_price']=$product_name->unit_price;


    $x++;
    }
    $Sale->products_arr=$products_arr;
    // code...
    // $Sales->setAttribute('products', $products);

    // $Sales->products=$products;
    }

      return view('home/index', compact('Sales'));
        // return view('home/minor');
    }
    public function payment()
    {
      // $Sales = Sale::orderBy('id','desc')
      //                ->get();

                     $Sales = DB::table('sales')
            ->join('clients', 'clients.id', '=', 'sales.customer_id')
            // ->join('orders', 'users.id', '=', 'orders.user_id')
            ->select('sales.*', 'clients.name')
            ->get();
    foreach ($Sales as $Sale) {
    $products = Sales_detail::where('Sale_id', $Sale->num)->get();
                 //->orderBy('id')
                $products_arr=[];
    $x=0;
    foreach($products as $product){

    $product_name= product::where('id', $product->product_id)->first();
    $products_arr[$x]['product_name']=$product_name->name;
    $products_arr[$x]['product_qty']=$product->quantity;
    $products_arr[$x]['product_price']=$product_name->unit_price;


    $x++;
    }
    $Sale->products_arr=$products_arr;
    // code...
    // $Sales->setAttribute('products', $products);

    // $Sales->products=$products;
    }
    $clients = Client::where('state', 1)
                   ->orderBy('id')
                   ->get();
                   // print_r($clients);
      return view('home/payment', array('Sales'=>$Sales,'clients'=>$clients));
        // return view('home/minor');
    }
    public function loaddata(Request $request){
      // $items = Item::where('state', 1)
      // ->orderBy('id')
      // ->get();
      $invoice_id=$request->invoice_id;

      // $items=Invoices_details::where('invoice_id', $invoice_id)->all();
      $items = Invoices_details::where('invoice_id', $invoice_id)->get();
                     //->orderBy('id')
foreach($items as $item){
  $item_name= Item::where('id', $item->item_id)->first();
$item->item_name=$item_name->name;

}
      return response()->json($items);

    }

}
