<?php

namespace App\Http\Controllers;

use App\Models\Colors;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Redirect;

class ColorsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }
    public function add_colors()
    {
        return view('admin_area.colors.add_colors');
    }
    
    // This is Store Colors Function Start
    public function store_colors(Request $request)
    {    
        $Colorsvalidated = $request->validate([
            'colors_name' => 'required|unique:colors|max:25'
        ]);
        $ColorsInserted = Colors::insert([
            'id' => $request->id,
            'colors_name' => $request->colors_name          
        ]);
        return Redirect()->back()->with('success' , 'Colors Data Inserted Successfully');
    }
    // This is Store Colors Function End 
/**
 * This is List Colors Function Start
 */
public function list_colors() 
{
    $colors = Colors::all();
    return view('admin_area.colors.list_colors' , ['colors' => $colors]);
}
/**
 * This is List Colors Function End
 */



/**
 * This is edit Colors Function Start
 */
public function edit_colors($id) 
{
    $colors = Colors::findOrFail($id);
    return view('admin_area.colors.edit_colors' , ['colors' => $colors]);
}
public function update_colors(Request $request , $id) 
{
    Colors::where('id' , $id)->update([
        'id' => $request->id,
        'colors_name' => $request->colors_name
    ]);
    return Redirect()->back()->with('success' , 'Colors Data Updated Successfully');
}
/**
 * This is edit Colors Function End
 */






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
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
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
        //
    }
    public function delete_colors($id)
    {
        $delete_colors = Colors::destroy($id);
        return Redirect()->back()->with('success' , 'Colors Deleted Successfully');
    }
}
