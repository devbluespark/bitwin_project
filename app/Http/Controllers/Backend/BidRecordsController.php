<?php

namespace App\Http\Controllers\Backend;


use App\Http\Controllers\Controller;

use App\Bid_Record;
use App\Product;
use App\Bid_User;

use DB;
use Illuminate\Http\Request;

class BidRecordsController extends Controller
{
  
    //return all bid records to front
    public function index()
    {
        $bid_records =DB::table('bid_records')
                    ->join('bid_users','bid_users.id','=','bid_records.bid_users_id')
                    ->join('win_records','win_records.bid_users_id','=','bid_records.bid_users_id')
                    ->join('products','products.id','=','bid_records.products_id')
                    ->select('bid_records.id','bid_users.user_fname','bid_records.bid_value','products.product_name')
                    // ->where                   
                    ->get();
        return view('backend/bid_records/index',compact('bid_records'));
    }

   
    public function create()
    {
        //
    }

    public function store(Request $request)
    {
        //
    }

    //return selected bid record to front
    public function show($id)
    {
       $bid_records=Bid_Record::where('id',$id)->first();
       $user_records=Bid_User::where('id',$bid_records->bid_user_id)->first();
       $product_details=Product::where('id',$bid_records->product_id)->first();

    //    $details=Db::table('bid_records')
    //                 ->join('bid_users','bid_users.id','=','1')
    //                 ->join('products','products.id','=','1')
    //                 ->select('bid_users.user_fname',
    //                 'bid_users.user_email','bid_users.user_nic',
    //                 'bid_users.user_own_coins','bid_users.user_phn1',
    //                 'bid_records.bid_value','products.product_name',
    //                 'products.product_name','products.product_price',
    //                 'products.product_img_1')                    
    //                 ->get();

        // return $bid_records;

        return view('backend/bid_records/show',compact('bid_records','user_records','product_details'));
    }

    
    public function edit(Bid_Record $bid_Records)
    {
        //
    }

   
    public function update(Request $request, Bid_Record $bid_Records)
    {
        //
    }

   
    public function destroy(Bid_Record $bid_Records)
    {
        //
    }
}