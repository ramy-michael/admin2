<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Session;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;


use App\Http\Requests;
use App\Manufacture;
use App\Manufactures_Item;

use App\Item;
use App\Invoices_details;
use App\Store;
use App\Items_store;

use Carbon\Carbon;
class ManufactureController extends Controller

{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        //
      //  $Manufactures = Manufacture::all();
      $Manufacture = Manufacture::all();
$manufacture_edit =array();
      $result = array();

$manufacture_no=Manufacture::select('num')->orderBy('id', 'desc')->first()['num']+1;
//$invoice_no=5;
if($manufacture_no==null||$manufacture_no==''){
$manufacture_no=1;

}
$items_id = invoices_details::
orderBy('id')
->pluck('item_id')->toArray();
// ->get('item_id');
$items = Item::whereIn('id',$items_id )
->orderBy('id')
->get();


                        foreach ($items as $item)
                        {
                            $new_items = new \stdClass();
                            // $item = Item::where('id',$item_price->item_id)
                            //         ->orderBy('id','desc')
                            //         ->first();
                                    $item_price = Invoices_details::where('item_id',$item->id)
                                    ->orderBy('id','desc')
                                        ->first();
                            $new_items->item_price = $item_price->unit_price;
                            $new_items->name2 = $item->name;
                            $new_items->id = $item->id;


                            array_push($result,$new_items);
                        }
                        $updated_manufacture='';
                        if($request->input('id')){
                          // $updated_manufacture=Manufacture::findOrFail($_GET['id']);
                          $updated_manufacture = DB::table('manufactures')
                                      ->select('manufactures.*')->where('manufactures.id',$request->input('id'))
                                      ->get();
                                      $manufacture_edit = DB::table('manufactures')
                                                  ->join('manufactures_items', 'manufactures.id', '=', 'manufactures_items.manfucture_id')
                                                  ->join('items', 'manufactures_items.item_id', '=', 'items.id')

                                                  // ->innerjoin('manufactures', 'manufactures.id', '=', 'sales_details.sale_id')

                                                  ->select('manufactures_items.*','manufactures.*','items.*')->where('manufactures.id',$request->input('id'))

                                                  ->get();

                        }
                        // print_r($manufacture_edit);
        return view('manufactures.index', array('manufacture_edit'=>$manufacture_edit,'updated_manufacture'=>$updated_manufacture,'manufacture_no'=>$manufacture_no,'items'=>$result));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        //return view('bowner.Manufacture.create');
        $Manufactures = Manufacture::all();
        return view('Manufactures.create', compact('Manufactures'));

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
       $manufacture = new manufacture();


         $manufacture->num = $request->manufacture_no;
         // $manufacture->date =  date($request->date);

         $manufacture->repeat_num = $request->repeat_num;
         $manufacture->date = Carbon::parse($request->date)->format('Y-m-d H:i:s');

         // $manufacture->date = $request->date;
         $manufacture->product_name = $request->product_name;
         $manufacture->total_per_ton= $request->total2;
         $manufacture->total_price= $request->total;
              $manufacture->state= 1;
         $manufacture->save();
         // manu_items.push({'item_id':item_id,'ratio_per_ton':ratio_per_ton,'price':price})

              $items_store = new Items_store();
              $items_store->item_id=$manufacture->id;
              $items_store->store_id=2;
              $items_store->quantity=$request->repeat_num;

              $items_store->save();
     foreach ( $request->manu_items as $manufacture_item) {
     $manufacture_items = new Manufactures_Item();
     $manufacture_items->item_id =$manufacture_item['item_id'];

     $manufacture_items->ratio = $manufacture_item['ratio_per_ton'];
     $manufacture_items->price = $manufacture_item['price'];
     $manufacture_items->manfucture_id = $manufacture->id;
     $manufacture_items->item_id = $manufacture_item['item_id'];
     $manufacture_items->save();

     $update_item=Items_store::where('item_id', $manufacture_item['item_id'])->first();

        $update_item->quantity=$update_item->quantity-$manufacture_item['ratio_per_ton'];
        $update_item->save();

     }


         Session::flash('created_message', 'The new manufacture has been added');


         // $manufactures = manufacture::all();
         // $manufacture_no=manufacture::select('num')->orderBy('id', 'desc')->first()['num']+1;



             $response = array(
               'status' => 'success',
               'msg' => 'The new manufacture has been updated',
           );
          return response()->json($response);
             // return view('manufactures.index', array('items'=>$items,'stores'=>$stores,'suppliers'=>$suppliers,'manufacture_no'=>$manufacture_no,'manufactures'=>$manufactures))
             // ->with('success', 'manufacture created successfully');
     }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show()
    {
      $Products = Manufacture::where('state',1)
                    ->orderBy('id')
                     ->get();
      return view('Manufactures.show', compact('Products'));
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
        $Manufacture = Manufacture::findOrFail($id);
        return view('Manufactures.index', compact('Manufacture'));

    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
  /*  public function update(Request $request, $id)
    {
        //
        $Manufacture = Manufacture::findOrFail($id);



        $Manufacture->name = $request->name;
        $Manufacture->quantity = $request->quantity;


        $Manufacture->save();

        Session::flash('update_message', 'The new Manufacture has been updated');

        return redirect('/bowner/Manufacture');
    }*/
    public function update(Request $request)
    {
        //
        $Manufacture = Manufacture::findOrFail($request->id);




                $Manufacture->name = $request->name;
                $Manufacture->quantity = $request->quantity;
                $Manufacture->state =1;


                $Manufacture->save();

        Session::flash('update_message', 'The new Manufacture has been updated');

      //  return redirect('Suppliers.index');
      $response = array(
        'status' => 'success',
        'msg' => 'The new Manufacture has been updated',
    );
   return response()->json($response);
    //return redirect()->action('SupplierController@index');

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
      /*  $Manufacture = Manufacture::findOrFail($id);

        $Manufacture->delete();

        Session::flash('deleted_message', 'The Manufacture has been deleted');

        return redirect('/bowner/Manufacture');*/
    //    Manufacture::find($id)->delete();
        $Manufacture = Manufacture::findOrFail($id);

        $Manufacture->state= 2;
        $Manufacture->save();
        return redirect()->route('Manufactures.index')
            ->with('success', 'Manufacture deleted successfully');
    }
}
