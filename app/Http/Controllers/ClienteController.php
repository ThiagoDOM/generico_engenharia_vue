<?php

namespace App\Http\Controllers;

use App\Models\Cliente;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class ClienteController extends Controller
{

    private function authid(){
        return Auth::user()->id;
    }

    public function __construct()
    {
        $this->middleware('auth');
    }
    
    public function index()
    {
        
        return Cliente::where('id_usuario',$this->authid())->get();
    }

    public function show($id)
    {
        
        return Cliente::find($id);
    }

    public function store(Request $request)
    {
        
        $data = $request->all();
        $data['id_usuario'] = $this->authid();
        $cliente = Cliente::create($data);

        return $cliente;
    }

    public function update(Request $request, $id)
    {
        $Cliente = Cliente::find($id);

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
