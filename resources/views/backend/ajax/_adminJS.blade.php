<script>
    $(document).ready(function() {
        // Delete section start
        $(document).on('click', '.delete_data', function(e) {
            e.preventDefault();
            $('.modal-busy').show();
            let id = $('#delete_id').val();
            let type = $('#delete_type').val();
            $('#delete_modal_clear')[0].reset();

            //Delete Admin Start
            if (type == "delete_admin") {
                var url = "{{ route('users.destroy', ':id') }}";
                url = url.replace(':id', id);
                $.ajax({
                    type: "delete",
                    dataType: "json",
                    url: url,
                    success: function(res) {
                        if (res.status == 'success') {
                            $('.reloadAdminTable').load(location.href +
                                ' .reloadAdminTable');
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
            //Delete Admin End
        });
        //Delete section end

        // Update section start
        $(document).on('click', '.admin_status', function(e) {
            e.preventDefault();
            $('.modal-busy').show();
            let id = $('#admin_status_id').val();
            let role;
            let as_admin = document.getElementById('as_admin');

            role = $('#status').val();


            var url = "{{ route('users.update', ':id') }}";
            url = url.replace(':id', id);
            $('#admin_status_modal_clear')[0].reset();
            $.ajax({
                type: "put",
                dataType: "json",
                data: {
                    role: role,
                },
                url: url,
                success: function(res) {

                    if (res.status == 'success') {
                        $('.reloadAdminTable').load(location.href +
                            ' .reloadAdminTable');
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

        // Update account status (Enable /Disble)
        $(document).on('click', '.account_status', function(e) {
            e.preventDefault();
            $('.modal-busy').show();
            let id = $('#account_status_id').val();
            let is_enabled;
            let as_admin = document.getElementById('as_admin');

            is_enabled = $('#status').val();


            var url = "{{ route('accoutStatus', ':id') }}";
            url = url.replace(':id', id);
            $('#account_status_modal_clear')[0].reset();
            $.ajax({
                type: "put",
                dataType: "json",
                data: {
                    is_enabled: is_enabled,
                },
                url: url,
                success: function(res) {
                    if (res.status == 'success') {
                        $('.reloadAdminTable').load(location.href +
                            ' .reloadAdminTable');
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
        // Update section end



    });
</script>
