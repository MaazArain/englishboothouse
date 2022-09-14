<!-- This is Header Start  -->
@include('admin_area.layouts.header')
<!-- This is Header Start  -->
<!-- This is navbar Start  -->
@include('admin_area.layouts.navbar')
<!-- This is navbar end  -->
      <div class="container-fluid page-body-wrapper">
      @include('admin_area.layouts.sidebar')
        <div class="main-panel">
          <div class="content-wrapper">
            @if(session('success'))
                <div class="alert alert-secondary">
                  {{ session('success') }}
                </div>
                @endif        
                  <!--Product Form Start   -->
                  <div class="col-md-12 col-sm-4  grid-margin stretch-card">
                <div class="card">
                  <div class="card-body">
                    <h4 class="card-title text-uppercase">Products</h4> 
                    <form class="forms-sample" action="{{ route('store_products') }}" method="POST" enctype="multipart/form-data">
                      @csrf
                    <div class="form-group">
                        <label for="exampleInputName1">Product Code</label>
                        @error('product_code')
                        <span>{{ $message }}</span>
                       @enderror
                        <input type="text" class="form-control" id="exampleInputName1" name="product_code" placeholder="Enter a Please Code">
                      </div>
                      <div class="form-group">
                        <label for="exampleInputName1">Product Name</label>
                        @error('product_name')
                        <span>{{ $message }}</span>
                       @enderror
                        <input type="text" class="form-control" id="exampleInputName1" placeholder="Enter a Please Name"  name="product_name">
                      </div>
                      <div class="form-group">
                        <label for="exampleSelectGender">Product Categories</label>
                            @error('product_categories')
                            <span>{{ $message }}</span>
                          @enderror
                        <select class="form-control" id="exampleSelectGender" name="product_categories">
                        @foreach($categories as $category)    
                        <option  value="{{$category->name}}">{{ $category->name }}</option>
                        @endforeach
                        </select>
                      </div>
                     <div class="form-group">
                     <label for="exampleSelectGender">Product Sizes</label><br>
                     @error('product_sizes')
                        <span>{{ $message }}</span>
                       @enderror
                      @foreach($sizes as $size)
                      <label for="" style="font-size: 15px;">
                        <input type="checkbox" class="p-3 m-3" value="{{$size->id}}" name="product_sizes[]"> {{$size->size_name}}
                      </label>
                      @endforeach
                      </div>
                      <div class="form-group">
                     <label for="exampleSelectGender">Product Colors</label><br>
                     @error('product_colors')
                        <span>{{ $message }}</span>
                       @enderror
                      @foreach($colors as $color)
                      <label for="">
                        <input type="checkbox" class="p-3 m-3" value="{{$color->id}}" name="product_colors[]" > 
                        <span style="background-color:{{$color->colors_name}};  border:1px solid black; padding:5px 14px;"></span>
                      </label>
                      @endforeach
                      </div>
                      <div class="form-group">
                        <label for="product_short_description">Product Short Description</label>
                        @error('product_short_description')
                        <span>{{ $message }}</span>
                       @enderror
                        <textarea class="form-control" id="product_short_description" rows="2" name="product_short_description"></textarea>
                      </div>  
                      <div class="form-group">
                        <label for="exampleTextarea1">Product Long Description</label>
                        @error('product_long_description')
                        <span>{{$message}}</span>
                        @enderror
                        <textarea class="form-control" id="exampleTextarea1" rows="6" name="product_long_description"></textarea>
                      </div>  
            <div class="form-group">              
            <label for="exampleTextarea1">Quantity</label>
            @error('product_qty')
                <span>{{$message}}</span>
                @enderror
                    <div class="quantity-control" data-quantity="">
                      <input type="number" class="quantity-input form-control" data-quantity-target="" value="1" step="0" min="" max="100" name="product_qty">
                   
                    </div>
            </div>
                <div class="form-group">              
                <label for="exampleTextarea1">Product price</label>
                @error('product_price')
                <span>{{$message}}</span>
                @enderror
                        <div class="price-control" data-price="">
                          <input type="text" class="price-input form-control" name="product_price">
                        </div>
                </div>
                    <div class="form-group">
                    @error('product_discount')
                    <span>{{$message}}</span>
                    @enderror              
                      <label for="exampleTextarea1">Discount</label>
                            <div class="price-control" data-price="">
                              <input type="text" class="price-input form-control" name="product_discount">
                            </div>
                    </div>
                      <div class="form-group">
                      
                        <label>Product Image</label>
                        @error('product_image')
                        <span>{{$message}}</span>
                        @enderror

                        <input type="file" class="file-upload-default">
                        <div class="input-group col-xs-12">
                          <input type="file" name="product_image" class="form-control file-upload-info" placeholder="Please Enter a Image">
                          <span class="input-group-append">
                            <button type="submit" class="file-upload-browse btn btn-primary">Upload</button>
                          </span>
                        </div>
                      </div>
                      <div class="form-group">
                        <label>Product More Image</label>
                        @error('product_more_image')
                        <span>{{$message}}</span>
                        @enderror
                        <input type="file" class="file-upload-default">
                        <div class="input-group col-xs-12">
                          <input type="file" name="product_more_image[]" class="form-control file-upload-info" placeholder="Please Enter a product_more_image" multiple>
                          <span class="input-group-append">
                            <button type="submit" class="file-upload-browse btn btn-primary">More Upload</button>
                          </span>
                        </div>
                      </div>
                      <input type="submit" class="btn btn-primary me-2" value="Submit">
                      <button  type="button" class="btn btn-light">Cancel</button>
                    </form>
                  </div>
                </div>
              </div>
                  <!-- Product Form End    -->
        <!-- content-wrapper ends -->          
<!-- This is Footer Start  -->
@include('admin_area.layouts.footer')
<!-- This is Footer ENd  -->