</div>
<!-- END MAIN CONTAINER -->

<!-- BEGIN GLOBAL MANDATORY SCRIPTS -->
<script src="{{asset('admin/assets/js/libs/jquery-3.1.1.min.js')}}"></script>
<script src="{{asset('admin/bootstrap/js/popper.min.js')}}"></script>
<script src="{{asset('admin/bootstrap/js/bootstrap.min.js')}}"></script>
<script src="{{asset('admin/plugins/perfect-scrollbar/perfect-scrollbar.min.js')}}"></script>
<script src="{{asset('admin/assets/js/app.js')}}"></script>
<script>
    $(document).ready(function () {
        App.init();
    });
</script>
<script src="{{asset('admin/assets/js/custom.js')}}"></script>
<!-- END GLOBAL MANDATORY SCRIPTS -->

<!-- BEGIN PAGE LEVEL PLUGINS/CUSTOM SCRIPTS -->
<script src="{{asset('admin/plugins/apex/apexcharts.min.js')}}"></script>
<script src="{{asset('admin/assets/js/dashboard/dash_1.js')}}"></script>
<!-- BEGIN PAGE LEVEL PLUGINS/CUSTOM SCRIPTS -->
<script src="{{asset('admin/plugins/sweetalerts/sweetalert2.min.js')}}"></script>
<script src="{{asset('admin/plugins/sweetalerts/custom-sweetalert.js')}}"></script>
@livewireScripts
<script>
    Livewire.on('success', (message) => {
        const toast = swal.mixin({
            toast: true,
            position: 'top-end',
            showConfirmButton: false,
            timer: 3000,
            padding: '2em'
        });

        toast({
            type: 'success',
            title: message,
            padding: '2em',
        })
    });
    Livewire.on('error', (message) => {
        swal({
            title: 'Error!',
            text: message,
            type: 'error',
            padding: '2em'
        })
    });
    Livewire.on('deleting', (id, name) => {
        swal({
            title: 'warning',
            text: 'Are you sure you want to delete this ' + name,
            type: 'warning',
            showCancelButton: true,
            confirmButtonText: 'Delete',
            padding: '2em'
        }).then(function(result) {
            if (result.value) {
                livewire.emit('delete', id);

            }
        })
    });


</script>
@if(session()->has('success'))
    <script>
        livewire.emit('success', '{{session()->get('success')}}');
    </script>
    @endif
    @php
        session()->forget('success')
    @endphp
{{$js ?? ''}}
</body>

<!-- Mirrored from designreset.com/cork/ltr/demo4/ by HTTrack Website Copier/3.x [XR&CO'2014], Sun, 04 Jul 2021 10:07:44 GMT -->
</html>
<?php
