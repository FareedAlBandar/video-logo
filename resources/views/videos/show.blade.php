@extends('../layouts.panel')

@section('content')
    <div class="container-fluid mt-5">
        <div class="row wow fadeIn">
            <a class="ml-3 btn btn-light-blue btn-sm" href="{{ route('videos.index') }}">
                <i class="fas pr-2 fa-arrow-left"></i>
            </a>
        </div>
        <!--Grid row-->
        <div class="row wow fadeIn">

        @includeWhen(is_array($errors) || $errors->any(),'modals.errors',['errors'=>$errors])

        @includeWhen(Session::has('success'),'modals.success',['success'=>Session::get('success')])

        <!--Grid column-->
            <div class="col-12">
                <!--Card-->
                <div class="card">
                    <div class="card-header">
                    </div>
                    <!--Card content-->
                    <div class="card-body">
                        <video width="320" height="240" controls>
                            <source src="{{$video->video}}" type="{{$video->mime}}">
                          Your browser does not support the video tag.
                          </video>
                    </div>
                    <div class="card-footer">
                    </div>
                </div>
                <!--/.Card-->
            </div>
            <!--Grid column-->
        </div>
        <!--Grid row-->
    </div>
@endsection
