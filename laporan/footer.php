
    <div class="modal fade" id="ICTRSHD" tabindex="-1" role="dialog">
        <div class="modal-dialog modal-sm" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h4 class="modal-title" id="smallModalLabel">Bagian IT RS. KARYA HUSADA</h4>
                </div>
                <div class="modal-body">
                    Ditetapkan sebagai Bagian IT RS. Karya Husada - Cikampek.
                    <ul style="list-style:none;margin-left:0;padding-left:0;"><br>
			<li><b>Direktur: <br>dr. Pundi (dr.Pundi Ferianto, MARS)</b></li><br>
                        <li><b>Kepala Bagian: <br>Aan (Apriansyah)</b></li><br>
                        <li>Anggota :
                            <ul style="list-style:none;margin-left:0;padding-left:0;">
                                <li>- Kurnia (Kurnia Sukendar)</li>
                                <li>- Dikdik (Dikdik Permadi)</li>
                                <li>- Yangyang (Yangyang Soemantri)</li>
                            </ul>
                        </li>
                    </ul>
                </div>                <div class="modal-footer">
                    <button type="button" class="btn btn-link waves-effect" data-dismiss="modal">TUTUP</button>
                </div>
            </div>
        </div>
    </div>

    <!-- Jquery Core Js -->
    <script src="<?php echo URL; ?>/plugins/jquery/jquery.min.js"></script>

    <!-- Bootstrap Core Js -->
    <script src="<?php echo URL; ?>/plugins/bootstrap/js/bootstrap.js"></script>

    <!-- Select Plugin Js -->
    <script src="<?php echo URL; ?>/plugins/bootstrap-select/js/bootstrap-select.js"></script>

    <!-- Slimscroll Plugin Js -->
    <script src="<?php echo URL; ?>/plugins/jquery-slimscroll/jquery.slimscroll.js"></script>

    <!-- Waves Effect Plugin Js -->
    <script src="<?php echo URL; ?>/plugins/node-waves/waves.js"></script>

    <!-- Jquery CountTo Plugin Js -->
    <script src="<?php echo URL; ?>/plugins/jquery-countto/jquery.countTo.js"></script>

    <!-- Jquery DataTable Plugin Js -->
    <script src="<?php echo URL; ?>/plugins/jquery-datatable/jquery.dataTables.js"></script>
    <script src="<?php echo URL; ?>/plugins/jquery-datatable/skin/bootstrap/js/dataTables.bootstrap.js"></script>
    <script src="<?php echo URL; ?>/plugins/jquery-datatable/extensions/responsive/js/dataTables.responsive.min.js"></script>
    <script src="<?php echo URL; ?>/plugins/jquery-datatable/extensions/export/dataTables.buttons.min.js"></script>
    <script src="<?php echo URL; ?>/plugins/jquery-datatable/extensions/export/buttons.flash.min.js"></script>
    <script src="<?php echo URL; ?>/plugins/jquery-datatable/extensions/export/jszip.min.js"></script>
    <script src="<?php echo URL; ?>/plugins/jquery-datatable/extensions/export/pdfmake.min.js"></script>
    <script src="<?php echo URL; ?>/plugins/jquery-datatable/extensions/export/vfs_fonts.js"></script>
    <script src="<?php echo URL; ?>/plugins/jquery-datatable/extensions/export/buttons.html5.min.js"></script>
    <script src="<?php echo URL; ?>/plugins/jquery-datatable/extensions/export/buttons.print.min.js"></script>

    <!-- Chart Plugins Js -->
    <script src="<?php echo URL; ?>/plugins/chartjs/Chart.bundle.js"></script>

    <!-- Sparkline Chart Plugin Js -->
    <script src="<?php echo URL; ?>/plugins/jquery-sparkline/jquery.sparkline.js"></script>

    <!-- Jquery CountTo Plugin Js -->
    <script src="<?php echo URL; ?>/plugins/jquery-countto/jquery.countTo.js"></script>

    <!-- Autosize Plugin Js -->
    <script src="<?php echo URL; ?>/plugins/autosize/autosize.js"></script>

    <!-- Moment Plugin Js -->
    <script src="<?php echo URL; ?>/plugins/momentjs/moment.js"></script>

    <!-- Bootstrap Material Datetime Picker Plugin Js -->
    <script src="<?php echo URL; ?>/plugins/bootstrap-material-datetimepicker/js/bootstrap-material-datetimepicker.js"></script>

    <!-- Jquery-UI Js -->
    <script src="<?php echo URL; ?>/js/jquery-ui.min.js"></script>

    <!-- Select2 Js -->
    <script src="<?php echo URL; ?>/js/select2.min.js"></script>

         <!-- Light Gallery Plugin Js -->
    <script src="<?php echo URL; ?>/plugins/light-gallery/js/lightgallery-all.js"></script>
	<script>
	
	$(function () {
    	$('#aniimated-thumbnials').lightGallery({
        	thumbnail: true,
        	selector: 'a'
    	});
	});

	</script>


    <!-- Custom Js -->
    <script src="<?php echo URL; ?>/js/admin.js"></script>
	  <script>

      var url = window.location.pathname; //sets the variable "url" to the pathname of the current window
      var activePage = url.substring(url.lastIndexOf('/') + 1); //sets the variable "activePage" as the substring after the last "/" in the "url" variable
      if($('.menu li a > .active').length > 0){
        $('.active').removeClass('active');//remove current active element if there's
      }
      $('.menu li a').each(function () { //looks in each link item within the primary-nav list
        var linkPage = this.href.substring(this.href.lastIndexOf('/') + 1); //sets the variable "linkPage" as the substring of the url path in each &lt;a&gt;
        if (activePage == linkPage) { //compares the path of the current window to the path of the linked page in the nav item
          $(this).parents('li').addClass('active');
          $(this).parent().addClass('active'); //if the above is true, add the "active" class to the parent of the &lt;a&gt; which is the &lt;li&gt; in the nav list
        }
      });

	  </script>

    <script>
        $(document).ready(function() {
            $('.datepicker').bootstrapMaterialDatePicker({
                format: 'YYYY-MM-DD',
                clearButton: true,
                weekStart: 1,
                time: false
            });
        } );

        $('.count-to').countTo();

        var table = $('#datatable').DataTable( {
          	responsive: true,
          	stateSave: true
            });
    		var buttons = new $.fn.dataTable.Buttons(table, {
    			buttons: [
        			{ extend: 'copy', className: 'btn glyphicon glyphicon-duplicate' },
        			{ extend: 'csv', className: 'btn glyphicon glyphicon-save-file' },
        			{ extend: 'excel', className: 'btn glyphicon glyphicon-list-alt' },
        			{ extend: 'pdf', className: 'btn glyphicon glyphicon-file' },
        			{ extend: 'print', className: 'btn glyphicon glyphicon-print' }
    			]
    		}).container().appendTo($('#buttons'));

      $(function () {
    $('#aniimated-thumbnials').lightGallery({
        thumbnail: true,
        selector: 'a'
    });
});
      

	  </script>

    <script type="text/javascript">
    function readURL(input) {
        if (input.files && input.files[0]) {
            var reader = new FileReader();

            reader.onload = function (e) {
                $('#image_upload_preview').attr('src', e.target.result);
            }

            reader.readAsDataURL(input.files[0]);
        }
    }

    $("#inputFile").change(function () {
        readURL(this);
    });

    function upload_berkas(){
    document.getElementById("inputFile").click();
    }

      
    </script>

</body>

</html>
