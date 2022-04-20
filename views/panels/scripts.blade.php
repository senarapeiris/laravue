{{-- Vendor Scripts --}}
<script src="{{ asset(mix('vendors/js/vendors.min.js')) }}"></script>
<script src="{{ asset(mix('vendors/js/ui/prism.min.js')) }}"></script>
<script src="{{ asset(mix('vendors/js/extensions/toastr.min.js')) }}"></script>
@yield('vendor-script')

{{-- Theme Scripts --}}
<script src="{{ asset(mix('js/core/app-menu.js')) }}"></script>
<script src="{{ asset(mix('js/core/app.js')) }}"></script>
@if($configData['blankPage'] === false)
<script src="{{ asset(mix('js/scripts/customizer.js')) }}"></script>
@endif
<script>
    $(document).ready(function() {
        toastr.options.timeOut = 5000;
        
        @if(Session::has('error'))
        toastr['error']('{{ Session::get('error') }}', 'Error !!!', {
            closeButton: true,
            tapToDismiss: false,
        });

        @elseif(Session::has('success'))
        toastr['success']('{{ Session::get('success') }}', 'Success !!!', {
            closeButton: true,
            tapToDismiss: false,
        });
        @endif
    });
</script>
{{-- page script --}}
@yield('page-script')
{{-- page script --}}
