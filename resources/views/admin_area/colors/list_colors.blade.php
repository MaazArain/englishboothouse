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
                    <div class="alert alert-danger"> 
                      {{ session('success') }}
                    </div>
                  @endif
          <div class="col-lg-12 grid-margin stretch-card">
                <div class="card">
                  <div class="card-body">
                  <button type="button" class="btn btn-success btn-rounded btn-fw mb-2 float-end"><a href="{{route('add_colors')}}" class="text-decoration-none text-white">Add Colors</a></button>
                    <h4 class="card-title">Bordered table</h4>
                    <h6>Table list</h6>
                    </p>
                    <table class="table table-bordered">
                      <thead>
                        <tr>
                          <th>#</th>
                          <th> Name</th>
                          <th>Actions</th>
                        </tr>
                      </thead>
                      <tbody>
                  @foreach($colors as $colors)
                        <tr>
                          <td>{{$colors['id']}}</td>
                          <td>{{$colors['colors_name']}}</td>
                          <td><Button class="btn btn-success"><a href="{{ route('edit_colors' , ['id' => $colors['id']]) }}" class="text-white text-decoration-none">EDIT</a>
                        </Button>
                        <Button class="btn btn-danger"><a href="{{ route('delete_colors' , ['id' => $colors['id']]) }}" class="text-white text-decoration-none">DELETE</a>
                        </Button>                        
                        </td>                              
                        </tr>
                        @endforeach
                      </tbody>
                    </table>
                    
                  </div>
                </div>
              </div>
          <!-- content-wrapper ends -->
          
<!-- This is Footer Start  -->
@include('admin_area.layouts.footer')
<!-- This is Footer ENd  -->
