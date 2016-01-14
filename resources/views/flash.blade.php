
@if(session()->has('flash_message'))
    <script>
        swal({
            title: "{{ session('flash_message.title') }}",
            text: "{{ session('flash_message.message') }}",
            type: "{{ session('flash_message.level') }}",
            timer: 1700,
            showConfirmButton: false
        });
    </script>
@endif

@if(session()->has('flash_overlay_message'))
    <script>
        swal({
            title: "{{ session('flash_overlay_message.title') }}",
            text: "{{ session('flash_overlay_message.message') }}",
            type: "{{ session('flash_overlay_message.level') }}",
            confirmButtonText: 'Ok'
        });
    </script>
@endif
