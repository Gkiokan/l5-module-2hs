<?php

namespace Gkiokan\SecondHandShop\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Routing\Controller;

use Auth;
use Gkiokan\SecondHandShop\Item;
use Gkiokan\SecondHandShop\Customer;
use Carbon\Carbon;

class ItemController extends Controller
{

    public function __construct(){
        Carbon::setLocale('de');
    }

    /**
     * Display a listing of the resource.
     * @return Response
     */
    public function index($type=null)
    {
        if($type=='sold'):
          $items = Item::sold();
          $title = "Verkaufte Waren";

        elseif($type=='open'):
          $items = Item::open();
          $title = "Aktuell zu verkaufende Waren";

        elseif($type=='expired'):
          $items = Item::expired();
          $title = "Überfällige Ware";

        else:
          $items = Item::all();
          $title = "Alle Waren";

        endif;

        return view('secondhandshop::pages.item.index', compact(['items', 'title']));
    }


    // Shortcut functions
    public function sold(){
        return $this->index('sold');
    }

    public function open(){
        return $this->index('open');
    }

    public function expired(){
        return $this->index('expired');
    }



    /**
     * Show the form for creating a new resource.
     * @return Response
     */
    public function create()
    {
        $customers = Customer::byUserID(Auth::user()->id)->get();

        return view('secondhandshop::pages.item.create', compact(['customers']));
    }

    /**
     * Store a newly created resource in storage.
     * @param  Request $request
     * @return Response
     */
    public function store(Request $request)
    {
        $item = new Item($request->all());
        $item->customer_id = $request->customer_id;
        $item->user_id     = Auth::user()->id;
        $item->expires_at  = Carbon::now()->addWeeks($request->limit);
        $item->save();

        session()->flash('message.content', "Ware $request->name wurde erstellt");
        session()->flash('message.type', 'success');

        return redirect()->route('secondhandshop.item.index');
    }

    /**
     * Show the form for editing the specified resource.
     * @return Response
     */
    public function edit(Item $item)
    {
        $customers = Customer::byUserID(Auth::user()->id)->get();
        return view('secondhandshop::pages.item.edit', compact(['item', 'customers']));
    }

    /**
     * Update the specified resource in storage.
     * @param  Request $request
     * @return Response
     */
    public function update(Request $request, Item $item)
    {
        $item->update($request->all());

        session()->flash('message.content', "Ware $request->name wurde aktualisiert");
        session()->flash('message.type', 'success');

        return redirect()->route('secondhandshop.item.index');
    }


    public function delete(Item $item)
    {
        return view('secondhandshop::pages.item.delete', compact(['item']));
    }


    /**
     * Remove the specified resource from storage.
     * @return Response
     */
    public function destroy(Item $item)
    {
        $item->delete();

        session()->flash('message.content', "Ware $item->name wurde gelöscht");
        session()->flash('message.type', 'success');

        return redirect()->route('secondhandshop.item.index');
    }
}
