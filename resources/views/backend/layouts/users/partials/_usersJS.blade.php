<script>
    document.addEventListener('DOMContentLoaded', function () {


        // Init DataTable
        const dt = $('#data-table').DataTable({
            processing: true,
            serverSide: true,
            responsive: true,
            ajax: '{{ route('users.index') }}',
            order: [[0, 'desc']],
            language: {
                paginate: {
                    previous: '<i class="fas fa-angle-left"></i>', // or 'Prev'
                    next: '<i class="fas fa-angle-right"></i>' // or 'Next'
                },
                processing: `<div class="text-center">
                                <div class="spinner-border text-primary" style="width: 3rem; height: 3rem;" role="status">
                                <span class="visually-hidden">Loading...</span>
                              </div>
                                </div>`
            },
            columns: [
                { data: 'DT_RowIndex', name: 'DT_RowIndex', orderable: false, searchable: false },
                { data: 'name', name: 'name' },
                { data: 'email', name: 'email', orderable: false, searchable: true },
                { data: 'role_label', name: 'role', orderable: true, searchable: false },
                { data: 'set_admin', name: 'set_admin', orderable: false, searchable: false },
                { data: 'is_active', name: 'is_enabled', orderable: false, searchable: false },
                { data: 'action', name: 'action', orderable: false, searchable: false },
            ]
        });


        // --------- Open modals (populate fields) ----------
        $(document).on('click', '.change_admin_status', function (e) {
            e.preventDefault();
            $('#admin_status_id').val($(this).data('id'));
            $('#admin_role').val($(this).data('role'));
            $('#admin_status_title').text($(this).data('title'));
            $('#admin_status_description').text($(this).data('description'));
        });

        $(document).on('click', '.change_account_status', function (e) {
            e.preventDefault();
            $('#account_status_id').val($(this).data('id'));
            $('#account_enabled').val($(this).data('enabled'));
            $('#account_status_title').text($(this).data('title'));
            $('#account_status_description').text($(this).data('description'));
        });

        $(document).on('click', '.deletebtn', function (e) {
            e.preventDefault();
            $('#delete_id').val($(this).data('id'));
            $('#delete_type').val($(this).data('type'));
            $('#deletemodal').modal('show');
        });


        // --------- Submit modals (AJAX) ----------

        // Admin status
        $('#admin_status_modal_clear').on('submit', function (e) {
            e.preventDefault();
            const id = $('#admin_status_id').val();
            const role = $('#admin_role').val();

            $.ajax({
                url: '{{ url('/admin/users') }}/' + id + '/role',
                type: 'PATCH',
                data: { role: role },
                success: function (res) {
                    dt.ajax.reload(null, false);
                    successModal('SUCCESSFULLY UPDATED');

                },
                error: function (xhr) {
                    errorModal();
                    console.error(xhr.responseText || xhr.statusText);
                },


            });
        });

        // Enable or Desable accout
        $('#account_status_modal_clear').on('submit', function (e) {
            e.preventDefault();
            const id = $('#account_status_id').val();
            const isEnabled = $('#account_enabled').val();

            $.ajax({
                url: '{{ url('/admin/users') }}/' + id + '/account-status',
                type: 'PATCH',
                data: { is_enabled: isEnabled },
                success: function (res) {
                    dt.ajax.reload(null, false);
                    successModal('SUCCESSFULLY UPDATED');
                },
                error: function (xhr) {
                    errorModal();
                    console.error(xhr.responseText || xhr.statusText);
                }
            });


        });


        $('#delete_modal_clear').on('submit', function (e) {
            e.preventDefault();
            let id = $('#delete_id').val();
            $.ajax({
                url: '{{ url('/admin/users') }}/' + id,
                type: 'DELETE',
                data: {
                    _token: '{{ csrf_token() }}'
                },
                success: function (res) {
                    dt.ajax.reload(null, false);
                    successModal('SUCCESSFULLY DELETED');
                },
                error: function (xhr) {
                    errorModal();
                    console.error(xhr.responseText || xhr.statusText);
                }
            });
        });


    });
</script>