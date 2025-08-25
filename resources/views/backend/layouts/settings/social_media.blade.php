@extends('backend.layouts.app')
@section('title')
    || Social Settings
@endsection

@push('style')
    <style>
        .drop-custom {
            border-top-left-radius: 6px;
            border-bottom-left-radius: 6px;
            padding: 15px;
            border: 1px solid #4CAF50;
            color: #313131;
            transition: all 0.3s ease;
        }

        .drop-custom:hover {
            background-color: #414241;
            color: white;
        }

        .btn {
            font-size: 16px;
            transition: all 0.3s ease;
        }

        .btn:hover {
            transform: scale(1.1);
        }
    </style>
@endpush
@section('content')
    <div class="content-wrapper">
        <div class="row justify-content-center">
            <div class="col-12">
                <div class="dashboard_header mb_10">
                    <div class="row">
                        <div class="col-lg-6">
                            <div class="dashboard_header_title">
                                <h3>Social Settings</h3>
                            </div>
                        </div>
                        <div class="col-lg-6">
                            <div class="dashboard_breadcam text-end">
                                <p><a href="{{ route('admin.dashboard') }}">Dashboard</a> <i class="fas fa-caret-right"></i>
                                    <a href="{{ route('social.index') }}"> Social Settings</a>
                                </p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="container-fluid">
            <div class="row">
                <div class="col-lg-12">
                    <div class="mb-4 card-style">
                        <div class="card card-body">
                            <form action="{{ route('social.update') }}" method="POST">
                                @csrf
                                <div style="display: flex; justify-content: end; margin-bottom: 20px;">
                                    <button class="btn btn-primary btn-md" type="button" onclick="addSocialField()"
                                        style="font-weight: 900" title="Add a new social media field">Add New</button>
                                </div>

                                <div id="social_media_container">
                                    @foreach ($social_link as $index => $link)
                                        <div class="mb-3 social_media1 input-group dropdown">
                                            <input type="hidden" name="social_media_id[]" value="{{ $link->id }}">
                                            <select class="border dropdown-toggle" name="social_media[]"
                                                value="@isset($social_link){{ $link->social_media }}@endisset"
                                                title="Select a social media platform">
                                                <option class="dropdown-item">Select Social</option>
                                                <option class="dropdown-item" value="facebook" {{ $link->social_media == 'facebook' ? 'selected' : '' }}>Facebook
                                                </option>
                                                <option class="dropdown-item" value="instagram" {{ $link->social_media == 'instagram' ? 'selected' : '' }}>Instagram
                                                </option>
                                                <option class="dropdown-item" value="twitter" {{ $link->social_media == 'twitter' ? 'selected' : '' }}>Twitter
                                                </option>
                                                <option class="dropdown-item" value="linkedin" {{ $link->social_media == 'linkedin' ? 'selected' : '' }}>Linkedin
                                                </option>
                                            </select>
                                            <input type="url" class="form-control" aria-label="Text input with dropdown button"
                                                name="profile_link[]"
                                                value="@isset($social_link){{ $link->profile_link }}@endisset"
                                                placeholder="Enter the profile link here">
                                            <button class="btn btn-warning removeSocialBtn" type="button"
                                                style="font-weight: 900" data-id="{{ $link->id }}"
                                                title="Remove this social media field">Remove</button>
                                        </div>
                                    @endforeach
                                </div>

                                <div class="row">
                                    <div class="mt-3 col-12 ">
                                        <div class="d-flex justify-content-start ">
                                            <a href="{{ route('admin.dashboard') }}" class="btn btn-danger btn-md me-3"
                                                title="Cancel and go back to the dashboard">Cancel</a>
                                            <button type="submit" class="btn btn-primary btn-md"
                                                title="Submit the form">Submit</button>
                                        </div>
                                    </div>
                                </div>

                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>

    </div>
@endsection

@section('modal')
    @include('modal._delete_confirm')
@endsection

@section('script')
    <script>
        let socialFieldsCount = $('#social_media_container .social_media1').length;

        // Open delete modal
        $(document).on('click', '.removeSocialBtn', function () {
            $('#delete_id').val($(this).data('id'));
            $('#deletemodal').modal('show');
        });

        // Handle delete confirm
        $('#delete_modal_clear').on('submit', function (e) {
            e.preventDefault();
            let id = $('#delete_id').val();

            $.ajax({
                headers: { 'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content') },
                type: 'DELETE',
                url: '{{ route('social.delete', ':id') }}'.replace(':id', id),
                data: { _token: '{{ csrf_token() }}' },
                success: function (response) {
                    if (response.success) {
                        $('button[data-id="' + id + '"]').closest('.social_media1').remove();
                        socialFieldsCount--;
                        $('#deletemodal').modal('hide');
                        successModal(response.message || 'Deleted successfully');
                    } else {
                        errorModal('Deletion failed');
                    }
                },
                error: function () {
                    errorModal('An error occurred');
                }
            });
        });

        // Add new social field
        function addSocialField() {
            if (socialFieldsCount >= 4) {
                errorModal("You can only add four social links fields!");
                return;
            }
            const container = document.getElementById("social_media_container");
            const newField = `
                            <div class="mb-3 social_media1 input-group">
                                <select class="border dropdown-toggle" name="social_media[]">
                                    <option>Select Social</option>
                                    <option value="facebook">Facebook</option>
                                    <option value="instagram">Instagram</option>
                                    <option value="twitter">Twitter</option>
                                    <option value="linkedin">Linkedin</option>
                                </select>
                                <input type="url" class="form-control" name="profile_link[]" placeholder="Enter profile link">
                                <button class="btn btn-warning" type="button" onclick="removeNewSocialField(this)">Remove</button>
                            </div>`;
            container.insertAdjacentHTML("beforeend", newField);
            socialFieldsCount++;
            attachDuplicateCheck();
        }

        function removeNewSocialField(button) {
            button.closest('.social_media1').remove();
            socialFieldsCount--;
            attachDuplicateCheck();
        }

        function attachDuplicateCheck() {
            document.querySelectorAll('select[name="social_media[]"]').forEach(select => {
                select.removeEventListener('change', checkForDuplicateSocialMedia);
                select.addEventListener('change', checkForDuplicateSocialMedia);
            });
        }

        function checkForDuplicateSocialMedia() {
            const allValues = Array.from(document.querySelectorAll('select[name="social_media[]"]')).map(s => s.value);
            const duplicates = allValues.filter((v, i) => allValues.indexOf(v) !== i && v !== "Select Social");
            if (duplicates.length) {
                errorModal("Duplicate social media platform not allowed.");
                document.querySelectorAll('select[name="social_media[]"]').forEach(select => {
                    if (duplicates.includes(select.value)) select.value = "Select Social";
                });
            }
        }

        $(document).ready(function () {
            attachDuplicateCheck();
        });
    </script>

@endsection