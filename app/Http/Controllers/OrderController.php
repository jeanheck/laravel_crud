<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Order;
use App\Models\Customer;
use App\Models\Product;
use Illuminate\Support\Collection;

class OrderController extends Controller
{
    private $order;
    private $customer;
    private $product;

    public function __construct()
    {
        $this->order = new Order();
        $this->customer = new Customer();
        $this->product = new Product();
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $orders = $this->order->paginate(5);
        $active = "orders";
        return view('order/index', compact('orders', 'active'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $customers = $this->customer->all();
        $products = $this->product->all();
        $active = 'orders';
        return view('order/create', compact('customers', 'products', 'active'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $productIds = $request->input("productOnList", []);
        $productAmounts = $request->input("productOnListAmount", []);

        $newOrder = $this->order->create([
            'customer_id'=>$request->request->get('customer')
		]);

        //dá pra resolver essa synclist com map

        $syncList = [];

        for ($i = 0; $i < count($productIds); $i++) {
            $syncList[$productIds[$i]] = ['amount' => $productAmounts[$i]];
        }
        $newOrder->products()->sync($syncList);

		if($newOrder){
			return redirect('orders');
		}
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $order = $this->order->find($id);
        return view('order/show', compact('order'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $order = $this->order->find($id);
        $customers = $this->customer->all();
        $products = $this->product->all();
        $active = "orders";

        return view('order/edit', compact('order', 'customers', 'products', 'active'));
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
        $orderToUpdate = $this->order->find($id);
        $productIds = $request->input("productOnList", []);
        $productAmounts = $request->input("productOnListAmount", []);

        $orderToUpdate->update([
            'customer_id'=>$request->request->get('customer')
		]);

        //dá pra resolver essa synclist com map

        $syncList = [];

        for ($i = 0; $i < count($productIds); $i++) {
            $syncList[$productIds[$i]] = ['amount' => $productAmounts[$i]];
        }

        $orderToUpdate->products()->sync($syncList);

		if($orderToUpdate){
			return redirect('orders');
		}
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $del = $this->order->destroy($id);
        return $del ? "sim" : "não";
    }
}
