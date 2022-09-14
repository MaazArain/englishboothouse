<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Colors;
use App\Models\Product;
use App\Models\Sizes;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Redirect;
// import the Intervention Image Manager Class
use Intervention\Image\ImageManagerStatic as Image;
class ProductsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $categories = Category::all();
        $sizes = Sizes::all();
        $colors = Colors::all();
        // dd($colors);
        // dd($sizes);
        return view('admin_area.products.product' ,['categories' => $categories , 'sizes' =>  $sizes , 'colors' => $colors]);
        
    }

public function store_products(Request $request)
{
    // dd($request);
    $productValidated = $request->validate([
        'product_code' => 'required',
        'product_name' => 'required|unique:products|max:255',
        'product_categories' => 'required',
        'product_sizes' => 'required',
        'product_colors' => 'required',
        'product_short_description' => 'required|max:255',
        'product_long_description' => 'required|max:255',
        'product_qty' => 'required',
        'product_price' => 'required',
        'product_image' => 'required|image|mimes:jpeg,png,jpg',
    ]);
    $save_image_name ="";
    $product_image = $request->file('product_image');
    // ddd($product_image);


    if($product_image != null)
    {
        $name_generate = hexdec(uniqid()); // 238949023849028394082390
        $image_extension = strtolower($product_image->getClientOriginalExtension()); // png, jpg, jpeg
        $image_name = $name_generate.'.'.$image_extension; // 238949023849028394082390.png
        $upload_location = 'product_images/';
        $last_image_name = $upload_location.$image_name;
        //$product_image->move($upload_location, $image_name);
        for($i = 1; $i <= 4; $i++)
        {
            $prefix = "";
            $w = 0;
            $h = 0;
            if($i == 1)
            {
                $prefix = "large-";
                $w = 900;
                $h = 600;
            }else  if($i == 2)
            {
                $prefix = "medium-";
                $w = 600;
                $h = 400;
            }else  if($i == 3)
            {
                $prefix = "small-";
                $w = 300;
                $h = 200;
            }else  if($i == 4)
            {
                $prefix = "xsmall-";
                $w = 50;
                $h = 50;
            }
            
            $save_image_name = $upload_location.$prefix.$image_name;
            // dd($w, $h, $save_image_name);

           Image::make($product_image)->resize($w, $h)->save($save_image_name);
        }
    }
    // More Images Work Start
    $save_more_images = [];
$product_more_images = $request->file('product_more_image');
if($product_more_images !=null)
  {
// ddd($product_more_image);

    foreach($product_more_images as $product_more_image){
        $name_generate_more = hexdec(uniqid()); // 238949023849028394082390
        $image_extension_more = strtolower($product_more_image->getClientOriginalExtension()); // png, jpg, jpeg
        $image_name_more = $name_generate_more.'.'.$image_extension_more; // 238949023849028394082390.png
        array_push($save_more_images, $image_name_more);
        $upload_location_more = 'product_more_images/';
        $last_image_name_more = $upload_location_more.$image_name_more;
        //$product_more_image->move($upload_location_more, $image_name_more);
        for($i = 1; $i <= 4; $i++)
        {
            $prefix = "";
            $w = 0;
            $h = 0;
            if($i == 1)
            {
                $prefix = "large-";
                $w = 900;
                $h = 600;
            }else  if($i == 2)
            {
                $prefix = "medium-";
                $w = 600;
                $h = 400;
            }else  if($i == 3)
            {
                $prefix = "small-";
                $w = 300;
                $h = 200;
            }else  if($i == 4)
            {
                $prefix = "xsmall-";
                $w = 50;
                $h = 50;
            }
            
            $save_image_name_more = $upload_location_more.$prefix.$image_name_more;
            // dd($w, $h, $save_image_name_more);

           Image::make($product_more_image)->resize($w, $h)->save($save_image_name_more);
        }
    }

    
}
//    More Images Work End
    $ProductInserted = Product::insert([
        'id' => $request->id,
        'product_code' => $request->product_code,
        'product_name' => $request->product_name,
        'product_categories' => $request->product_categories, 
        'product_sizes' => json_encode($request->product_sizes), 
        'product_colors' => json_encode($request->product_colors),
        'product_short_description' => $request->product_short_description, 
        'product_long_description' => $request->product_long_description,
        'product_qty' => $request->product_qty,
        'product_price' => $request->product_price,
        'product_discount' => $request->product_discount,
        'product_image' => $image_name,
        'product_more_image' => json_encode($save_more_images)
    ]);
    

    return Redirect()->back()->with('success' , 'data Inserted Successfully');

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
