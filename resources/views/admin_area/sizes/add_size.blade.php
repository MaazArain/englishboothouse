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
                    <div class="alert alert-success"> 
                      {{ session('success') }}
                    </div>
                  @endif
          <div class="col-md-12 grid-margin stretch-card">        
                <div class="card">
                  <div class="card-body">
                  <button type="button" class="btn btn-success btn-rounded btn-fw mb-2 float-end"><a href="{{ route('list_size') }}" class="text-decoration-none text-white">List Sizes</a></button>
                    <h4 class="card-title">Add Sizes</h4>
                    <p class="card-description"> Basic form elements </p>
                    <form class="forms-sample form" action="{{ route('store_size') }}" method="post">
                      @csrf
                      <div class="form-group">
                        <label for="size_name">Size Name</label>
                        <input type="text" class="form-control" id="size_name" name="size_name" placeholder="Enter Please Size Name">
                      </div>
                     <input type="submit" class="btn btn-success" name="sizes" value="AddSize">
                      <button class="btn btn-light">Cancel</button>
                    </form>
                  </div>
                </div>
              </div>
          </div>
          <!-- content-wrapper ends -->
          
<!-- This is Footer Start  -->
@include('admin_area.layouts.footer')
<!-- This is Footer ENd  -->
