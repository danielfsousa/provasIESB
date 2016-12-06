<?php

namespace App\Http\Controllers;

use App\Turma;
use Illuminate\Http\Request;

class TurmaController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $turmas = Turma::withAll()->get();
        return response()->json(compact('turmas'));
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        if(!$turma = Turma::withAll()->find($id)) {
            return response()->json(['erro' => 'Turma não encontrada'], 404);
        }
        return response()->json(compact('turma'));
    }
}
