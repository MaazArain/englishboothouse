<!DOCTYPE html>
<html lang="en">
   <head>
          <!-- basic -->
          <meta charset="utf-8">
          <meta http-equiv="X-UA-Compatible" content="IE=edge">
          <!-- mobile metas -->
          <meta name="viewport" content="width=device-width, initial-scale=1">
          <meta name="viewport" content="initial-scale=1, maximum-scale=1">
          <!-- site metas -->
          <title>Pullshoes</title>
          <meta name="keywords" content="">
          <meta name="description" content="">
          <meta name="author" content="">
          <!-- bootstrap css -->
          <link rel="stylesheet" href="/css/bootstrap.min.css">
          <!-- style css -->
          <link rel="stylesheet" href="/css/style.css">
          <!-- Responsive-->
          <link rel="stylesheet" href="/css/responsive.css">
          <!-- fevicon -->
          <link rel="icon" href="/images/fevicon.png" type="image/gif" />
          <!-- Scrollbar Custom CSS -->
          <link rel="stylesheet" href="/css/jquery.mCustomScrollbar.min.css">
          <!-- Tweaks for older IEs-->
          <link rel="stylesheet" href="https://netdna.bootstrapcdn.com/font-awesome/4.0.3/css/font-awesome.css">
          <!-- owl stylesheets --> 
          <link rel="stylesheet" href="css/owl.carousel.min.css">
          <link rel="stylesheet" href="css/owl.theme.default.min.css">
          <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/fancybox/2.1.5/jquery.fancybox.min.css" media="screen">
          <!--[if lt IE 9]>
          <script src="https://oss.maxcdn.com/html5shiv/3.7.3/html5shiv.min.js"></script>
          <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script><![endif]-->
   </head>
   <!-- body -->
<body class="main-layout bg-light">
   <div class="header_section">
		<div class="container">
			<div class="row">
				<div class="col-sm-3">
					<div class="logo"><a href="#"><img src="/images/logo.png"></a></div>
				</div>
				<div class="col-sm-9">
					<nav class="navbar navbar-expand-lg navbar-light ">
                        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNavAltMarkup" aria-controls="navbarNavAltMarkup" aria-expanded="false" aria-label="Toggle navigation">
                        <span class="navbar-toggler-icon"></span>
                        </button>
                    <div class="collapse navbar-collapse" id="navbarNavAltMarkup">
                        <div class="navbar-nav">
                           <a class="nav-item nav-link" href="{{ route('index') }}">Home</a>
                           <a class="nav-item nav-link" href="{{ route('collection') }}">Collection</a>
                           <a class="nav-item nav-link" href="{{ route('shoes') }}">Shoes</a>
                           <a class="nav-item nav-link" href="{{ route('racing_boots') }}">Racing Boots</a>
                           <a class="nav-item nav-link" href="{{ route('contact') }}">Contact</a>
                           <a class="nav-item nav-link last" href="#"><img src="/images/search_icon.png"></a>
                           <a class="nav-item nav-link last" href="{{route('contact') }}"><img src="/images/shop_icon.png"></a>
                        </div>
                    </div>
                    </nav>
				</div>
			</div>
		</div>
</div>

    <div class="container-fluid p-4 mt-4">  
        <div class="row w-100">
        <div class="col-12">
        @if(session('success'))
            <div class="alert alert-success"> {{session('success')}} </div>
        @endif
        </div>
        </div>
        <div class="row">
          <img src="/product_images/small-{{$product['product_image'] }}" alt="" width="auto">
       <div class="col-sm-8 brand">    
            <h2 class="card-title">{{ $product->product_name }}</h2>
            <h5 class="brand-shoes">Brand:<a href="">{{ $product->product_categories }}</a></h5>
            <hr>
            <ul class="product_price_ul">
              <li class="product_price_li">Rs:<a href="">{{ $product->product_price }}</a></li>
              <br>
            </ul>
          <div class="row">
            <div class="col">
              <button class="btn btn-warning">Add To Cart</button>
            </div>
          </div>
          </div>
                <div class="col-sm-6">
                    <form action="{{ route('store_question')}}" method="POST" enctype="multipart/form-data">
                        @csrf
                        <input type="hidden" name="product_id" value="{{ $product->id }}">
                        <div class="form-group mt-2">
                            <label for="">Title :</label>
                            <select class="form-control" name="title">
                              <option value="Payment">Payment</option>
                              <option value="Shipment">Shipment</option>
                              <option value="Product Information">Product_information</option>
                            </select>
                        </div>
                        <div class="form-group">
                            <br>
                            <label for="Questions" class="font-weight-bold">Q & A</label>
                            <textarea name="user_question" id="user_question" cols="30" rows="10" class="form-control"></textarea>
                        </div>

                        <div class="form-group">
                          <input type="submit" class="btn btn-primary me-2" value="Submit">
                        </div>
                    </form>
                </div> 
        </div>
    </div>
