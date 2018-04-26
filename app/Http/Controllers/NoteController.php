<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;

use App\Note;
use Validator;
use App\Http\Requests;
use Response;
use Illuminate\Support\Facades\Input;
class NoteController extends Controller
{
    public function v1()
    {    
      return view('note.api');       
    }
    
    public function v2()
    {    
      return view('note.v2');       
    }
    
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $notes = Note::latest()->paginate(6);  //每頁為6
        $response = [
          'pagination' => [
            'total' => $notes->total(),
            'per_page' => $notes->perPage(),
            'current_page' => $notes->currentPage(),
            'last_page' => $notes->lastPage(),
            'from' => $notes->firstItem(),
            'to' => $notes->lastItem()
          ],
          'data' => $notes
        ];
        return response()->json($response);
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
        $this->validate($request,[
          'title' => 'required',
         'content' => 'required',
       ]);
     
        $create = Note::create($request->all());
        return response()->json($create);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $note = Note::find($id);
        if($note){
            return $note;
        }
        return response()->json(['id' => $id], 404);
         // return abort(404);
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
      $this->validate($request,[
        'title' => 'required',
        'content' => 'required',
      ]);
      $edit = Note::find($id)->update($request->all());
      return response()->json($edit);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        Note::find($id)->delete();
        return response()->json(['done']);
    }
}
