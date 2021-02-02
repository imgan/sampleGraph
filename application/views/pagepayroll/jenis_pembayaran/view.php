<!-- Button -->
<div class="row">
	<div class="col-xs-1">
		<button href="#my-modal" role="button" data-toggle="modal" class="btn btn-xs btn-info">
			<a class="ace-icon fa fa-plus bigger-120"></a> Tambah Data
		</button>
	</div>
	<br>
	<br>
</div>

<!-- Modal Input Data -->
<div id="my-modal" class="modal fade" tabindex="-1">
	<div class="modal-dialog">
		<div class="modal-content">
			<div class="modal-header">
				<button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
				<h3 class="smaller lighter blue no-margin">Form Input <?= $page_name; ?></h3>
			</div>
			<div class="modal-body">
				<div class="row">
					<div class="col-xs-12">
						<!-- PAGE CONTENT BEGINS -->
						<form class="form-horizontal" role="form" id="formTambah">
                        <div class="form-group">
                            <label class="col-sm-3 control-label no-padding-right" for="form-field-1"> Jenis Pembayaran </label>
                            <div class="col-sm-9">
                                <input type="text" id="nama_pembayaran" required name="nama_pembayaran" placeholder="Nama" class="form-control" />
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

<!-- Modal Edit Biodata -->
<div id="modalEdit" class="modal fade" tabindex="-1">
	<div class="modal-dialog">
		<div class="modal-content">
			<div class="modal-header">
				<button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
				<h3 class="smaller lighter blue no-margin">Form Edit Data Guru</h3>
			</div>
			<div class="modal-body">
				<div class="row">
					<div class="col-xs-12">
						<!-- PAGE CONTENT BEGINS -->
						<form class="form-horizontal" role="form" id="formEdit">
							<div class="form-group">
								<label class="col-sm-3 control-label no-padding-right" for="form-field-1"> Jenis Pembayaran </label>
								<div class="col-sm-9">
									<input type="hidden" id="e_id" required name="e_id" class="form-control" />
									<input type="text" id="e_nama_pembayaran" required name="e_nama_pembayaran" placeholder="Nama" class="form-control" />
								</div>
							</div>
							

					</div>
				</div>
			</div>
			<div class="modal-footer">
				<button type="submit" id="btn_update" class="btn btn-sm btn-success pull-left">
					<i class="ace-icon fa fa-save"></i>
					Update
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
			Semua Data Jenis Pembayaran
		</div>
	</div>
</div>
<div class="table-responsive">
	<table id="datatable_tabletools" class="display">
		<thead>
			<tr>
				<th class="col-xs-1">No</th>
				<th>Nama</th>
				<th class="text-center">Action</th>
			</tr>
		</thead>
		<tbody id="show_data">
		</tbody>
	</table>
</div>
<script type="text/javascript">
	$(document).ready(function() {
		show_data();
		$('#datatable_tabletools').DataTable();
	});


    if ($("#formEdit").length > 0) {
        $("#formEdit").validate({
            errorClass: "my-error-class",
            validClass: "my-valid-class",
            submitHandler: function(form) {
                formdata = new FormData(form);
                $.ajax({
                    type: "POST",
                    url: "<?php echo base_url('modulpayroll/jenis_pembayaran/update') ?>",
                    data: formdata,
                    processData: false,
                    contentType: false,
                    cache: false,
                    async: false,
                    success: function(data) {
                        console.log(data);
                        $('#modalEdit').modal('hide');
                        if (data == 1 || data == true) {
                            document.getElementById("formEdit").reset();
                            swalInputSuccess();
                            show_data();
                        } else if (data == 401) {
                            document.getElementById("formEdit").reset();
                            swalIdDouble();
                        } else {
                            document.getElementById("formEdit").reset();
                            swalInputFailed();
                        }
                    }
                });
                return false;
            }
        })
	}
	
	if ($("#formTambah").length > 0) {
        $("#formTambah").validate({
            errorClass: "my-error-class",
            validClass: "my-valid-class",
            rules: {
                nama: {
                    required: true
                }
            },
            messages: {
            },
            submitHandler: function(form) {
                $('#btn_simpan').html('Sending..');
                $.ajax({
                    url: "<?php echo base_url('modulpayroll/jenis_pembayaran/simpan') ?>",
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
                            $('#my-modal').modal('hide');
                        } else {
                            swalIdDouble('Tidak ada Tahun akademik , Harap input dahulu');
                        }
                    }
                });
            }
        })
    }
	//function show all Data
	function show_data() {
		$.ajax({
			type: 'POST',
			url: '<?php echo site_url('modulpayroll/jenis_pembayaran/tampil') ?>',
			async: true,
			dataType: 'json',
			success: function(data) {
				var html = '';
				var i = 0;
				var no = 1;
				for (i = 0; i < data.length; i++) {
					html += '<tr>' +
						'<td class="text-center">' + no + '</td>' +
						'<td>' + data[i].nama_pembayaran + '</td>' +
						'<td class="text-center">' +
						'<button  href="#my-modal-edit" class="btn btn-xs btn-info item_edit" title="Edit" data-id="' + data[i].id + '">' +
						'<i class="ace-icon fa fa-book bigger-120"> Edit </i>' +
                        '</button> ' + 
                        '<button  href="#my-modal-edit" class="btn btn-xs btn-danger item_hapus" title="Hapus" data-id="' + data[i].id + '">' +
						'<i class="ace-icon fa fa-trash-o bigger-120"> Hapus</i>' +
						'</button> ' + 
						'</td>' +
						'</tr>';
					no++;
				}
				$("#datatable_tabletools").dataTable().fnDestroy();
				var a = $('#show_data').html(html);
				if (a) {
					$('#datatable_tabletools').dataTable({
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
    
    $('#show_data').on('click', '.item_edit', function() {
		var id = $(this).data('id');
		$('#modalEdit').modal('show');
		$.ajax({
			type: "POST",
			url: "<?php echo base_url('modulpayroll/jenis_pembayaran/tampil_byid') ?>",
			async: true,
			dataType: "JSON",
			data: {
				id: id,
			},
			success: function(data) {
				$('#e_id').val(data[0].id);
				$('#e_nama_pembayaran').val(data[0].nama_pembayaran);
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
					url: "<?php echo base_url('modulpayroll/jenis_pembayaran/delete') ?>",
					async: true,
					dataType: "JSON",
					data: {
						id: id,
					},
					success: function(data) {
						show_data();
						swalDeleteSuccess();
					}
				});
			}
		})
	})
</script>