<!-- basic scripts -->

<!--[if !IE]> -->

<!--[endif]-->

<script src="<?= base_url() ?>assets/template/js/jquery-1.11.3.min.js"></script>
<!-- <script src="<?= base_url() ?>assets/template/js/jquery-2.1.4.min.js"></script> -->
<script
  src="https://code.jquery.com/jquery-2.2.4.js"
  integrity="sha256-iT6Q9iMJYuQiMWNd9lDyBUStIq/8PuOW33aOqmvFpqI="
  crossorigin="anonymous"></script>
<!-- <script src="http://ajax.googleapis.com/ajax/libs/jquery/1.9.1/jquery.min.js" type="text/javascript"></script> -->

<script type="text/javascript">
	if ('ontouchstart' in document.documentElement) document.write("<script src='<?= base_url() ?>assets/template/js/jquery.mobile.custom.min.js'>" + "<" + "/script>");
</script>
<script src="<?= base_url() ?>assets/template/js/bootstrap.min.js"></script>

<!-- page specific plugin scripts -->

<!--[if lte IE 8]>
<script src="<?= base_url() ?>assets/template/js/excanvas.min.js"></script>
<![endif]-->
<script src="<?= base_url() ?>assets/template/js/jquery-ui.custom.min.js"></script>
<script src="<?= base_url() ?>assets/template/js/jquery.ui.touch-punch.min.js"></script>
<script src="<?= base_url() ?>assets/template/js/jquery.easypiechart.min.js"></script>
<script src="<?= base_url() ?>assets/template/js/jquery.sparkline.index.min.js"></script>
<script src="<?= base_url() ?>assets/template/js/jquery.flot.min.js"></script>
<script src="<?= base_url() ?>assets/template/js/jquery.flot.pie.min.js"></script>
<script src="<?= base_url() ?>assets/template/js/jquery.flot.resize.min.js"></script>
<!-- ace scripts -->
<script type="text/javascript" charset="utf8" src="https://cdn.datatables.net/1.10.20/js/jquery.dataTables.js"></script>
<script src="<?= base_url() ?>assets/template/js/ace-elements.min.js"></script>
<script src="<?= base_url() ?>assets/template/js/ace.min.js"></script>

<!-- Sweet alert2 -->
<script src="<?= base_url() ?>assets/template/sweetalert2/sweetalert2.all.min.js"></script>


<!-- Validate -->
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-validate/1.19.0/jquery.validate.js"></script>  
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-validate/1.19.0/additional-methods.min.js"></script>

<!-- Select2 -->
<!-- <script src="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.10/js/select2.min.js"></script> -->

<!-- <script type="text/javascript" src="<?= base_url() ?>assets/template/MDB-Free_4.19.0/node_modules/mdbootstrap/js/jquery.min.js"></script>
<script type="text/javascript" src="<?= base_url() ?>assets/template/MDB-Free_4.19.0/node_modules/mdbootstrap/js/popper.min.js"></script>
<script type="text/javascript" src="<?= base_url() ?>assets/template/MDB-Free_4.19.0/node_modules/mdbootstrap/js/bootstrap.min.js"></script>
<script type="text/javascript" src="<?= base_url() ?>assets/template/MDB-Free_4.19.0/node_modules/mdbootstrap/js/mdb.min.js"></script> -->
<!-- JQuery -->
<!-- <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script> -->
<!-- Bootstrap tooltips -->
<!-- <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/popper.js//1.14.4/umd/popper.min.js"></script> -->
<!-- Bootstrap core JavaScript -->
<!-- <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.5.0/js/bootstrap.min.js"></script> -->
<!-- MDB core JavaScript -->
<script type="text/javascript" src="<?= base_url() ?>assets/template/MDB-Free_4.19.0/cdn_js/mdb.min.js"></script>


<script type="text/javascript">
	function swalInputSuccess(){
		Swal.fire({
		  icon: 'success',
		  title: 'Sukses',
		  text: 'Tambah Data Berhasil',
		});
	}

	function swalGenerateSuccess(){
		Swal.fire({
		  icon: 'success',
		  title: 'Sukses',
		  text: 'Generate Berhasil',
		});
	}

	function swalInputFailed(){
		Swal.fire({
		  icon: 'error',
		  title: 'Gagal',
		  text: 'Tambah Data gagal!, Harap hubungi administrator',
		});
	}

	function swalInputFailedakd(){
		Swal.fire({
		  icon: 'error',
		  title: 'Gagal',
		  text: 'Tarif Berlaku pada Kode Pembayaran / TA belum terdaftar',
		});
	}

	function swalGenerateFailed(){
		Swal.fire({
		  icon: 'error',
		  title: 'Gagal',
		  text: 'Tidak Ada data yang digenerate',
		});
	}

	function swalDatanull(){
		Swal.fire({
		  icon: 'error',
		  title: 'Tidak Ditemukan',
		  text: 'Data Tidak Ditemukan!',
		});
	}

	function swalPotonganFailed(){
		Swal.fire({
		  icon: 'error',
		  title: 'Gagal',
		  text: 'Siswa tidak terdaftar di kelas tersebut',
		});
	}

	function swalEditSuccess(){
		Swal.fire({
		  icon: 'success',
		  title: 'Sukses',
		  text: 'Ubah Data Berhasil',
		});
	}

	function swalEditFailed(){
		Swal.fire({
		  icon: 'error',
		  title: 'Gagal',
		  text: 'Ubah Data gagal!, Harap hubungi administrator',
		});
	}

	function swalIdDouble(message){
		Swal.fire({
		  icon: 'error',
		  title: 'Data Duplicate',
		  text: message,
		});
	}

	function swalDeleteSuccess(){
		Swal.fire({
		  icon: 'success',
		  title: 'Sukses',
		  text: 'Hapus Data Berhasil',
		});
	}

	function swalImportFailed($message){
		Swal.fire({
		  icon: 'error',
		  title: 'Gagal. harap periksa data',
		  text: $message,
		});
	}


</script>

<!-- inline scripts related to this page -->
