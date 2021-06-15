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
   public function edititem(Item $item){
          
          return view('admin.items.edititem', compact('item'));
   }
   public function updateitem(Item $item, Request $request){
          
          $item->update([
               'item_name' => $request->item_name,
               'content' => $request->content,
               'price' => $request->price
          ]);

          return redirect('/admin/item');
   }
   public function deleteitem($id){

          $item = Item::where('id', '=', $id)->with('userbuyitems')->first();
          $userbuyitems = $item->userbuyitems()->pluck('id');
          $item->userbuyitems()->delete();
          Item::destroy($userbuyitems);

          $item->delete();

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
   public function editgc(GiftCard $gc){
          return view('admin.giftcards.editGC', compact('gc'));
   }

   public function updategc(GiftCard $gc, Request $request){
          $gc->update([
               'gc_name' => $request->gc_name,
               'points' => $request->points,
          ]);
          return redirect('/admin/giftcards');
   }
   public function deletegc($id){
          $gc = Giftcard::where('id', '=', $id)->with('usergiftcards')->first();
          $usergiftcards = $gc->usergiftcards()->pluck('id');
          $gc->usergiftcards()->delete();
          GiftCard::destroy($usergiftcards);

          $gc->delete();

          return redirect('/admin/giftcards');
   }
}
