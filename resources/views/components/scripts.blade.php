@php
    $user = \Illuminate\Support\Facades\Auth::user();
@endphp
<!-- jQuery -->
<script src="{{ asset('backend/vendor/jquery.min.js') }}"></script>

<!-- Datatables -->
<script src="{{ asset('backend/vendor/datatables/datatables.min.js') }}"></script>

<!-- Bootstrap -->
<script src="{{ asset('backend/vendor/popper.min.js') }}"></script>
<script src="{{ asset('backend/vendor/bootstrap.min.js') }}"></script>

<!-- Perfect Scrollbar -->
<script src="{{ asset('backend/vendor/perfect-scrollbar.min.js') }}"></script>

<!-- DOM Factory -->
<script src="{{ asset('backend/vendor/dom-factory.js') }}"></script>

<!-- MDK -->
<script src="{{ asset('backend/vendor/material-design-kit.js') }}"></script>

<!-- App JS -->
<script src="{{ asset('backend/js/app.js') }}"></script>

<!-- Preloader -->
<script src="{{ asset('backend/js/preloader.js') }}"></script>

<!-- Global Settings -->
<script src="{{ asset('backend/js/settings.js') }}"></script>

<!-- Moment.js -->
<script src="{{ asset('backend/vendor/moment.min.js') }}"></script>
<script src="{{ asset('backend/vendor/moment-range.js') }}"></script>

<!-- Flatpickr -->
<script src="{{ asset('backend/vendor/flatpickr/flatpickr.min.js') }}"></script>
<script src="{{ asset('backend/js/flatpickr.js') }}"></script>

<!-- Chart.js -->
<script src="{{ asset('backend/vendor/Chart.min.js') }}"></script>
<script src="{{ asset('backend/js/chartjs.js') }}"></script>
<script src="{{ asset('backend/js/chartjs-rounded-bar.js') }}"></script>

<!-- Chart.js Samples -->
{{-- <script src="{{ asset('backend/js/page.ecommerce.js') }}"></script>
<script src="{{ asset('backend/js/page.hr-dashboard.js') }}"></script>
<script src="{{ asset('backend/js/page.employees.js') }}"></script>
<script src="{{ asset('backend/js/page.staff.js') }}"></script>
<script src="{{ asset('backend/js/page.projects.js') }}"></script> --}}


<!-- List.js -->
<script src="{{ asset('backend/vendor/list.min.js') }}"></script>
<script src="{{ asset('backend/js/list.js') }}"></script>

<!-- Touchspin -->
<script src="{{ asset('backend/vendor/jquery.bootstrap-touchspin.js') }}"></script>
<script src="{{ asset('backend/js/touchspin.js') }}"></script>

<!-- DateRangePicker -->
<script src="{{ asset('backend/vendor/moment.min.js') }}"></script>
<script src="{{ asset('backend/vendor/daterangepicker.js') }}"></script>
<script src="{{ asset('backend/js/daterangepicker.js') }}"></script>

<!-- jQuery Mask Plugin -->
<script src="{{ asset('backend/vendor/jquery.mask.min.js') }}"></script>

<!-- Quill -->
<script src="{{ asset('backend/vendor/quill.min.js') }}"></script>
<script src="{{ asset('backend/js/quill.js') }}"></script>

<!-- Select2 -->
<script src="{{ asset('backend/vendor/select2/select2.min.js') }}"></script>
<script src="{{ asset('backend/js/select2.js') }}"></script>

<!-- Tables -->
<script src="{{ asset('backend/js/toggle-check-all.js') }}"></script>
<script src="{{ asset('backend/js/check-selected-row.js') }}"></script>

<!-- Range Slider -->
<script src="{{ asset('backend/vendor/ion.rangeSlider.min.js') }}"></script>
<script src="{{ asset('backend/js/ion-rangeslider.js') }}"></script>

<!-- Dropzone -->
<script src="{{ asset('backend/vendor/dropzone.min.js') }}"></script>
<script src="{{ asset('backend/js/dropzone.js') }}"></script>

<!-- Highlight.js -->
<script src="{{ asset('backend/js/hljs.js') }}"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/summernote/0.8.18/summernote.min.js"></script>

{{--<script src="{{ asset('backend/vendor/sweetalert.min.js') }}"></script>--}}
{{--<script src="{{ asset('backend/js/sweetalert.js') }}"></script>--}}
<script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/sweetalert2/11.7.17/sweetalert2.min.js"></script>
<!-- custom -->
<script src="{{ asset('backend/js/custom.js') }}"></script>

<script>
    $('.notification').on('click',function () {
        var notification = $(this).find('input').val();
        $.ajax({
            url:'{{ url('notification') }}',
            method:'GET',
            data: {
                notification:notification,
            },
            success:function (result) {

            },
            error: function(result) {

            }
        });
    });
    @if($user->hasRole('admin'))

    $('.floating-chat').on('click',function () {
        var notification = 0;
        $.ajax({
            url:'{{ url('floating-chat') }}',
            method:'GET',
            data: {
                notification:notification,
            },
            success:function (result) {
                $('#count_floating_chat').remove();
            },
            error: function(result) {
                alert('no')
            }
        });
    });
    @endif

    $('.details').summernote(
        {
            tabsize: 2,
            height: 300,
            toolbar: [
                ['style', ['style']],
                ['font', ['bold', 'underline', 'clear']],
                ['color', ['color']],
                ['para', ['ul', 'ol', 'paragraph']],
                ['table', ['table']],
            ]
        }
    );

    @if(!$user->hasRole('admin'))
        $('#sendMessage').on('click',function () {
            var subject = $('#subject').val();
            var details = $('#details').val();
            let _token   = $('meta[name="csrf-token"]').attr('content');
            $.ajax({
                url:'{{ route('dashboard.problems.store') }}',
                method:'POST',
                data: {
                    subject:subject,
                    details:details,
                    _token: _token
                },
                success:function (result) {
                    if(!subject && !details){
                        return false;
                    }
                    closeElement();
                    swal({
                        title: "Success!",
                        text: "Your problem has been sent successfully!",
                        icon: "success",
                        button: "Confirm!",
                    });
                    $('#subject').val('');
                    $('#details').val('');
                },
                error: function(result) {
                    alert('Something went wrong!')
                }
            });
        })
    @endif
</script>

