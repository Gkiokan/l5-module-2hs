<?php

namespace Gkiokan\SecondHandShop\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Routing\Controller;

use Gkiokan\SecondHandShop\Http\Requests\CommissionRequest;
use Gkiokan\SecondHandShop\Commission;
use Gkiokan\SecondHandShop\Item;
use Auth;

class CommissionController extends Controller
{
      public function index()
      {
          $bills = Commission::Bills();
          return view('secondhandshop::pages.bill.index', compact(['bills']));
      }


      public function create()
      {
          return view('secondhandshop::pages.bill.create');
      }


      public function show(Commission $commission)
      {
          $items_in_bill = $commission->items()->get();
          $items   = Item::AllUserItems(Auth::user()->id)->get();

          // dd($items);

          return view('secondhandshop::pages.bill.show', compact(['items', 'commission', 'items_in_bill']));
      }


      public function store(CommissionRequest $request)
      {
          $c = new Commission($request->all());
          $c->user_id = Auth::user()->id;
          $c->type    = 'commission';
          $c->save();

          session()->flash('message.content', "Komission $request->nr wurde erstellt, trage deine Waren ein!");
          session()->flash('message.type', 'success');

          return redirect()->route('secondhandshop.commission.index');
      }


      public function addItem(Commission $commission, Request $request){

          $item = Item::findorfail($request->item);

          if(!$item):
              session()->flash('message.content', "Item not found");
              session()->flash('message.type', 'warning');
              return back();
          endif;

          if($commission->items->contains($item->id)):
              session()->flash('message.content', "Item $item->name already exists in the list");
              session()->flash('message.type', 'warning');
              return back();
          endif;

          $commission->items()->save($item, ['item_id' => $item->id, 'bill_id' => $commission->id]);

          session()->flash('message.content', "Item $item->name wurde hinzugefügt.");
          session()->flash('message.type', 'success');

          return redirect()->route('secondhandshop.commission.show', $commission->id);
      }


      public function edit()
      {
          return view('secondhandshop::pages.bill.edit');
      }


      public function update(Request $request)
      {
      }


      public function delete()
      {
          return view('secondhandshop::pages.bill.delete');
      }


      public function destroy()
      {
      }
}
