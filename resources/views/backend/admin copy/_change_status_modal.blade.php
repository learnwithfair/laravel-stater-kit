<div class="modal fade bd-example-modal-sm" id="adminStatusmodal" tabindex="-1" role="dialog"
    aria-labelledby="mySmallModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-sm modal-dialog-centered" role="document">
        <div class="modal-content modal_icon">
            <form action="" method="post" id="admin_status_modal_clear">
                @csrf
                <div class="modal-title" id="exampleModalLongTitle">
                    <input type="hidden" name="admin_status_id" id="admin_status_id">
                    <input type="hidden" name="status" id="status">
                    <div align="middle">
                        <img src="{{ asset('backend/assets/icon/warning.png') }}"
                            class="rounded-circle border border-danger p-2 img-fluid" alt="Warning">

                    </div>
                    <br>
                    <h5 id="admin_status_title"></h5>
                    <div></div>
                    <div id="admin_status_description"></div>
                </div>
                <br>
                <div>
                    <button type="button" class="btn btn-secondary btn-sm" data-dismiss="modal"
                        style="margin:0px 10px">No&nbsp;</button>
                    <button type="submit" class="btn btn-danger admin_status btn-sm" data-dismiss="modal"
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
        $(document).on('click', '.change_admin_status', function(e) {
            e.preventDefault();
            let id = $(this).data('id');
            let status = $(this).data('status');
            let title = $(this).data('title');
            let description = $(this).data('description');
            if (status == 0) {
                $('#admin-area').hide();
            } else {
                $('#admin-area').show();
            }
            $('#admin_status_id').val(id);
            $('#status').val(status);
            $('#admin_status_title').text(title);
            $('#admin_status_description').text(description);

        });
    });
</script>
