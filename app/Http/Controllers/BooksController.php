<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Books;
use Illuminate\Support\Facades\DB;

class BooksController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {

        
        $jsonArray = array();

        $dataTable = Books::all();//GET DATA BOOKS MODEL


        foreach ($dataTable as $key => $data) {
            $jsonArray[$key] = [

                'id' => $data->id,
                'author' => $data->author,
                'title' => $data->title,
                'edition' => $data->edition,
                'publication_data' => $data->publication_data,
                'content_type' => $data->content_type,
                'restriction' => $data->restriction,
                'matter' => $data->matter,
                'provider' => $data->provider,




            ];
        }


        return response()->json($jsonArray);//ARRAY JSON RETURN TO AXIOS 
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
        $dataRes = false;


        try {
            DB::beginTransaction();
            //VALIDATE METHOD FOR INFORMATION
            $validate = $request->validate([
                'author' => 'required|max:75',
                'title' => 'required|unique:books',
                'edition' => 'required',
                'publication_data' => 'required',
                'content_type' => 'required',
                'restriction' => 'required',
                'matter' => 'required',
                'provider' => 'required',

            ]);


            $oBook = new Books;//CREATE INSTANCE BOOK MODEL
            //ASSIGNATED VARIABLE TO MODEL
            $oBook->author = $request->author;
            $oBook->title = $request->title;
            $oBook->edition = $request->edition;
            $oBook->publication_data = $request->publication_data;
            $oBook->content_type = $request->content_type;

            $oBook->restriction = $request->restriction;
            $oBook->matter = $request->matter;
            $oBook->provider = $request->provider;
            $dataRes = $oBook->save();//SAVE DATA 

            DB::commit();
            return response()->json([
                "success" => true,
                "message" => " El nuevo libro se guardo con exito ",
                "data" => $dataRes
            ]);
        } catch (\Exception $e) {

            DB::rollBack();
            return response()->json([
                "success" => 'false',
                "message" => "Hubo un error por favor inteta de nuevo",
                "data" => $dataRes
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
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {

        $jsonArray = array();

        $dataTable = Books::where('id', $id)->get();//GET DATA TO SPECIFIC EDIT ITEM


        foreach ($dataTable as $key => $data) {
            $jsonArray[$key] = [

                'id' => $data->id,
                'author' => $data->author,
                'title' => $data->title,
                'edition' => $data->edition,
                'publication_data' => $data->publication_data,
                'content_type' => $data->content_type,
                'restriction' => $data->restriction,
                'matter' => $data->matter,
                'provider' => $data->provider,




            ];
        }


        return response()->json($jsonArray);
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
        $dataRes = false;


        try {
            DB::beginTransaction();
            $oBook = Books::find($id);//GET ITEM FOR UPDATE
            $oBook->author = $request->author;
            $oBook->title = $request->title;
            $oBook->edition = $request->edition;
            $oBook->publication_data = $request->publication_data;
            $oBook->content_type = $request->content_type;

            $oBook->restriction = $request->restriction;
            $oBook->matter = $request->matter;
            $oBook->provider = $request->provider;
            $dataRes = $oBook->save();//THIS METHOD ALSO WORKS FOR UPDATED
            DB::commit();
            return response()->json([
                "success" => true,
                "message" => " El  libro se actualizo con exito ",
                "data" => $dataRes
            ]);
        } catch (\Exception $e) {

            DB::rollBack();
            return response()->json([
                "success" => 'false',
                "message" => "Hubo un error por favor inteta de nuevo",
                "data" => $dataRes
            ]);
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
       //DELETE ITEM METHOD
        $dataRes = false;


        try {
            DB::beginTransaction();
            $dataRes = Books::find($id)->delete();
        DB::commit();
            return response()->json([
                "success" => true,
                "message" => " El  libro se elimino con exito ",
                "data" => $dataRes
            ]);
        } catch (\Exception $e) {

            DB::rollBack();
            return response()->json([
                "success" => 'false',
                "message" => "Hubo un error por favor inteta de nuevo",
                "data" => $dataRes
            ]);
        }
    }
}
