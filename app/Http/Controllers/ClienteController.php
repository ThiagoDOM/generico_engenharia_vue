<?php

namespace App\Http\Controllers;

use App\Models\Cliente;
use Illuminate\Http\Request;

class ClienteController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }
    
    public function index()
    {
        //dd('teste');
        //return Cliente::where('user_id', auth()->id())->get();
        return Cliente::all();
    }

    public function show($id)
    {
        //dd('teste');
        //return Cliente::where('user_id', auth()->id())->get();
        return Cliente::find($id);
    }

    public function store(Request $request)
    {
        
        //$Cliente = new Cliente();
        //$Cliente = $request;
        //$Cliente->user_id = auth()->id();
        //$Cliente->save();

        $cliente = Cliente::create($request->all());

        return $cliente;
    }

    public function update(Request $request, $id)
    {
        $Cliente = Cliente::find($id);
        /*$Cliente->description = $request->description;
        $Cliente->save();*/

        $data = $request->all();

        $Cliente->update($data);
        return $Cliente;
    }

    public function destroy($id)
    {
        $Cliente = Cliente::find($id);
        $Cliente->delete();
    }
}
