<!-- Side Modal Top Right Success-->
<div class="modal fade right" id="sideModalTRDanger" tabindex="-1" role="dialog" aria-labelledby="myModalLabel"
     aria-hidden="true" data-backdrop="false">
    <div class="modal-dialog modal-side modal-top-right modal-notify modal-danger" role="document">
        <!--Content-->
        <div class="modal-content">
            <!--Header-->
            <div class="modal-header">
                <p class="heading lead">Error</p>

                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true" class="white-text">&times;</span>
                </button>
            </div>

            <!--Body-->
            <div class="modal-body">
                <div class="text-center">
                    <i class="fas fa-times fa-4x mb-3 animated rotateIn"></i>
                        @foreach ( is_array($errors) ? $errors : $errors->all() as $error)
                            <h5>{{ $error }}</h5>
                        @endforeach
                </div>
            </div>

            <!--Footer-->
            <div class="modal-footer justify-content-center">
                <a role="button" class="btn btn-outline-danger waves-effect" data-dismiss="modal">
                    Ok</a>
            </div>
        </div>
        <!--/.Content-->
    </div>
</div>
<!-- Side Modal Top Right Success-->
