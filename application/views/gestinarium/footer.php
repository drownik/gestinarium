<?php
defined('BASEPATH') OR exit('No direct script access allowed');
$is_logged = $this->session->userdata('is_logged');
?>
<!-- Page Footer-->
	<?php if ($is_logged) { ?>
	      <footer class="footer-classic bg-gray-8">
	        <div class="container">
	          <div class="divider"></div>
	          <div class="footer-classic__aside">
	            <div class="row row-20">
	              <div class="col-md-12 text-md-left">
	                <!-- Rights-->
	                <p class="rights"><span>Clinica Veterinaria Paguera</span><span>&nbsp;&copy;&nbsp;</span><span class="copyright-year"></span>. All Rights Reserved. Design by <a href="https://www.templatemonster.com">TemplateMonster</a></p>
	              </div>
	            </div>
	          </div>
	        </div>
	      </footer>
	    </div>
	    <!-- Global Mailform Output-->
	    <div class="snackbars" id="form-output-global"></div>
    <?php } ?>
	</body>
    <!-- Javascript-->
    <script src="<?php echo base_url('assets/js/') ?>core.min.js"></script>
	<script src="<?php echo base_url('assets/js/') ?>script.js"></script>
	<script src="<?php echo base_url('assets/js/') ?>datatables.js"></script>
	<script type="text/javascript">
		$(document).ready( function () {
		    $('#fichas').dataTable();
		} );
	</script>
</html>