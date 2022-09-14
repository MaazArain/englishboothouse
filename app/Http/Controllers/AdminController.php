<?php

namespace App\Http\Controllers;

use App\Models\Answer;
use App\Models\Category;
use App\Models\Question;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Redirect;

class AdminController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function dashboard()
    {
        return view('admin_area.dashboard');
    }
    // Product Question Work Start
    public function list_question()
    {
        $all_questions = Question::all();
        return view('admin_area.product_question.list_question', ['all_questions' => $all_questions]);
    }

    public function reply_question(Request $request,$qid)
    {
        $question_detail = Question::where('id', $qid)->first()->get();
        return view('admin_area.product_question.reply_question', ['question_detail' => $question_detail]);      
    }


    public function reply_answer(Request $request, $qid)
    { 
    //      $answer_detail = Answer::insert([
    //     'id' => $request->$qid,
    //     'answer' => $request->answer
    //   ]);
    //   return Redirect()->back()->with('success' , 'data insert successfully');

        return view('admin_area.product_answer_reply.reply_question_answer');
       
    }        
    // Product Question Work End
    public function add_category()
    {

        return view('admin_area.categories.add_category');
        
    }
    public function list_category()
    {
        $categories = Category::all();
        return view('admin_area.categories.list_category' , ['categories' => $categories]);
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
    public function store_category(Request $request)
    {
        $validated = $request->validate([
            'name' => 'required|unique:categories|max:25'
        ]);

        $categoryInserted = Category::insert([
            'id' => $request->id,
            'name' => $request->name
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
    public function edit_category($id)
    {
        $update_category = Category::findorFail($id);
        return view('admin_area.categories.edit_category' , ['categories' => $update_category]);
    }
    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update_category(Request $request, $id)
    {
        Category::where('id', $id)->update([
            'id' => $request->id,
            'name' => $request->name    
        ]);
       return Redirect()->back()->with('success' , 'Data Updated Successfully');
    }
    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function delete_category($id)
    {
        Category::destroy($id);
        return Redirect()->back();
    }
}
