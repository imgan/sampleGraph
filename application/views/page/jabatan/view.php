<div class="row">
	<div class="col-xs-1">
		<button id="item-tambah" role="button" data-toggle="modal" class="btn btn-xs btn-info">
			<a class="ace-icon fa fa-plus bigger-120"></a>Tambah Data
		</button>
	</div>
	<div class="col-xs-1">
		<button href="#my-modal2" role="button" data-toggle="modal" class="btn btn-xs btn-success">
			<a class="ace-icon fa fa-upload bigger-120"></a> Import Data
		</button>
	</div>
	<br>
	<br>
</div>
<div id="my-modal2" class="modal fade" tabindex="-1">
	<div class="modal-dialog">
		<div class="modal-content">
			<div class="modal-header">
				<button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
				<h3 class="smaller lighter blue no-margin">Form Import Data Jabatan</h3>
			</div>
			<div class="modal-body">
				<div class="row">
					<div class="col-xs-12">
						<!-- PAGE CONTENT BEGINS -->
						<form class="form-horizontal" role="form" enctype="multipart/form-data" id="formImport">
							<div class="form-group">
								<label class="col-sm-3 control-label no-padding-right" for="form-field-1"> Import Excel FIle </label>
								<div class="col-sm-6">
									<input type="file" id="file" required name="file" class="form-control" />
								</div>
							</div>

							<div class="form-group">
								<label class="col-sm-3 control-label no-padding-right" for="form-field-1"> Sample </label>
								<div class="col-sm-9">
									<a href="<?php echo base_url() . 'assets/jabatan.xlsx' ?>" class="col-sm-3" for="form-field-1"> Download Sample Format</a>
								</div>
							</div>
					</div>
				</div>
			</div>
			<div class="modal-footer">
				<button type="submit" id="btn_import" class="btn btn-sm btn-success pull-left">
					<i class="ace-icon fa fa-save"></i>
					Simpan
				</button>
				<button class="btn btn-sm btn-danger pull-left" data-dismiss="modal">
					<i class="ace-icon fa fa-times"></i>
					Batal
				</button>
			</div>
			</form>
		</div><!-- /.modal-content -->
	</div><!-- /.modal-dialog -->
</div>
<div id="modalTambah" class="modal fade" tabindex="-1">
	<div class="modal-dialog">
		<div class="modal-content">
			<div class="modal-header">
				<button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
				<h3 class="smaller lighter blue no-margin">Form Input Data <?= $page_name; ?></h3>
			</div>
			<form class="form-horizontal" role="form" id="formTambah">
				<div class="modal-body">
					<div class="row">
						<div class="col-xs-12">
							<!-- PAGE CONTENT BEGINS -->

							<div class="form-group">
								<label class="col-sm-3 control-label no-padding-right" for="form-field-1"> Nama Jabatan </label>
								<div class="col-sm-6">
									<input type="text" id="nama" name="nama" placeholder="Nama Jabatan" class="form-control" />
								</div>
							</div>
							<div class="form-group">
								<label class="col-sm-3 control-label no-padding-right" for="form-field-1"> Keterangan </label>
								<div class="col-sm-6">
									<input type="text" id="keterangan" name="keterangan" placeholder="Keterangan" class="form-control" />
								</div>
							</div>

							<div class="form-group">
								<label class="col-sm-3 control-label no-padding-right" for="form-field-1"> Jumlah Jam Kerja </label>
								<div class="col-sm-6">
									<input type="number" id="jam" name="jam" placeholder="Jumlah Jam Kerja Karyawan" class="form-control" />
								</div>
							</div>
						</div>
					</div>
				</div>
				<div class="modal-footer">
					<button type="submit" id="btn_simpan" class="btn btn-sm btn-success pull-left">
						<i class="ace-icon fa fa-save"></i>
						Simpan
					</button>
					<button class="btn btn-sm btn-danger pull-left" data-dismiss="modal">
						<i class="ace-icon fa fa-times"></i>
						Batal
					</button>
				</div>
			</form>
		</div><!-- /.modal-content -->
	</div><!-- /.modal-dialog -->
</div>

