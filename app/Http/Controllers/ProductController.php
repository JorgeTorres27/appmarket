<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use Session;


class ProductController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        $products = \App\Product::
        select('products.id','products.name as product','price','marks.name as mark')
        ->join('marks','marks.id','=','products.marks_id')
        ->paginate(5);


        return view('product/index')->with('products',$products );

    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //

        $marks = \App\Mark::lists('name','id')->prepend('Seleccioname la Marca');
          return view('product/create')->with('marks', $marks);

    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(ProductCreateRequest $request)
    {
        //
          \App\Product::create($request->all());
          Session::flash('save','Se ha creado correctamente');
          return redirect()->route('product.index');

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
        $products = \App\Product::FindOrFail($id);
        return view('product.show')->with('products', $products);

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
            $marks = \App\Mark::lists('name','id')->prepend('Seleccioname la Marca');
            $products = \App\Product::FindOrFail($id);

            return view('product.edit', array('products'=>$products,'marks'=>$marks));

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

          $products = \App\Product::FindOrFail($id);
          $input = $request->all();
          $products->fill($input)->save();
          Session::flash('update','Se ha actualizado correctamente');

          return redirect()->route('product.index');


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
          $products = \App\Product::FindOrFail($id);
          $products->delete();
          Session::flash('delete','Se ha eliminado correctamente');
          return redirect()->route('product.index');

    }
}
