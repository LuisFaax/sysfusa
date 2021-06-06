<script src="{{ asset('app-assets/vendors/js/vendors.min.js') }}"></script>
<script src="{{ asset('app-assets/vendors/js/extensions/toastr.min.js') }}"></script>
<!-- BEGIN Vendor JS-->

<!-- BEGIN: Page Vendor JS-->
<script src="{{ asset('app-assets/vendors/js/ui/jquery.sticky.js') }}"></script>
<script src="{{ asset('app-assets/vendors/js/charts/jquery.sparkline.min.js') }}"></script>
<script src="{{ asset('app-assets/vendors/js/charts/chart.min.js') }}"></script>
<script src="{{ asset('app-assets/vendors/js/charts/raphael-min.js') }}"></script>
<script src="{{ asset('app-assets/vendors/js/charts/morris.min.js') }}"></script>
<script src="{{ asset('app-assets/vendors/js/charts/jvector/jquery-jvectormap-2.0.3.min.js') }}"></script>
<script src="{{ asset('app-assets/vendors/js/charts/jvector/jquery-jvectormap-world-mill.js') }}"></script>
<script src="{{ asset('app-assets/data/jvector/visitor-data.js') }}"></script>
<!-- END: Page Vendor JS-->

<!-- BEGIN: Theme JS-->
<script src="{{ asset('app-assets/js/core/app-menu.js') }}"></script>
<script src="{{ asset('app-assets/js/core/app.js') }}"></script>

<script src="{{ asset('app-assets/vendors/js/extensions/sweetalert2.all.min.js') }}"></script>
<script src="{{ asset('app-assets/js/scripts/extensions/ex-component-sweet-alerts.js') }}"></script>


<!-- END: Theme JS-->

<!-- BEGIN: Page JS-->
<script>
	function alerts(type = 'success', message)
		{
			if(type == 'success')  toastr.success('', message.toUpperCase())
			if(type == 'error')  toastr.error('', message.toUpperCase())
			if(type == 'warning')  toastr.warning('', message.toUpperCase())

		}
	
	document.addEventListener('DOMContentLoaded', function () {  
		//'#theModal').modal({backdrop: 'static', keyboard: false}) 

/*
$("#basicModal,#largeModal,#smallModal").modal({
show:false,
backdrop:'static'
});
*/

/*
$('#myModal').on('shown.bs.modal', function () {
  $('#myInput').trigger('focus')
})
*/

// alerts
		


	})

</script>


@livewireScripts