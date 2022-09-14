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
      <style>
    .tabbing > li:nth-child(1)
    {
     background-color: blue;
     color: white;
    }

    .tabbing > li
    {
      cursor: pointer;
      display: inline-block;
      width: 33%;
      border-right: 1px solid #eee;
      padding: 20px 0px;
      text-align: center;
      font-size: 20px;
    }
  </style>
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
<div class="container bg-white p-4 details_page">
  <div class="row">
    <div class="col-sm-4">
      <img class="img-fluid" src="/product_images/medium-{{$product['product_image']}}" alt="{{ $product->product_name }}">
      <div class="row">
      @if($more_imges_eists)  
        @php
          $more_images = json_decode($product->product_more_image);
          foreach($more_images as $more_image)
          {
           
            echo '<img src="/product_more_images/xsmall-'.$more_image.'">';
          
          }
        @endphp
      @endif
      </div>
    </div>
    <div class="col-sm-8 brand">
      <h2 class="card-title">{{ $product->product_name }}</h2>
      <h5 class="brand-shoes">Brand:<a href="">{{ $product->product_categories }}</a></h5>
      <hr>
      <ul class="product_price_ul">
        <li class="product_price_li">Rs:<a href="">{{ $product->product_price }}</a></li>
        <li class="font-weight-bold"><a href="">{{ $product->product_discount  . '%'}}</a></li>

      </ul>
      <hr>
      <h5>Color Family:</h5>
      @foreach($colors as $color)
          <input type="radio" name="color" value="{{ $color }}" class="p-3 m-3"> 
          <span class=""style="padding: 2px 12px; background-color: {{$color}};border:1px solid black;"></span>
      @endforeach


      <h5>Size:</h5>
      @foreach($sizes as $size)
          <input type="radio" name="size" value="{{ $size }}"> <span>{{ $size }}</span>
      @endforeach


      <h5>Quantity :  {{$product->product_qty}} </h5>
      <div class="row">
        <div class="col">
          <button class="btn btn-warning">Add To Cart</button>
          <button class="btn btn-primary">Buy Now</button>
        </div>
      </div>
    </div>
  </div>
  <div class="row">
        <div class="col-12">
            <ul class="tabbing">
              <li>Description</li>
              <li>Review</li>
              <li>Q&A</li>
            </ul>
        </div>
          <div class="drq_div">
            <div class="tab_description" style="display: none;">Description</div>
            <div class="tab_review" style="display: none;">Review</div>
            @foreach($questions as $question)
              {{$question->user_question}}
            @endforeach
            <div class="tab_qa" style="display: none;">
              <a href="{{route('question', [$product->id])}}" class="btn btn-warning mb-4 mt-4 ml-4">Ask a Question</a>
            </div>
          </div>
</div>
</div>
@include('layouts.footer')
<script>
  $(document).ready(function(){
    $(".drq_div > div").first().show();
    $(".tabbing > li").on('click', function(){
      var tabbed = '.tab_' +  $(this).text().toLowerCase().replace('&', '');
      $(".drq_div > div").hide();
      $(tabbed).show();
    });
  });
</script>
