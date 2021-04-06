<?php

namespace App\Http\Controllers;
use App\Item;
use App\Folder;
use Illuminate\Http\Request;

class FolderController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //Se obtienen solo las folders que ha creado el usuario
        $folders = Folder::where('user_id', auth()->user()->id)->get();
     
        return view('folders.index', compact('folders'));
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
    public function store(Request $request, Folder $folders)
    {
        
        // Validación
        $data = $request->validate([
            'nombre' => 'required|min:1'
        ]);

        $folders->nombre = $data['nombre'];
        $folders->user_id = auth()->user()->id;
        $folders->save();

        return redirect()->action('FolderController@index');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Folder  $folder
     * @return \Illuminate\Http\Response
     */
    public function show($folder)
    {
       
       $items = Item::where('folder_id', $folder)->where('user_id', auth()->user()->id)->get();
        $folderId = $folder;
       return view('folders.show', compact('items', 'folderId'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Folder  $folder
     * @return \Illuminate\Http\Response
     */
    public function edit(Folder $folder)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Folder  $folder
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Folder $folder)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Folder  $folder
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $folder = Folder::findOrFail($id);
        $folder->delete();

        return back();
    }
    public function addtask(Request $request)
    {
        // Validación
        $data = $request->validate([
            'nombre' => 'required|min:1',
            'folderId' => 'required'
        ]);

        auth()->user()->items()->create([
            'nombre' => $data['nombre'],
            'folder_id' => $data['folderId']
        ]);

        return back();
    }
}
