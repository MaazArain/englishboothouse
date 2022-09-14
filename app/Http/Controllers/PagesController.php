<?php

namespace App\Http\Controllers;

use App\Models\Colors;
use App\Models\Product;
use App\Models\Question;
use App\Models\Sizes;
use Illuminate\Http\Request;
use Intervention\Image\Size;

class PagesController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
   
    public function details(Request $request, $id)
    {
        $questions = Question::where('product_id', $id)->get();
        // "SELECT * FROM products where id = $id limit 1"
        $product = Product::where('id' , $id)->get()->first();
        $more_imges_eists = 0;
        if(json_decode($product->product_more_image))
        {
            $more_imges_eists = 1;
        }
        // Colors and Size Work Start
        $sizes = json_decode($product->product_sizes);
        // ddd($sizes);
        $sizes_names = [];
        foreach($sizes as $size)
        {
             // "SELECT * FROM Sizes where id = $id limit 1"
            $size_name_data = Sizes::where('id' , $size)->get()->first();
            $size_name = $size_name_data->size_name;
            array_push($sizes_names, $size_name);
        }

        $colors = json_decode($product->product_colors);
        
        $colors_names = [];
        foreach($colors as $color)
        {
            $color_name_data = Colors::where('id' , $color)->get()->first();
            $color_name = $color_name_data->colors_name;
            array_push($colors_names, $color_name);
        }
        // Colors and Size Work Start
        return view('details', ['product' => $product, 'more_imges_eists' => $more_imges_eists, 'sizes' => $sizes_names, 'colors' => $colors_names , 'questions' =>   $questions]);
    }
    public function detail_page(Request $request, $id)
    {
         // "SELECT * FROM products where id = $id limit 1"
         $product = Product::where('id' , $id)->get()->first();
         $more_imges_eists = 0;
         if(json_decode($product->product_more_image))
         {
             $more_imges_eists = 1;
         }
         // Colors and Size Work Start
         $sizes = json_decode($product->product_sizes);
         // ddd($sizes);
         $sizes_names = [];
         foreach($sizes as $size)
         {
              // "SELECT * FROM Sizes where id = $id limit 1"
             $size_name_data = Sizes::where('id' , $size)->get()->first();
             $size_name = $size_name_data->size_name;
             array_push($sizes_names, $size_name);
         }
 
         $colors = json_decode($product->product_colors);
         
         $colors_names = [];
         foreach($colors as $color)
         {
             $color_name_data = Colors::where('id' , $color)->get()->first();
             $color_name = $color_name_data->colors_name;
             array_push($colors_names, $color_name);
         }
         // Colors and Size Work Start
         return view('detail_page', ['product' => $product, 'more_imges_eists' => $more_imges_eists, 'sizes' => $sizes_names, 'colors' => $colors_names]);
    }
    public function index()
    {

    $products = Product::all();
        return view('index' ,['products' => $products]);
    }
    // Collection Page
    public function collection()
    {
        return view('collection');
    }

    // contact Page
    public function contact()
    {
        return view('contact');
    }
    
    // shoes Page
    public function shoes()
    {
        
        $colors = Colors::all();
        $products = Product::all();
        return view('shoes' , ['products' => $products , 'colors' => $colors]);
    }
    // Racing_boots Page
    public function racing_boots()
    {
        return view('racing_boots');
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
}
