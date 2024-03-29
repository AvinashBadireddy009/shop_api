<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

use App\Http\Requests\CreateProductRequest;

use App\Product;
use Auth;

class ProductController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $products = auth()->user()->products;
 
        return response()->json([
            'success' => true,
            'data' => $products
        ]);
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
    public function store(Request $request, Product $product)
    {
        $shops = Auth::user()->shops;
        $shops_count = $shops->count();
        
        if($shops_count)
        {
           $shop_id = DB::table('shops')->where('user_id', Auth::user()->id)->where('name','')->pluck('id');
           $product::create([
                'title' => $request->title,
                'description' => $request->description,
                'price' => $request->price,
                'inventory' => $request->inventory,
                'shop_id' => $shop_id
            ]);
           
            return response()->json([
                'Message' => 'Product have been created successfully'
            ]);
        }
        else
        {
            return response()-json(
            [
                'Message' => 'There are no shops created yet'
            ]);
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
        //
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
