<?php

namespace App\Http\Controllers;

use App\Http\Requests\OrderRequet;
use App\Order;
use App\Client;
use App\Product;
use Illuminate\Http\Request;

class OrderController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @param Request $request
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function index(Request $request)
    {
        $q = $request->query('search');

        return  view('admin.order.index', [
            'orders' => Order::where('date' , 'LIKE' , "%{$q}%")
                ->paginate($request->query('limit' , 10))
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function create()
    {
        return view('admin.order.create', [
            'products' => Product::all(),
            'clients' => Client::all()
        ]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(OrderRequet $request)
    {
        $request->merge([
            'user_id' => $request->user()->id // auth()->user()->id, Auth::user()->id
        ]);
        $products = [];
        $total_amount = 0;
        foreach($request->get('products') as $product){
        	
        	$productFromDb = Product::find($product['product_id']);
        	$newProduct = [];

        	$newProduct['product_id'] = $productFromDb->id;

        	$newProduct['price'] = $productFromDb->price;
        	$newProduct['quantity'] = $product['quantity'];
        	$newProduct['total'] = $newProduct['price'] * $newProduct['quantity'];

        	$products[] = $newProduct;
        	$total_amount += $newProduct['total'];

        	
        }
        
        $request->merge([
        	'total_amount' => $total_amount
        ]);
        $order = Order::create($request->all());
        // @TODO validation on calculation
        $order->products()->attach($products);
        $order->save();

        return redirect(route('admin.orders.show', $order));
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Order  $order
     * @return \Illuminate\Http\Response
     */
    public function show(Order $order)
    {
        // dd($order->products[0]->pivot->price);
        return view('admin.order.show', [
            'order' => $order
            // 'orders' => Order::all()
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Order  $order
     * @return \Illuminate\Http\Response
     */
    public function edit(Order $order)
    {
        return view('admin.order.edit', [
            'orders' => $order,
            'products' => Product::all(),
            'clients' => Client::all()
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Order  $order
     * @return \Illuminate\Http\Response
     */
    public function update(OrderRequet $request, Order $order)
    {
        $request->merge([
            'user_id' => $request->user()->id // auth()->user()->id, Auth::user()->id
        ]);
        
        $order->update($request->all());
       
        // // @TODO validation on calculation
        $order->products()->sync($request->get('products'));
        // $order->save();

        return redirect(route('admin.orders.show', $order));
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Order  $order
     * @return \Illuminate\Http\Response
     */
    public function destroy(Order $order)
    {
        $order->delete();
        return 'one row deleted';
    }
}
