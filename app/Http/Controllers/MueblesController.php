<?php

namespace App\Http\Controllers;

use App\Http\Resources\MueblesResource;
use App\Models\Muebles;
use App\Models\Status;
use Illuminate\Http\Request;

class MueblesController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $data = Muebles::paginate(10);
        $muebles = MueblesResource::collection($data)->response()->getData(true);

        return response()->json([
            'data'=>$muebles
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
        $muebles=new Muebles();

        $muebles->save($request->all());


        return response()->json([
            "status" => 201,
            "message" => "success!",
            'data'=>[
                'description'=>$muebles->description,
                'material'=>$muebles->material,
                'status'=>Status::where('id',$muebles->status_id)->first('name'),

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
        $muebles = Muebles::where('id','=',$id)->first();

        if( !$muebles){
            return response()->json([
                'success' => false,
                'message' => ['lo siento, el mueble con id ' . $id . ' no pudo ser encontrado']
            ],400);
        }

        return response()->json([
            "status" => 200,
            "message" => "success!",
            'data'=>[
                'description'=>$muebles->description,
                'material'=>$muebles->material,
                'status'=>Status::where('id',$muebles->status_id)->first('name'),

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
        $muebles = Muebles::find($id);

        if (!$muebles) {
            return response()->json([
                'success' => false,
                'message' => 'lo siento, el mueble con id ' . $id . ' no pudo ser encontrado'
            ], 400);
        }

        if ($muebles->delete()) {
            return response()->json([
                'success' => true
            ]);
        } else {
            return response()->json([
                'success' => false,
                'message' => 'El mueble no pudo ser borrado, intentelo de nuevo'
            ], 500);
        }

    }
}
