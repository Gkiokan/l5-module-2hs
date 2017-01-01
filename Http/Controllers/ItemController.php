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
    /**
     * Display a listing of the resource.
     * @return Response
     */
    public function index()
    {
        $items = Item::all();

        return view('secondhandshop::pages.item.index', compact(['items']));
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
    public function edit()
    {
        return view('secondhandshop::edit');
    }

    /**
     * Update the specified resource in storage.
     * @param  Request $request
     * @return Response
     */
    public function update(Request $request)
    {
    }

    /**
     * Remove the specified resource from storage.
     * @return Response
     */
    public function destroy()
    {
    }
}
