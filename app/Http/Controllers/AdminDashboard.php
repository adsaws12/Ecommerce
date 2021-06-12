<?php

namespace App\Http\Controllers;

use App\Item;
use App\GiftCard;
use Illuminate\Http\Request;

class AdminDashboard extends Controller
{
   public function index(){

        $items = Item::all();
        return view('admin.items.dashboard', compact('items'));
   }
   //Items
   public function createitem(){
        return view('admin.items.createItem');
   }
   
   public function storeitem(Request $request){
        Item::create([
            'item_name' => $request->item_name,
            'content' => $request->content,
            'price' => $request->price
        ]);

        return redirect('/admin/item');
   }



   //GiftCards

   public function viewgc(){
        $gcs = GiftCard::all();

        return view('admin.giftcards.viewGC', compact('gcs'));
   }

   public function creategc(){
        return view('admin.giftcards.createGC');
   }

   public function storegc(Request $request){
        GiftCard::create([
                'gc_name' => $request->gc_name,
                'points' => $request->points,
        ]);

        return redirect('/admin/giftcards');
   }
}
