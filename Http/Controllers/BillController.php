<?php

namespace Gkiokan\SecondHandShop\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Routing\Controller;

class BillController extends Controller
{

    public function index()
    {
        return view('secondhandshop::pages.bill.index');
    }


    public function create()
    {
        return view('secondhandshop::pages.bill.create');
    }


    public function store(Request $request)
    {
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
