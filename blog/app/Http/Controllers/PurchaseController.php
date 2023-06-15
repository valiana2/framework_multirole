<?php

    

namespace App\Http\Controllers;

    

use App\Models\Purchase;

use Illuminate\Http\Request;

    

class PurchaseController extends Controller

{ 

    /**

     * Display a listing of the resource.

     *

     * @return \Illuminate\Http\Response

     */

    function __construct()

    {

         $this->middleware('permission:purchase-list|purchase-create|purchase-edit|purchase-delete', ['only' => ['index','show']]);

         $this->middleware('permission:purchase-create', ['only' => ['create','store']]);

         $this->middleware('permission:purchase-edit', ['only' => ['edit','update']]);

         $this->middleware('permission:purchase-delete', ['only' => ['destroy']]);

    }

    /**

     * Display a listing of the resource.

     *

     * @return \Illuminate\Http\Response

     */

    public function index()

    {

        $purchase = Purchase::latest()->paginate(5);

        return view('purchases.index',compact('purchases'))

            ->with('i', (request()->input('page', 1) - 1) * 5);

    }

    

    /**

     * Show the form for creating a new resource.

     *

     * @return \Illuminate\Http\Response

     */

    public function create()

    {

        return view('purchases.create');

    }

    

    /**

     * Store a newly created resource in storage.

     *

     * @param  \Illuminate\Http\Request  $request

     * @return \Illuminate\Http\Response

     */

    public function store(Request $request)

    {

        request()->validate([

            'name' => 'required',

            'detail' => 'required',

            'price' => 'required',

        ]);

    

        Purchase::create($request->all());

    

        return redirect()->route('purchases.index')

                        ->with('success','Purchase created successfully.');

    }

    

    /**

     * Display the specified resource.

     *

     * @param  \App\Purchase  $purchase

     * @return \Illuminate\Http\Response

     */

    public function show(Purchase $purchase)

    {

        return view('purchases.show',compact('purchase'));

    }

    

    /**

     * Show the form for editing the specified resource.

     *

     * @param  \App\Purchase  $purchase

     * @return \Illuminate\Http\Response

     */

    public function edit(Purchase  $purchase)

    {

        return view('purchases.edit',compact('purchase'));

    }

    

    /**

     * Update the specified resource in storage.

     *

     * @param  \Illuminate\Http\Request  $request

     * @param  \App\Purchase  $purchase

     * @return \Illuminate\Http\Response

     */

    public function update(Request $request, Purchase  $purchase)

    {

         request()->validate([

            'name' => 'required',

            'detail' => 'required',

            'price' => 'required',

        ]);

    

        $purchase->update($request->all());

    

        return redirect()->route('purchases.index')

                        ->with('success','Purchase updated successfully');

    }

    

    /**

     * Remove the specified resource from storage.

     *

     * @param  \App\Purchase  $purchase

     * @return \Illuminate\Http\Response

     */

    public function destroy(Purchase  $purchase)

    {

        $purchase->delete();

    

        return redirect()->route('purchases.index')

                        ->with('success','Purchase deleted successfully');

    }

}