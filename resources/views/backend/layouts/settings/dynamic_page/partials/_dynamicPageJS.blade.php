<script>
    document.addEventListener('DOMContentLoaded', function () {
        const dt = $('#data-table').DataTable({
            processing: true,
            serverSide: true,
            responsive: true,
            ajax: '{{ route('dynamic_page.index') }}',
            order: [[0, 'desc']],
            columns: [
                { data: 'DT_RowIndex', orderable: false, searchable: false },
                { data: 'page_title' },
                { data: 'page_content' },
                { data: 'status', orderable: false, searchable: false },
                { data: 'action', orderable: false, searchable: false },
            ],
            language: {
                paginate: {
                    previous: '<i class="fas fa-angle-left"></i>',
                    next: '<i class="fas fa-angle-right"></i>'
                },
                processing: `<div class="text-center">
                            <div class="spinner-border text-primary" style="width:3rem;height:3rem;" role="status">
                                <span class="visually-hidden">Loading...</span>
                            </div>
                         </div>`
            },
            columnDefs: [
                { targets: [0, 3, 4], className: 'text-center' } 
            ]
        });

        // Open Status Modal
        $(document).on('click', '.change_status', function (e) {
            e.preventDefault();
            $('#status_id').val($(this).data('id'));
            $('#status_value').val($(this).data('status'));
            $('#status_title').text($(this).data('title'));
            $('#status_description').text($(this).data('description'));
        });
        // Submit Status Change
        $('#status_modal_clear').on('submit', function (e) {
            e.preventDefault();
            const id = $('#status_id').val();
            const status = $('#status_value').val();

            $.ajax({
                url: '{{ url('/admin/dynamic-page') }}/' + id + '/status',
                type: 'PATCH',
                data: {
                    status: status,
                    _token: '{{ csrf_token() }}'
                },
                success: function (res) {
                    dt.ajax.reload(null, false);
                    successModal(res.message || 'Status Updated');
                },
                error: function (xhr) {
                    console.error(xhr.responseText);
                    errorModal();
                }
            });
        });

        // Delete Confirmation
        $(document).on('click', '.deletebtn', function (e) {
            e.preventDefault();
            $('#delete_id').val($(this).data('id'));
            $('#deletemodal').modal('show');
        });

        $('#delete_modal_clear').on('submit', function (e) {
            e.preventDefault();
            const id = $('#delete_id').val();

            $.ajax({
                url: '{{ url('/admin/dynamic-page') }}/' + id,
                type: 'DELETE',
                data: {
                    _token: '{{ csrf_token() }}'
                },
                success: function (res) {
                    dt.ajax.reload(null, false);
                    successModal(res.message || 'Deleted Successfully');
                },
                error: function (xhr) {
                    console.error(xhr.responseText);
                    errorModal();
                }
            });
        });

    });
</script>