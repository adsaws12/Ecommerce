<?php

namespace App\Http\Controllers;

use App\Item;
use App\GiftCard;
use App\UserGiftCard;
use App\User;
use App\UserBuyItem;
use App\Transaction;
use Illuminate\Http\Request;

class UserController extends Controller
{
    public function items(){   
        $items = Item::all();
        return view('store.items', compact('items'));
    }
    public function giftcards(){
        $gcs = GiftCard::all();

        return view('store.giftcards', compact('gcs'));
    }

    public function purchasegc(GiftCard $giftcard, Request $request){
        $user = User::find(auth()->user()->id);
        
        $usergiftcard = UserGiftCard::create([
            'user_id' => auth()->user()->id,
            'gift_card_id' => $giftcard->id,
        ]);
        
        $usergiftcard->transactions()->create([
            'user_id' => auth()->user()->id,
        ]);
        // add points to user
        User::where('id', '=', auth()->user()->id)->update([
            'points' => $user->points + $giftcard->points,
        ]);


        return redirect('/store/giftcard')->with('success', 'Gift Card Purchased');
    }

    public function usergc(){
        // list of Gc purchases
        $usergcs = UserGiftCard::orderBy('updated_at','DESC')->where('user_id', '=', auth()->user()->id)->with('giftcard')->get();

        return view('usergc', compact('usergcs'));
    }

    public function purchaseItem(Item $item){
        // check if available points is greater than item points
        $user = User::find(auth()->user()->id);
        if ($user->points >= $item->price) {
            User::where('id','=', $user->id)->update([
                'points' => $user->points - $item->price
            ]);
            
            $userbuyitem = UserBuyItem::create([
                'user_id' => $user->id,
                'item_id' => $item->id,
            ]);
            
            $userbuyitem->transactions()->create([
                'user_id' => auth()->user()->id,
            ]);

            return redirect('/store/item')->with('success', 'Item Purchased');
        } else {
            return redirect('/store/item')->with('danger', 'Insufficient Points');
        }
    }
}
