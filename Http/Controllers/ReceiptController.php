<?php

namespace Gkiokan\SecondHandShop\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Routing\Controller;

use Gkiokan\SecondHandShop\Receipt;
use Gkiokan\SecondHandShop\Item;
use Auth;
use Carbon\Carbon;

class ReceiptController extends Controller
{
    public function index()
    {
        $bills = Receipt::Bills();
        return view('secondhandshop::pages.receipt.index', compact(['bills']));
    }


    public function show(Receipt $receipt)
    {
        $items_in_bill = $receipt->items()->get();
        $items   = Item::NotSold(Auth::user()->id)->get();
        return view('secondhandshop::pages.receipt.show', compact('receipt', 'items_in_bill', 'items'));
    }


    public function addItem(Receipt $receipt, Request $request)
    {
        $item = Item::findorfail($request->item);

        if(!$item):
            session()->flash('message.content', "Item not found");
            session()->flash('message.type', 'warning');
            return back();
        endif;

        if($receipt->items->contains($item->id)):
            session()->flash('message.content', "Item $item->name already exists in the receipt");
            session()->flash('message.type', 'warning');
            return back();
        endif;

        $receipt->items()->save($item, ['item_id' => $item->id, 'bill_id' => $receipt->id]);
        $receipt->status = 1;
        $receipt->save();

        $item->sold_at = Carbon::now();
        $item->save();

        session()->flash('message.content', "Item $item->name wurde hinzugefügt.");
        session()->flash('message.type', 'success');

        return redirect()->route('secondhandshop.receipt.show', $receipt->id);
    }


    public function create()
    {
        $bill = Receipt::LastOpenReceipt();
        return redirect()->route('secondhandshop.receipt.show', $bill->id);
    }


    public function store(Request $request)
    {
    }


    public function edit()
    {
        return view('secondhandshop::edit');
    }


    public function update(Request $request)
    {
    }


    public function destroy(Receipt $receipt, Request $request)
    {
        $item = Item::find($request->item_id);

        if($item):
            $receipt->items()->detach($item);
            $item->sold_at = null;
            $item->save();

            session()->flash('message.content', "Item $item->name wurde ausgetragen.");
            session()->flash('message.type', 'success');

            if($receipt->items()->count() == 0):
                $receipt->delete();
                session()->flash('message.content', "Quittung wurde gelöscht, weil keine Artikel mehr vorhanden waren.");
                return redirect()->route('secondhandshop.receipt.index');
            endif;
        endif;

        return back();
    }
}