<div id="modalEdit" class="modal fade" tabindex="-1">
	<div class="modal-dialog">
		<div class="modal-content">
			<div class="modal-header">
				<button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
				<h3 class="smaller lighter blue no-margin">Form Edit Data <?= $page_name; ?></h3>
			</div>
			<form class="form-horizontal" role="form" id="formEdit">
				<div class="modal-body">
					<div class="row">
						<div class="col-xs-12">
							<!-- PAGE CONTENT BEGINS -->


							<div class="form-group">
								<label class="col-sm-3 control-label no-padding-right" for="form-field-1"> Nama Jabatan </label>
								<div class="col-sm-6">
									<input type="hidden" id="e_id" name="e_id" />
									<input type="text" id="e_nama" name="e_nama" placeholder="Nama Jabatan" class="form-control" />
								</div>
							</div>

							<div class="form-group">
								<label class="col-sm-3 control-label no-padding-right" for="form-field-1"> Keterangan </label>
								<div class="col-sm-9">
									<input type="text" id="e_keterangan" name="e_keterangan" placeholder="Keterangan Jabatan" class="form-control" />
								</div>
							</div>
							<div class="form-group">
								<label class="col-sm-3 control-label no-padding-right" for="form-field-1"> Jumlah Jam Kerja </label>
								<div class="col-sm-6">
									<input type="number" id="e_jam" name="e_jam" placeholder="Jumlah Jam Kerja Karyawan" class="form-control" />
								</div>
							</div>
						</div>
					</div>
				</div>
				<div class="modal-footer">
					<button type="submit" id="btn_edit" class="btn btn-sm btn-success pull-left">
						<i class="ace-icon fa fa-save"></i>
						Ubah
					</button>
					<button class="btn btn-sm btn-danger pull-left" data-dismiss="modal">
						<i class="ace-icon fa fa-times"></i>
						Batal
					</button>
				</div>
			</form>
		</div><!-- /.modal-content -->
	</div><!-- /.modal-dialog -->
</div>

<div class="row">
	<div class="col-xs-12">
		<div class="table-header">
			Semua Data <?= $page_name; ?>
		</div>
	</div>
</div>
<br>
<div class="table-responsive">
	<table id="table_id" class="display">
		<thead>
			<tr>
				<th class="col-md-1">No</th>
				<th>ID Jabatan</th>
				<th>Nama Jabatan</th>
				<th>Keterangan</th>
				<th>Jumlah Jam Kerja</th>
				<th>Action</th>
			</tr>
		</thead>
		<tbody id="show_data">
		</tbody>
	</table>
</div>
<script>
	if ($("#formImport").length > 0) {
		$("#formImport").validate({
			errorClass: "my-error-class",
			validClass: "my-valid-class",
			submitHandler: function(form) {
				formdata = new FormData(form);
				$.ajax({
					type: "POST",
					url: "<?php echo base_url('jabatan/import') ?>",
					data: formdata,
					processData: false,
					contentType: false,
					cache: false,
					async: false,
					success: function(data) {
						console.log(data);
						$('#my-modal2').modal('hide');
						if (data == 1 || data == true) {
							document.getElementById("formImport").reset();
							swalInputSuccess();
							show_data();
						} else if (data == 401) {
							document.getElementById("formImport").reset();
							swalIdDouble();
						} else {
							document.getElementById("formImport").reset();
							swalInputFailed();
						}
					}
				});
				return false;
			}
		});
	}
	if ($("#formTambah").length > 0) {
		$("#formTambah").validate({
			errorClass: "my-error-class",
			validClass: "my-valid-class",
			rules: {
				nama: {
					required: true
				},
				keterangan: {
					required: true
				},
				jam: {
				        required: true,
				},    
			},
			messages: {
				nama: {
					required: "Nama jabatan harus diisi!"
				},
				keterangan: {
					required: "Keterangan jabatan harus diisi!"
				},
				jam: {
				    required: "Jam tidak boleh kosong",
				},

			},
			submitHandler: function(form) {
				$('#btn_simpan').html('Sending..');
				$.ajax({
					url: "<?php echo base_url('jabatan/simpan') ?>",
					type: "POST",
					data: $('#formTambah').serialize(),
					dataType: "json",
					success: function(response) {
						$('#btn_simpan').html('<i class="ace-icon fa fa-save"></i>' +
							'Simpan');
						if (response == true) {
							document.getElementById("formTambah").reset();
							swalInputSuccess();
							show_data();
							$('#modalTambah').modal('hide');
						} else if (response == 401) {
							swalIdDouble('Nama Jabatan Sudah digunakan!');
						} else {
							swalInputFailed();
						}
					}
				});
			}
		})
	}

	if ($("#formEdit").length > 0) {
		$("#formEdit").validate({
			errorClass: "my-error-class",
			validClass: "my-valid-class",
			rules: {
				e_nama: {
					required: true
				},
				e_keterangan: {
					required: true
				},
				e_jam: {
					required: true
				}
			},
			messages: {

				e_nama: {
					required: "Nama jabatan harus diisi!"
				},
				e_keterangan: {
					required: "Keterangan jabatan harus diisi!"
				},
				e_jam: {
					required: "Jumlah Jam harus diisi!"
				},

			},
			submitHandler: function(form) {
				$('#btn_edit').html('Sending..');
				$.ajax({
					url: "<?php echo base_url('jabatan/update') ?>",
					type: "POST",
					data: $('#formEdit').serialize(),
					dataType: "json",
					success: function(response) {
						$('#btn_edit').html('<i class="ace-icon fa fa-save"></i>' +
							'Ubah');
						if (response == true) {
							document.getElementById("formEdit").reset();
							swalEditSuccess();
							show_data();
							$('#modalEdit').modal('hide');
						} else if (response == 401) {
							swalIdDouble('Nama Jabatan Sudah digunakan!');
						} else {
							swalEditFailed();
						}
					}
				});
			}
		})
	}
