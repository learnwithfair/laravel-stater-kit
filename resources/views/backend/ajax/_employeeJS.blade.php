<script>
    $(document).ready(function() {
        // Delete section start
        $(document).on('click', '.delete_data', function(e) {
            e.preventDefault();
            $('.modal-busy').show();
            let id = $('#delete_id').val();
            let type = $('#delete_type').val();
            $('#delete_modal_clear')[0].reset();

            if (type == "delete_employee") {
                var url = "{{ route('employee.destroy', ':id') }}";
                url = url.replace(':id', id);
                $.ajax({
                    type: "delete",
                    dataType: "json",
                    url: url,
                    success: function(res) {
                        if (res.status == 'success') {
                            $('.reloadEmployeeTable').load(location.href +
                                ' .reloadEmployeeTable');
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

        });
        //Delete section end

        // Update section start
        $(document).on('click', '.edit_employee', function(e) {
            e.preventDefault();
            $('.modal-busy').show();
            let id = $('#editEmployeeId').val();
            let name = $('#editEmployeeName').val();
            let email = $('#editEmployeeEmail').val();
            let phone = $('#editEmployeePhone').val();
            let role = $('#editEmployeeRole').val();
            let is_supervisor = $('#editIsSupervisor').val();
            let supervisor_id = $('#editSupervisorName').val();
            let department = $('#editEmployeeDepartment').val();
            let employee_type = $('#editEmployeeType').val();
            let employment_type = $('#editEmploymentType').val();
            let total_leave = $('#editEmployeeTotalLeave').val();

            var url = "{{ route('employee.update', ':id') }}";
            url = url.replace(':id', id);
            $('#employee_edit_modal_clear')[0].reset();
            $.ajax({
                type: "put",
                dataType: "json",
                data: {
                    name,
                    email,
                    phone,
                    role,
                    is_supervisor,
                    supervisor_id,
                    department,
                    employee_type,
                    employment_type,
                    total_leave
                },
                url: url,
                success: function(res) {

                    if (res.status == 'success') {
                        $('.reloadEmployeeTable').load(location.href +
                            ' .reloadEmployeeTable');
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
    });
</script>
