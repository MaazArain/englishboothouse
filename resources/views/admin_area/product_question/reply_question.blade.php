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
                    <h4 class="card-title">Reply Question</h4>
                    <h3>{{ $question_detail[0]->title }}</h3>
                    <p>{{ $question_detail[0]->user_question }}</p>
                    <br><br>
                    <form action="route('store_answer')" method="post">
                        @csrf
                        <input type="hidden" name="question_id" value="{{ $question_detail[0]->id }}">
                        <h5>Reply</h5>
                        <textarea name="answer" id="reply_question" class="form-control" placeholder="Rwply your Answer" rows="15"></textarea>
                        <br><br>
                        <input type="submit" class="btn btn-success btn-lg" value="Reply" name="reply_answer">
                    </form>
                  </div>
                </div>
              </div>
          <!-- content-wrapper ends --> 
<!-- This is Footer Start  -->
@include('admin_area.layouts.footer')
<!-- This is Footer ENd  -->
