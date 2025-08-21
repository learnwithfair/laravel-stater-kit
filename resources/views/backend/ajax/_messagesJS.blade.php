<script>
    // Function For Reload Message Table
    function messagesReload() {
        $('.reloadmessagesTable').load(location.href +
            ' .reloadmessagesTable');
        $('.reloadmessagesNoticeTable').load(location.href +
            ' .reloadmessagesNoticeTable');
    }

    $(document).ready(function() {
        // Delete section start
        $(document).on('click', '.delete_data', function(e) {
            e.preventDefault();
            $('.modal-busy').show();
            let id = $('#delete_id').val();
            let type = $('#delete_type').val();
            $('#delete_modal_clear')[0].reset();

            //Delete Messages Start
            if (type == "delete_message") {
                var url = "{{ route('leaves.destroy', ':id') }}";
                url = url.replace(':id', id);
                $.ajax({
                    type: "delete",
                    dataType: "json",
                    url: url,
                    success: function(res) {
                        if (res.status == 'success') {
                            messagesReload();
                            deleteModal();
                        } else if (res.status == 'error') {
                            errorModal();
                        }
                        $('.modal-busy').hide();
                    },
                    error: function(err) {
                        errorModal();
                        $('.modal-busy').hide();
                    }
                });
            }
            //Delete Messages End
        });
        //Delete section end


        // Update section start
        $(document).on('click', '.leave_status', function(e) {
            e.preventDefault();
            $('.modal-busy').show();
            let id = $('#leave_status_id').val();
            let is_admin_approve;

            is_admin_approve = $('#status').val();
            let action = "status";


            var url = "{{ route('leaves.update', ':id') }}";
            url = url.replace(':id', id);
            $('#leave_status_modal_clear')[0].reset();
            $.ajax({
                type: "put",
                dataType: "json",
                data: {
                    is_admin_approve,
                    action: action,
                },
                url: url,
                success: function(res) {
                    if (res.status == 'success') {
                        messagesReload();
                        updateModal();
                    } else if (res.status == 'error') {
                        errorModal();
                    }
                    $('.modal-busy').hide();
                },
                error: function(err) {
                    errorModal();
                    $('.modal-busy').hide();

                }
            });


        });

        // After click on more button, read_at updated
        $(document).on('click', '.view-description', function(e) {
            e.preventDefault();
            let id = $(this).data('id');
            let action = "read_at";

            //View Description Into Modal Start
            var url = "{{ route('leaves.update', ':id') }}";
            url = url.replace(':id', id);
            $.ajax({
                type: "put",
                dataType: "json",
                data: {
                    action: action,
                },
                url: url,
                success: function(res) {
                    messagesReload();
                }
            });
        });


    });
</script>
