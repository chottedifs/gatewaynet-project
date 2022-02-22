<!-- Scripts -->
<script src="https://cdn.jsdelivr.net/npm/jquery@2.2.4/dist/jquery.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/popper.js@1.14.4/dist/umd/popper.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@4.1.3/dist/js/bootstrap.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/jquery-match-height@0.7.2/dist/jquery.matchHeight.min.js"></script>
<script src="{{ asset('gatewaynet-admin/assets/js/main.js') }}"></script>

<script src="https://cdn.jsdelivr.net/npm/moment@2.22.2/moment.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/fullcalendar@3.9.0/dist/fullcalendar.min.js"></script>
<script src="{{ asset('gatewaynet-admin/assets/js/init/fullcalendar-init.js') }}"></script>

<!-- Data Table -->
<script src="{{ asset('gatewaynet-admin/assets/js/lib/data-table/datatables.min.js') }}"></script>
<script src="{{ asset('gatewaynet-admin/assets/js/lib/data-table/dataTables.bootstrap.min.js') }}"></script>
<script src="{{ asset('gatewaynet-admin/assets/js/lib/data-table/dataTables.buttons.min.js') }}"></script>
<script src="{{ asset('gatewaynet-admin/assets/js/lib/data-table/buttons.bootstrap.min.js') }}"></script>
<script src="{{ asset('gatewaynet-admin/assets/js/lib/data-table/jszip.min.js') }}"></script>
<script src="{{ asset('gatewaynet-admin/assets/js/lib/data-table/vfs_fonts.js') }}"></script>
<script src="{{ asset('gatewaynet-admin/assets/js/lib/data-table/buttons.html5.min.js') }}"></script>
<script src="{{ asset('gatewaynet-admin/assets/js/lib/data-table/buttons.print.min.js') }}"></script>
<script src="{{ asset('gatewaynet-admin/assets/js/lib/data-table/buttons.colVis.min.js') }}"></script>
<script src="{{ asset('gatewaynet-admin/assets/js/lib/chosen/chosen.jquery.min.js') }}"></script>
<script src="{{ asset('gatewaynet-admin/assets/js/init/datatables-init.js') }}"></script>

{{-- Search Select --}}
<script>
    jQuery(document).ready(function() {
        jQuery(".standardSelect").chosen({
            disable_search_threshold: 10,
            no_results_text: "Oops, nothing found!",
            width: "100%"
        });
    });
</script>

<script type="text/javascript">
    $(document).ready(function() {
      $('#bootstrap-data-table-export').DataTable();
  } );
</script>




