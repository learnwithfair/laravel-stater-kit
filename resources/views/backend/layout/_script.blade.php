{{-- <script src="{{ asset('backend/assets/vendors/js/vendor.bundle.base.js') }}"></script> --}}



<!-- footer  -->
<script src="{{ asset('backend/assets/js/jquery1-3.4.1.min.js') }}"></script>
<!-- popper js -->
<script src="{{ asset('backend/assets/js/popper1.min.js') }}"></script>
<!-- bootstarp js -->
<script src="{{ asset('backend/assets/js/bootstrap1.min.js') }}"></script>


<!-- sidebar menu  -->
<script src="{{ asset('backend/assets/js/metisMenu.js') }}"></script>
<!-- waypoints js -->
<script src="{{ asset('backend/assets/vendors/count_up/jquery.waypoints.min.js') }}"></script>
<!-- waypoints js -->
<script src="{{ asset('backend/assets/vendors/chartlist/Chart.min.js') }}"></script>
<!-- counterup js -->
<script src="{{ asset('backend/assets/vendors/count_up/jquery.counterup.min.js') }}"></script>

<!-- nice select -->
<script src="{{ asset('backend/assets/vendors/niceselect/js/jquery.nice-select.min.js') }}"></script>
<!-- owl carousel -->
<script src="{{ asset('backend/assets/vendors/owl_carousel/js/owl.carousel.min.js') }}"></script>

<!-- responsive table -->
<script src="{{ asset('backend/assets/vendors/datatable/js/jquery.dataTables.min.js') }}"></script>
<script src="{{ asset('backend/assets/vendors/datatable/js/dataTables.responsive.min.js') }}"></script>
<script src="{{ asset('backend/assets/vendors/datatable/js/dataTables.buttons.min.js') }}"></script>
<script src="{{ asset('backend/assets/vendors/datatable/js/buttons.flash.min.js') }}"></script>
<script src="{{ asset('backend/assets/vendors/datatable/js/jszip.min.js') }}"></script>
<script src="{{ asset('backend/assets/vendors/datatable/js/pdfmake.min.js') }}"></script>
<script src="{{ asset('backend/assets/vendors/datatable/js/vfs_fonts.js') }}"></script>
<script src="{{ asset('backend/assets/vendors/datatable/js/buttons.html5.min.js') }}"></script>
<script src="{{ asset('backend/assets/vendors/datatable/js/buttons.print.min.js') }}"></script>

<!-- datepicker  -->
<script src="{{ asset('backend/assets/vendors/datepicker/datepicker.js') }}"></script>
<script src="{{ asset('backend/assets/vendors/datepicker/datepicker.en.js') }}"></script>
<script src="{{ asset('backend/assets/vendors/datepicker/datepicker.custom.js') }}"></script>

<script src="{{ asset('backend/assets/js/chart.min.js') }}"></script>
<script src="{{ asset('backend/assets/vendors/chartjs/roundedBar.min.js') }}"></script>

<!-- progressbar js -->
<script src="{{ asset('backend/assets/vendors/progressbar/jquery.barfiller.js') }}"></script>
<!-- tag input -->
<script src="{{ asset('backend/assets/vendors/tagsinput/tagsinput.js') }}"></script>
<!-- text editor js -->
<script src="{{ asset('backend/assets/vendors/text_editor/summernote-bs4.js') }}"></script>
<script src="{{ asset('backend/assets/vendors/am_chart/amcharts.js') }}"></script>

<!-- scrollabe  -->
<script src="{{ asset('backend/assets/vendors/scroll/perfect-scrollbar.min.js') }}"></script>
<script src="{{ asset('backend/assets/vendors/scroll/scrollable-custom.js') }}"></script>

<!-- vector map  -->
<script src="{{ asset('backend/assets/vendors/vectormap-home/vectormap-2.0.2.min.js') }}"></script>
<script src="{{ asset('backend/assets/vendors/vectormap-home/vectormap-world-mill-en.js') }}"></script>

<!-- apex chrat  -->
<script src="{{ asset('backend/assets/vendors/apex_chart/apex-chart2.js') }}"></script>
<script src="{{ asset('backend/assets/vendors/apex_chart/apex_dashboard.js') }}"></script>

{{-- <script src="{{ asset('backend/assets/vendors/echart/echarts.min.js') }}"></script>  --}}

<script src="{{ asset('backend/assets/vendors/chart_am/core.js') }}"></script>
<script src="{{ asset('backend/assets/vendors/chart_am/charts.js') }}"></script>
<script src="{{ asset('backend/assets/vendors/chart_am/animated.js') }}"></script>
<script src="{{ asset('backend/assets/vendors/chart_am/kelly.js') }}"></script>
<script src="{{ asset('backend/assets/vendors/chart_am/chart-custom.js') }}"></script>
<!-- custom js -->
<script src="{{ asset('backend/assets/js/dashboard_init.js') }}"></script>
<script src="{{ asset('backend/assets/js/custom.js') }}"></script>
<script src="{{ asset('assets/password-toggle.js') }}"></script>




<!-- Start  js for Bootsrap -->
{{-- <script src="https://code.jquery.com/jquery-3.4.1.slim.min.js"
    integrity="sha384-J6qa4849blE2+poT4WnyKhv5vZF5SrPo0iEjwBvKU7imGFAV0wwj1yYfoRSJoZ+n" crossorigin="anonymous">
</script>
<script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js"
    integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous">
</script> --}}
<script src="https://cdn.jsdelivr.net/npm/bootstrap@4.4.1/dist/js/bootstrap.min.js"
    integrity="sha384-wfSDF2E50Y2D1uUdj0O3uMBJnjuUD4Ih7YwaYd1iqfktj0Uod8GCExl3Og8ifwB6" crossorigin="anonymous">
</script>
<!-- End  js for Bootsrap -->

{{-- For ajax  --}}
@include('backend.ajax.masterAjax')
<!-- start  js for datatable -->
<script src=" https://cdn.datatables.net/1.10.20/js/jquery.dataTables.min.js" crossorigin="anonymous"></script>
<script src="https://cdn.datatables.net/1.10.20/js/dataTables.bootstrap4.min.js" crossorigin="anonymous"></script>
<script>
    // Call the dataTables jQuery plugin
    $(document).ready(function() {
        $('#dataTable').DataTable({
            language: {
                paginate: {
                    previous: '<i class="fas fa-angle-left"></i>', // or 'Prev'
                    next: '<i class="fas fa-angle-right"></i>' // or 'Next'
                }
            }
        });
    });
</script>
<!-- End  js for datatable -->


<script src="{{ asset('backend/assets/js/dropify.min.js')}}"></script>
<script src="{{ asset('backend/assets/js/summernote.js')}}"></script>


{{-- dropify start --}}
<script>
    $(document).ready(function() {
        $('.dropify').dropify();
    });
</script>
{{-- dropify end --}}


{{-- summernote start --}}
<script>
    $('#summernote').summernote({
        placeholder: 'Enter your content here...',
        tabsize: 2,
        height: 200,
        toolbar: [
            ['style', ['style']],
            ['font', ['bold', 'underline', 'clear']],
            ['color', ['color']],
            ['para', ['ul', 'ol', 'paragraph']],
            ['table', ['table']],
            ['insert', ['link', 'picture', 'video']],
            ['view', ['fullscreen', 'codeview', 'help']]
        ]
    });
</script>
{{-- summernote end --}}