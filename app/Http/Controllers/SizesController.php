<?php

namespace App\Http\Controllers;

use App\Models\Sizes;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Redirect;

class SizesController extends Controller
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

/**  
 * 
 * Display a Add Sizes
*/
public function add_size()
{
    return view('admin_area.sizes.add_size');
}
public function edit_size($id)
{
    $sizes = Sizes::findOrFail($id);
    return view('admin_area.sizes.edit_size' , ['sizes' => $sizes]);
}
public function update_size(Request $request, $id)
{
    Sizes::where('id', $id)->update([
        'id' => $request->id,
        'size_name' => $request->size_name
        
        
    ]);
   return Redirect()->back()->with('success' , 'Data Updated Successfully');
}
public function list_size()
{
    $sizes = Sizes::all();
    return view('admin_area.sizes.list_size' , ['sizes' => $sizes]);
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
        //
    }

    public function store_size(Request $request)
    {
        $validated = $request->validate([
            'size_name' => 'required|unique:sizes|max:25'
        ]);

        $categoryInserted = Sizes::insert([
            'id' => $request->id,
            'size_name' => $request->size_name
        ]);
        return Redirect()->back()->with('success' , 'data insert successfully');
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
    public function delete_size($id)
    {
        Sizes::destroy($id);
        return Redirect()->back()->with('success' , 'Data Deleted Successfully');
        

    }
}
