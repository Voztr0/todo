<?php

namespace App\Http\Controllers;

use App\Item;
use App\User;
use Illuminate\Http\Request;

class ItemController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //Se obtienen solo las tareas que ha creado el usuario
        $items = Item::where('user_id', auth()->user()->id)->get();
        return view('items.index', compact('items'));
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
        // Validación
        $data = $request->validate([
            'nombre' => 'required|min:1'
        ]);

        auth()->user()->items()->create([
            'nombre' => $data['nombre'],
            'folder_id' => '1'
        ]);

        return redirect()->action('ItemController@index');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Item  $item
     * @return \Illuminate\Http\Response
     */
    public function show(Item $item)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Item  $item
     * @return \Illuminate\Http\Response
     */
    public function edit(Item $item)
    {
        return view('items.editar', compact('item'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Item  $item
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Item $item)
    {
        $data = $request->validate([
            'nombre' => 'required|min:1'
        ]);

        $item->nombre = $data['nombre'];
        $item->save();
        return redirect()->action('ItemController@index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Item  $item
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $item = Item::findOrFail($id);
        $item->delete();

        return redirect()->action('ItemController@index');
    }

    //Cambiar estado de estado de item
    public function estado (Request $request, Item $item){

        //Leer nuevo estado y asignarlo
        $item->estado = $request->estado;
        //Guardarlo en la BD
        $item->save();

        return response()->json(['respuesta' => 'Correcto']);
    }
}
