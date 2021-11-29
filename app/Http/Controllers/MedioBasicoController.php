<?php

namespace App\Http\Controllers;

use App\Http\Resources\MedioBasicoResource;
use App\Models\MedioBasico;
use Illuminate\Http\Request;

class MedioBasicoController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $data = MedioBasico::paginate(10);
        $medioBasico = MedioBasicoResource::collection($data)->response()->getData(true);

        return response()->json([
            'data'=>$medioBasico
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
    public function store(Request $request)
    {
        $medioBasico=new MedioBasico();

        $medioBasico->save($request->all());


        return response()->json([
            "status" => 201,
            "message" => "success!",
            'data'=>[
                'no_inventory'=>$medioBasico->no_inventory,
                'name_object'=>$medioBasico->name_object,
                'local_name'=>$medioBasico->local_name,
                'responsable'=>$medioBasico->responsable,
                ]
        ]);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $medioBasico = MedioBasico::where('id','=',$id)->first();

        if( !$medioBasico){
            return response()->json([
                'success' => false,
                'message' => ['lo siento, el medio basico con id ' . $id . ' no pudo ser encontrado']
            ],400);
        }

        return response()->json([
            "status" => 200,
            "message" => "success!",
            'data'=>[
                'no_inventory'=>$medioBasico->no_inventory,
                'name_object'=>$medioBasico->name_object,
                'local_name'=>$medioBasico->local_name,
                'responsable'=>$medioBasico->responsable,
            ]
        ]);

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
        $medioBasico = MedioBasico::find($id);

        if (!$medioBasico) {
            return response()->json([
                'success' => false,
                'message' => 'lo siento, el medio basico con id ' . $id . ' no pudo ser encontrado'
            ], 400);
        }

        if ($medioBasico->delete()) {
            return response()->json([
                'success' => true
            ]);
        } else {
            return response()->json([
                'success' => false,
                'message' => 'El medio basico no pudo ser borrada, intentelo de nuevo'
            ], 500);
        }
    }
}
