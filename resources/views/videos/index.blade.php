@extends('../layouts.panel')

@section('content')
    <div class="container-fluid mt-5">
        <div class="row wow fadeIn">
            @include('videos.create')
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
                        <!-- Table  -->
                        <table class="table table-hover table-responsive-sm">
                            <!-- Table head -->
                            <thead class=" lighten-4">
                            <tr>
                                <th>ID</th>
                                <th>Name</th>
                                <th>Description</th>
                                <th>Created At</th>
                                <th>Status</th>
                                <th></th>
                            </tr>
                            </thead>
                            <tbody>
                            @foreach($videos as $video)
                                <tr>
                                    <td>{{ $video->id }}</td>
                                    <td>{{ $video->name }}</td>
                                    <td>{{ $video->description }}</td>
                                    <td>{{ $video->created_at }}</td>
                                    <td>{{ $video->ready ? 'ready' : 'pending' }}</td>
                                    <td>
                                        <a class="ml-3 btn btn-light-blue btn-sm" href="{{ route('videos.show', $video->id) }}">
                                            Show
                                        </a>
                                    </td>
                                </tr>
                            @endforeach
                            </tbody>
                            <!-- Table body -->
                        </table>
                        <!-- Table  -->
                    </div>
                    <div class="card-footer">
                        {{ $videos->appends($_GET)->links() }}
                    </div>
                </div>
                <!--/.Card-->
            </div>
            <!--Grid column-->
        </div>
        <!--Grid row-->
    </div>
@endsection
