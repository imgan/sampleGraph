<script src="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.10/js/select2.min.js"></script>
<link href="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.10/css/select2.min.css" rel="stylesheet" />
<div class="row">
	<form class="form-horizontal" method="POST" role="form" id="formSearch">
		<div class="col-xs-3">
			Guru
			<div class="form-group">
				<select class="form-control" name="guru" id="guru">
					<option value="0">-- Pilih Guru --</option>
					<?php foreach ($myguru as $value) { ?>
						<option value=<?= $value['IdGuru'] ?>><?= $value['IdGuru'] . $value['GuruNama'] ?></option>
					<?php } ?>
				</select>
			</div>
		</div>
		<div class="col-xs-1">
		</div>
		<div class="col-xs-3">
			Mata Pelajaran
			<div class="form-group">
				<span>
					<select class="form-control" name="mapel" id="mapel">
						<option value="0">-- Pilih MataPelajaran --</option>
					</select>
				</span>

			</div>
		</div>
		<div class="col-xs-1">
			<br>
			<button type="submit" id="btn_search" class="btn btn-sm btn-success pull-left">
				<a class="ace-icon fa fa-success bigger-120"></a>Tampilkan
			</button>
		</div>
		<br>
		<br>
	</form>
</div>
<br>
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
				<th>Nama Guru</th>
				<th>Mengajar</th>
				<th>Tanggal</th>
				<th>Mulai (WIB)</th>
				<th>Inval</th>
				<th>Ket. Tidak Hadir</th>
				<th>Ganti Hari</th>
				<th>Tambahan</th>
			</tr>
		</thead>
		<tbody id="show_data">
		</tbody>
	</table>
</div>
<script>
	   if ($("#formSearch").length > 0) {
        $("#formSearch").validate({
            submitHandler: function(form) {
                $('#btn_search').html('Searching..');
                $.ajax({
                    type: 'POST',
                    url: '<?php echo site_url('kehadiranguru/search') ?>',
                    data: $('#formSearch').serialize(),
                    async: true,
                    dataType: 'json',
                    success: function(data) {
                        $('#btn_search').html('<i class="ace-icon fa fa-search"></i>' +
                            'Periksa');
                        var html = '';
                        var i = 0;
                        var no = 1;
                        for (i = 0; i < data.length; i++) {
                            html += '<tr>' +
                                '<td class="text-center">' + no + '</td>' +
                                '<td>' + data[i].GuruNama + '</td>' +
                                '<td>' + data[i].nama + '</td>' +
                                '<td>' + data[i].TGLHADIR + '</td>' +
                                '<td>' + data[i].MSKHADIR + '</td>' +
                                '<td>' + data[i].STINVAL + '</td>' +
                                '<td class="text-center">' + data[i].KETTDKHDR + '</td>' +
                                '<td class="text-center">' + data[i].TAMBAHAN + '</td>' +
                                '<td class="text-center">' +
                                '<button  href="#my-modal-edit" class="btn btn-xs btn-info item_edit" title="Edit" data-id="' + data[i].ID + '">' +
                                '<i class="ace-icon fa fa-pencil bigger-120"></i>' +
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
        })
    }

	if ($("#formImport").length > 0) {
		$("#formImport").validate({
			errorClass: "my-error-class",
			validClass: "my-valid-class",
			rules: {
				nama: {
					required: true,
				},
				telepon: {
					required: true,
					digits: true,
					maxlength: 14,
					minlength: 10,
				},
				alamat: {
					required: true,
					minlength: 10,
				},
				email: {
					required: true,
					email: true,
				},
			},
			messages: {
				nama: {
					required: "Nama Guru harus diisi!"
				},
				telepon: {
					required: "Telepon harus diisi!"
				},
				alamat: {
					required: "Harap Masukan alamat dengan benar!"
				},
			},
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
				id: {
					required: true
					// ,maxlength: 50
				},

				nama: {
					required: true
					// , digits:true,
					// minlength: 10,
					// maxlength:12,
				},
				// email: {
				//         required: true,
				//         maxlength: 50,
				//         email: true,
				//     },    
			},
			messages: {

				id: {
					required: "Kode jabatan harus diisi!"
					// ,maxlength: "Your last name maxlength should be 50 characters long."
				},
				nama: {
					required: "Nama jabatan harus diisi!"
					// ,minlength: "The contact number should be 10 digits",
					// digits: "Please enter only numbers",
					// maxlength: "The contact number should be 12 digits",
				},
				// email: {
				//     required: "Please enter valid email",
				//     email: "Please enter valid email",
				//     maxlength: "The email name should less than or equal to 50 characters",
				//   },

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
						// setTimeout(function(){
						// // $('#res_message').hide();
						// // $('#msg_div').hide();
						// },3000);
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
				e_id: {
					required: true
				},
				e_nama: {
					required: true
				},
			},
			messages: {

				e_nama: {
					required: "Nama jabatan harus diisi!"
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
		$('select').select2({
			width: '100%',
			placeholder: "Masukan Matapelajaran",
			allowClear: true
		});
		show_data();
		$('#table_id').DataTable();
	});

	$("#guru").change(function() {
		var guru = $('#guru').val();
		$.ajax({
			type: "POST",
			url: '<?php echo site_url('kehadiranguru/showmapel') ?>',
			data: {
				guru: guru
			}
		}).done(function(data) {
			// console.log(data);
			$("#mapel").html(data);
		});
	});
	//function show all Data
	function show_data() {
		$.ajax({
			type: 'POST',
			url: '<?php echo site_url('kehadiranguru/tampil') ?>',
			async: true,
			dataType: 'json',
			success: function(data) {
				var html = '';
				var i = 0;
				var no = 1;
				for (i = 0; i < data.length; i++) {
					html += '<tr>' +
						'<td class="text-center">' + no + '</td>' +
						'<td>' + data[i].GuruNama + '</td>' +
						'<td>' + data[i].nama + '</td>' +
						'<td>' + data[i].TGLHADIR + '</td>' +
						'<td>' + data[i].MSKHADIR + '</td>' +
						'<td>' + data[i].STINVAL + '</td>' +
						'<td>' + data[i].TAMBAHAN + '</td>' +
						'<td></td>' +
						'<td class="text-center">' +
						'<button  href="#my-modal-edit" class="btn btn-xs btn-info item_edit" title="Edit" data-id="' + data[i].ID + '">' +
						'<i class="ace-icon fa fa-pencil bigger-120"></i>' +
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
