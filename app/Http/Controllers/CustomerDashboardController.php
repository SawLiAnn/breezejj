<?php

namespace App\Http\Controllers;

use App\Models\Tenant;
use App\Models\Contact;
use Illuminate\Http\Request;
use Termwind\Components\Dd;

class CustomerDashboardController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $url = url()->current();
        $url1 = strtok($url, '.');
        $arr = explode('://', $url1)[1];
        $tenant_all = Tenant::get();
        // dd(count($tenant_all));
        if ($tenant_all->count() > 0) {
            if (is_null(Tenant::where('subdomain', $arr)->first())) {
                return "Tenant not found";
                //return redirect()->route('login');
            } else {
                $tenant = Tenant::where('subdomain', $arr)->first();
                $contacts = Contact::where('tenant_id', $tenant->id)->get();
                return view('customer_dashboard', compact('contacts', 'tenant'));
            }
        } else {
            return "no registered domain";
        }
        // $contacts = Contact::get();
        // dd(Contact::where('tenant_id', auth()->user()->current_tenant_id)->get());
        // return view('customer_dashboard', compact('customer_dashboard'));
        // return view('customer_dashboard', ['tenant' => $tenant]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
