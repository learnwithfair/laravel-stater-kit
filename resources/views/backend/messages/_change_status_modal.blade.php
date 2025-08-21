<div class="modal fade bd-example-modal-sm" id="leaveStatusmodal" tabindex="-1" role="dialog"
    aria-labelledby="mySmallModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-sm modal-dialog-centered" role="document">
        <div class="modal-content modal_icon">
            <form action="" method="post" id="leave_status_modal_clear">
                @csrf
                <div class="modal-title" id="exampleModalLongTitle">
                    <input type="hidden" name="leave_status_id" id="leave_status_id">
                    <input type="hidden" name="status" id="status">
                    <div align="middle">
                        <img src="{{ asset('backend/assets/icon/warning.png') }}" style="border-radius:unset;"
                            alt="">
                    </div>
                    <br>
                    <h5 id="leave_status_title"></h5>
                    <div></div>
                    <div id="leave_status_description"></div>
                </div>
                <br>
                <div>
                    <button type="button" class="btn btn-secondary" data-dismiss="modal"
                        style="margin:0px 10px">No&nbsp;</button>
                    <button type="submit" class="btn btn-danger leave_status" data-dismiss="modal"
                        style="margin:0px 10px">Yes</button>
                </div>
            </form>

        </div>
    </div>
</div>
{{-- For detele Confirm Modal  --}}
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>

<script>
    $(document).ready(function() {
        $(document).on('click', '.change_leave_status', function(e) {
            e.preventDefault();
            let id = $(this).data('id');
            let status = $(this).data('status');
            let title = $(this).data('title');
            let description = $(this).data('description');
            // if (status == 0) {
            //     $('#admin-area').hide();
            // } else {
            //     $('#admin-area').show();
            // }
            $('#leave_status_id').val(id);
            $('#status').val(status);
            $('#leave_status_title').text(title);
            $('#leave_status_description').text(description);

        });
    });
</script>