</script>
<script type="text/javascript">
	$(document).ready(function() {
		show_data();
		$('#table_id').DataTable();
	});

	//function show all Data
	function show_data() {
		$.ajax({
			type: 'POST',
			url: '<?php echo site_url('jabatan/tampil') ?>',
			async: true,
			dataType: 'json',
			success: function(data) {
				var html = '';
				var i = 0;
				var no = 1;
				for (i = 0; i < data.length; i++) {
					html += '<tr>' +
						'<td class="text-center">' + no + '</td>' +
						'<td>' + data[i].ID + '</td>' +
						'<td>' + data[i].NAMAJABATAN + '</td>' +
						'<td>' + data[i].KET + '</td>' +
						'<td>' + data[i].jumlah_jam + '</td>' +
						'<td class="text-center">' +
						'<button  href="#my-modal-edit" class="btn btn-xs btn-info item_edit" title="Edit" data-id="' + data[i].ID + '">' +
						'<i class="ace-icon fa fa-pencil bigger-120"></i>' +
						'</button> &nbsp' +
						'<button class="btn btn-xs btn-danger item_hapus" title="Delete" data-id="' + data[i].ID + '">' +
						'<i class="ace-icon fa fa-trash-o bigger-120"></i>' +
						'</button>' +
						'</td>' +
						'</tr>';
					no++;
				}
				$("#table_id").dataTable().fnDestroy();
				var a = $('#show_data').html(html);
				//                    $('#mydata').dataTable();
				if (a) {
					$('#table_id').dataTable({
						"bPaginate": true,
						"bLengthChange": false,
						"bFilter": true,
						"bInfo": false,
						"bAutoWidth": false
					});
				}
				/* END TABLETOOLS */
			}

		});
	}

	//show modal tambah
	$('#item-tambah').on('click', function() {
		$('#modalTambah').modal('show');
	});

	//get data for update record
	$('#show_data').on('click', '.item_edit', function() {
		document.getElementById("formEdit").reset();
		var id = $(this).data('id');
		$('#modalEdit').modal('show');
		$.ajax({
			type: "POST",
			url: "<?php echo base_url('jabatan/tampil_byid') ?>",
			async: true,
			dataType: "JSON",
			data: {
				id: id,
			},
			success: function(data) {
				$('#e_id').val(data[0].ID);
				$('#e_jam').val(data[0].jumlah_jam);
				$('#e_nama').val(data[0].NAMAJABATAN);
				$('#e_keterangan').val(data[0].KET);

			}
		});
	});

	$('#show_data').on('click', '.item_hapus', function() {
		var id = $(this).data('id');
		Swal.fire({
			title: 'Apakah anda yakin?',
			text: "Anda tidak akan dapat mengembalikan ini!",
			icon: 'warning',
			showCancelButton: true,
			confirmButtonColor: '#3085d6',
			cancelButtonColor: '#d33',
			confirmButtonText: 'Ya, Hapus!',
			cancelButtonText: 'Batal'
		}).then((result) => {
			if (result.value) {
				$.ajax({
					type: "POST",
					url: "<?php echo base_url('jabatan/delete') ?>",
					async: true,
					dataType: "JSON",
					data: {
						id: id,
					},
					success: function(data) {
						show_data();
						Swal.fire(
							'Terhapus!',
							'Data sudah dihapus.',
							'success'
						)
					}
				});
			}
		})
	})
</script>
