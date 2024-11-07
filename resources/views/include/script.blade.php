 <!-- Bootstrap core JavaScript-->
 <script src="{{asset('assets/vendor/jquery/jquery.min.js')}}"></script>
 <script src="{{asset('assets/vendor/bootstrap/js/bootstrap.bundle.min.js')}}"></script>

 <!-- Core plugin JavaScript-->
 <script src="{{asset('assets/vendor/jquery-easing/jquery.easing.min.js')}}"></script>

 <!-- Custom scripts for all pages-->
 <script src="{{asset('assets/js/sb-admin-2.min.js')}}"></script>

 <!-- Page level plugins -->
 <script src="{{asset('assets/vendor/chart.js/Chart.min.js')}}"></script>

 <!-- Page level custom scripts -->
 <script src="{{asset('assets/js/demo/chart-area-demo.js')}}"></script>
 <script src="{{asset('assets/js/demo/chart-pie-demo.js')}}"></script>



{{-- Jquery --}}
     <!-- Page level plugins -->
     <script src="{{ asset('assets/vendor/datatables/jquery.dataTables.min.js')}}"></script>
     <script src="{{ asset('assets/vendor/datatables/dataTables.bootstrap4.min.js')}}"></script>

     <!-- Page level custom scripts -->
     <script src="{{ asset('assets/js/demo/datatables-demo.js')}}"></script>
{{-- akhir Jquery --}}

{{-- sweetalert Delete --}}
<script src="https://cdnjs.cloudflare.com/ajax/libs/sweetalert/2.1.0/sweetalert.min.js"></script>
<script type="text/javascript">
    $('.delete_confirm').click(function(event) {
        var form = $(this).closest("form");
        var name = $(this).data("name");
        event.preventDefault();
        swal({
                title: `Apa Anda Yakin?`,
                text: "Data Yang Di Hapus Akan Hilang",
                icon: "warning",
                buttons: true,
                dangerMode: true,
            })
            .then((willDelete) => {
                if (willDelete) {
                    form.submit();
                }
            });
    });
</script>
{{-- end delete sweet alert --}}
{{-- akhir sweetalert Delete --}}

<script src="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.13/js/select2.min.js"></script>