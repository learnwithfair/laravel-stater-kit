@extends('backend.layout.app')
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
                                        style="font-weight: 900" title="Add a new social media field">Add</button>
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

{{-- @section('modal')
@include('backend.layout.modal._delete_confirm')
@include('backend.logo._logo_change_status_modal')
@endsection --}}
@section('script')
    {{-- @include('backend.ajax._logoJS') --}}

    <script>
        let socialFieldsCount = $('#social_media_container .social_media1').length;

        function addSocialField() {
            const socialFieldsContainer = document.getElementById("social_media_container");

            if (socialFieldsCount < 4) {
                const newSocialField = document.createElement("div");
                newSocialField.className = "social_media1 input-group mb-3";
                newSocialField.innerHTML =
                    `<select class="dropdown-toggle drop-custom" name="social_media[]">
                                        <option class="dropdown-item">Select Social</option>
                                        <option class="dropdown-item" value="facebook">Facebook</option>
                                        <option class="dropdown-item" value="instagram">Instagram</option>
                                        <option class="dropdown-item" value="twitter">Twitter</option>
                                        <option class="dropdown-item" value="linkedin">Linkedin</option>
                                    </select>
                                    <input type="url" class="form-control" aria-label="Text input with dropdown button" name="profile_link[]" placeholder="Enter the profile link here">
                                    <button class="btn btn-outline-warning" type="button" onclick="removeNewSocialField(this)" style="font-weight: 900">Remove</button>`;

                socialFieldsContainer.appendChild(newSocialField);
                socialFieldsCount++;

                // Add event listener for duplicate check
                document.querySelectorAll('select[name="social_media[]"]').forEach(selectElement => {
                    selectElement.removeEventListener('change', checkForDuplicateSocialMedia);
                    selectElement.addEventListener('change', checkForDuplicateSocialMedia);
                });
            } else {
                Swal.fire({
                    icon: "error",
                    title: "Oops...",
                    text: "You can only add four social links fields!",
                });
            }
        }

        // Function to remove newly added fields (no AJAX call needed)
        function removeNewSocialField(button) {
            const socialField = button.parentElement;
            socialField.remove();
            socialFieldsCount--;
            checkForDuplicateSocialMedia();
        }

        function checkForDuplicateSocialMedia() {
            const allSelections = document.querySelectorAll('select[name="social_media[]"]');
            const allValues = Array.from(allSelections).map(select => select.value);
            const hasDuplicate = allValues.some((value, index) => allValues.indexOf(value) !== index && value !== "Select Social");

            if (hasDuplicate) {
                Swal.fire({
                    icon: "error",
                    title: "Oops...",
                    text: "You cannot add the same social media platform more than once.",
                });
                allSelections.forEach(selectElement => {
                    if (allValues.filter(value => value === selectElement.value).length > 1) {
                        selectElement.value = "Select Social";
                    }
                });
            }
        }

        // Function to remove existing fields (with AJAX call to delete from database)
        window.removeSocialField = function (button) {
            const socialLinkId = $(button).data('id');

            // Show confirmation dialog before deletion
            Swal.fire({
                title: 'Are you sure?',
                text: "You won't be able to revert this!",
                icon: 'warning',
                showCancelButton: true,
                confirmButtonColor: '#3085d6',
                cancelButtonColor: '#d33',
                confirmButtonText: 'Yes, delete it!'
            }).then((result) => {
                if (result.isConfirmed) {
                    $.ajax({
                        headers: {
                            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                        },
                        type: 'DELETE',
                        url: '{{ route('social.delete', ':id') }}'.replace(':id', socialLinkId),
                        data: {
                            _token: '{{ csrf_token() }}'
                        },
                        success: function (response) {
                            $(button).closest('.social_media1').remove();
                            socialFieldsCount--;

                            if (response.success === true) {
                               deleteModal();
                            } else {
                                errorModal();
                            }

                            checkForDuplicateSocialMedia();
                        },
                        error: function (xhr, status, error) {
                            console.error('Error:', error);
                            Swal.fire({
                                icon: "error",
                                title: "Oops...",
                                text: "Something went wrong. Please try again.",
                            });
                        }
                    });
                }
            });
        };

        // Initialize duplicate check for existing fields and attach remove button events
        $(document).ready(function () {
            document.querySelectorAll('select[name="social_media[]"]').forEach(selectElement => {
                selectElement.addEventListener('change', checkForDuplicateSocialMedia);
            });

            // Attach click events to existing remove buttons
            $('.removeSocialBtn').on('click', function () {
                window.removeSocialField(this);
            });
        });
    </script>
@endsection