<?php

namespace App\Http\Controllers;

use App\Models\Contato;
use Illuminate\Http\Request;

class AgendaController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        if(!isset($_SESSION))
            session_start(); 
        return view("agenda.index");
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('agenda.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        if(!isset($_SESSION))
            session_start();

        $novo = array(
            'id' => date("YmdHis"),
            'name'   => $request['name'],
            'phone'     => $request['phone'],
            'email' => $request['email'],
        );
        //$tam = count($_SESSION['users']);
        //return var_dump($novo) + $tam;
        if (isset($_SESSION['users'])) {
            array_push($_SESSION['users'],$novo);
		
			/*
			
			$contato = new Contato();
			$contato->name = $request['name'];
			$contato->phone = $request['phone'];
			$contato->email = $request['email'];
			$contato->save();
			
			*/
			
        } else
            $_SESSION['users'][0] = $novo;
        return redirect()->route('agenda.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        if(!isset($_SESSION))
            session_start();
        foreach ($_SESSION['users'] as $dados) {
            if ($dados['id'] == $id){
                return view('agenda.show',['dados'=>$dados]);
                break;
            }
        }
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        if(!isset($_SESSION))
            session_start();
        foreach ($_SESSION['users'] as $dados) {
            if ($dados['id'] == $id){
                return view('agenda.edit',['dados'=>$dados]);
                break;
            }
        }
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
        if(!isset($_SESSION))
            session_start(); 

        $keys = array_keys($_SESSION['users']);
        foreach ($keys as $key) {
            if ($_SESSION['users'][$key]['id'] == $id){
                $_SESSION['users'][$key]['name'] = $request->name;
                $_SESSION['users'][$key]['phone'] = $request->phone;
                $_SESSION['users'][$key]['email'] = $request->email;
                break;
            }
        }
       return redirect()->route('agenda.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        if(!isset($_SESSION))
            session_start(); 
            $keys = array_keys($_SESSION['users']);
            foreach ($keys as $key) {
                if ($_SESSION['users'][$key]['id'] == $id){
                    unset($_SESSION['users'][$key]);
					
					/*
					
					$contato = Contato::find($id);
					$contato->delete();
					
					*/
					
                    break;
                }
            }
        return redirect()->route('agenda.index');
    }
}
