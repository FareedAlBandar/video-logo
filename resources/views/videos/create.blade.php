
<button type="button" class="btn btn-success btn-sm ml-3" data-toggle="modal" data-target="#createVideo">
    <i class="fas fa-plus"></i>
     Video
</button>
<!--Modal: Create Video-->
<div class="modal fade" id="createVideo" tabindex="-1" role="dialog" aria-labelledby="createVideo"
     aria-hidden="true">
    <div class="modal-dialog" role="document">

        <form action="{{ route('videos.store') }}" method="post" enctype="multipart/form-data">
            @csrf
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Upload Video</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                    <input type="text" id="name" name="name" placeholder="Video Name ..."
                           aria-label="Video Name" class="form-control" required>
                    <input type="text" id="description" name="description" placeholder="Video description ..."
                           aria-label="Video Description" class="form-control">
                    <input type="file" id="file" name="file" aria-label="Video Description" class="form-control" required>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-primary btn-sm" data-dismiss="modal">Close</button>
                <button type="submit" class="btn btn-success btn-sm">Submit</button>
            </div>
        </div>

        </form>
    </div>
</div>
<!--Modal: Video Create-->
