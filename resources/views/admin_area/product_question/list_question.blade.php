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
          <div class="col-lg-12 grid-margin stretch-card">
                <div class="card">
                  <div class="card-body">
                  <button type="button" class="btn btn-success btn-rounded btn-fw mb-2 float-end"><a href="{{route('add_category')}}" class="text-decoration-none text-white">Add Category</a></button>
                    <h4 class="card-title">Question table</h4>
                    <h6>Customers Question list</h6>
                    
                    <table class="table table-bordered">
                        <thead>
                            <tr>
                                <th>S#</th>
                                <th>Question Title</th>
                                <th>Question Deription</th>
                                <th>Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($all_questions as $question)
                            <tr>
                                <td>1</td>
                                <td>{{ $question->title }}</td>
                                <td>{{ $question->user_question }}</td>
                                <td><a href="{{ route('reply_question_answer', ['qid' => $question->id ]) }}">Reply</a> | <a href="#">Delete</a></td>
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
