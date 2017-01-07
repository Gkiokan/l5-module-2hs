<?php

namespace Gkiokan\SecondHandShop\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Routing\Controller;

use App\User;
use Auth;
use Gkiokan\Company\Company;
use Gkiokan\SecondHandShop\Customer;
use Gkiokan\SecondHandShop\Http\Requests\CustomerRequest;

class CustomerController extends Controller
{

    public function search(){
        $customer = null;
        $kdnr     = null;
        return view('secondhandshop::pages.customer.search', compact(['customer', 'kdnr']));
    }

    public function search_by_kdnr(Request $request){
        $kdnr     = $request->kdnr;
        $customer = Customer::where('kdnr', $kdnr)->first();

        if(!$customer) return back();

        return redirect()->route('secondhandshop.customer.edit', ['customr' => $customer->id]);
        return view('secondhandshop::pages.customer.search', compact(['customer', 'kdnr']));
    }


    /**
     * Display a listing of the resource.
     * @return Response
     */
    public function index()
    {
        $c = Customer::byUserID(Auth::user()->id)->orderBy('firstname', 'asc')->get();

        return view('secondhandshop::pages.customer.index', [ 'customers' => $c ]);
    }

    /**
     * Show the form for creating a new resource.
     * @return Response
     */
    public function create()
    {
        //$companies = Company::where('user_id', Auth::user()->id)->get();
        $companies = Company::byUserID(Auth::user()->id)->get();
        return view('secondhandshop::pages.customer.create', compact(['companies']));
    }

    /**
     * Store a newly created resource in storage.
     * @param  Request $request
     * @return Response
     */
    public function store(CustomerRequest $request)
    {

        $customer = new Customer($request->all());
        $customer->user_id = Auth::user()->id;
        $customer->save();

        session()->flash('message.content', 'magic happens');
        session()->flash('message.type', 'success');

        return redirect()->route('secondhandshop.customer.index');
    }

    /**
     * Show the form for editing the specified resource.
     * @return Response
     */
    public function edit(Customer $customer)
    {
        if($customer->user_id != Auth::user()->id):
          session()->flash('message.content', 'This customer was not created by you!');
          session()->flash('message.type', 'warning');
        endif;

        $companies = Company::byUserID(Auth::user()->id)->get();

        return view('secondhandshop::pages.customer.edit', compact(['customer', 'companies']));
    }

    /**
     * Update the specified resource in storage.
     * @param  Request $request
     * @return Response
     */
    public function update(CustomerRequest $request, Customer $customer)
    {
        $customer->update($request->all());

        session()->flash('message.content', 'Customer has been updated');
        session()->flash('message.type', 'success');

        return redirect()->route('secondhandshop.customer.edit', ['customer' => $customer->id]);
    }


    public function delete(Customer $customer){
        // Only creator can continue for deleting
        if($customer->user_id !== Auth::user()->id):
            session()->flash('message.content', 'You haven\'t created this user. Delete process aboard.');
            session()->flash('message.type', 'danger');
            return redirect()->route('secondhandshop.customer.index');
        endif;

        return view('secondhandshop::pages.customer.delete', compact(['customer']));
    }

    /**
     * Remove the specified resource from storage.
     * @return Response
     */
    public function destroy(Customer $customer)
    {
        // Only creator can continue for deleting
        if($customer->user_id !== Auth::user()->id):
            session()->flash('message.content', 'You haven\'t created this user. Delete process aboard.');
            session()->flash('message.type', 'danger');
            return redirect()->route('secondhandshop.customer.index');
        endif;

        $customer->delete();

        return redirect()->route('secondhandshop.customer.index');
    }
}
