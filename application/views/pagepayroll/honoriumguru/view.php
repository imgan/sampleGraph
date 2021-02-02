<!-- Button -->
<script src="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.10/js/select2.min.js"></script>
<link href="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.10/css/select2.min.css" rel="stylesheet" />
<div class="row">
	<div class="col-xs-1">
		<button href="#my-modal" role="button" data-toggle="modal" class="btn btn-xs btn-warning">
			<a class="ace-icon fa fa-plus bigger-120"></a> Generate
		</button>
	</div>
	<br>
	<br>
</div>

<!-- Modal Import Data -->
<div id="my-modal" class="modal fade" tabindex="-1">
	<div class="modal-dialog">
		<div class="modal-content">
			<div class="modal-header">
				<button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
				<h3 class="smaller lighter blue no-margin">Form Tambah <?=$page_name?></h3>
			</div>
			<div class="modal-body">
				<div class="row">
					<div class="col-xs-12">
						<!-- PAGE CONTENT BEGINS -->
						<form class="form-horizontal" role="form" id="formTambah">
                            <!-- <div class="form-group">
								<label class="col-sm-3 control-label no-padding-right" for="form-field-1"> Guru </label>
								<div class="col-sm-9">
									<select class="form-control" name="id_guru" id="id_guru">
										<option value="">-- Pilih Guru --</option>
										<?php foreach ($myguru as $value) { ?>
											<option value=<?= $value['IdGuru'] ?>><?= $value['GuruNama'] ?></option>
										<?php } ?>
									</select>
								</div>
                            </div> -->

                            <!-- <div class="form-group">
								<label class="col-sm-3 control-label no-padding-right" for="form-field-1"> Jumlah Jam</label>
								<div class="col-sm-9">
								<input type="number" id="jmljam" required name="jmljam" placeholder="Masukkan Jumlah Jam" class="form-control" />
								</div>
                            </div> -->

							<!-- <div class="form-group">
								<label class="col-sm-3 control-label no-padding-right" for="form-field-1"> Tarif Per Jam</label>
								<div class="col-sm-9">
								<input type="text" id="tarif_per_jam" required name="tarif_per_jam" placeholder="Rp. 10.000" class="form-control" />
                                <input type="hidden" id="tarif_per_jam_v" required name="tarif_per_jam_v"/>
								<script language="JavaScript">
										var rupiah4 = document.getElementById('tarif_per_jam');
										rupiah4.addEventListener('keyup', function(e) {
											rup4 = this.value.replace(/\D/g, '');
											$('#tarif_per_jam_v').val(rup4);
											rupiah4.value = formatRupiah4(this.value, 'Rp. ');
										});

										function formatRupiah4(angka, prefix) {
											var number_string = angka.replace(/[^,\d]/g, '').toString(),
												split = number_string.split(','),
												sisa = split[0].length % 3,
												rupiah4 = split[0].substr(0, sisa),
												ribuan4 = split[0].substr(sisa).match(/\d{3}/gi);

											// tambahkan titik jika yang di input sudah menjadi angka ribuan
											if (ribuan4) {
												separator = sisa ? '.' : '';
												rupiah4 += separator + ribuan4.join('.');
											}

											rupiah4 = split[1] != undefined ? rupiah4 + ',' + split[1] : rupiah4;
											return prefix == undefined ? rupiah4 : (rupiah4 ? 'Rp. ' + rupiah4 : '');
										}
									</script>
								</div>
                            </div> -->

							<div class="form-group">
								<label class="col-sm-3 control-label no-padding-right" for="form-field-1">Tanggal Awal </label>
								<div class="col-sm-9">
								<input type="date" id="tglawal" required name="tglawal" placeholder="" class="form-control" />
								</div>
                            </div>

                            <div class="form-group">
								<label class="col-sm-3 control-label no-padding-right" for="form-field-1">Tanggal Akhir </label>
								<div class="col-sm-9">
								<input type="date" id="tglakhir" required name="tglakhir" placeholder="" class="form-control" />
								</div>
                            </div>
<!--                             
							<div class="form-group">
								<label class="col-sm-3 control-label no-padding-right" for="form-field-1">Tambahan Jam</label>
								<div class="col-sm-9">
								<input type="text" id="tambahanjam" required name="tambahanjam" placeholder="Rp. 10.000" class="form-control" />
                                <input type="hidden" id="tambahanjam_v" required name="tambahanjam_v"/>
								<script language="JavaScript">
										var rupiah12 = document.getElementById('tambahanjam');
										rupiah12.addEventListener('keyup', function(e) {
											rup8 = this.value.replace(/\D/g, '');
											$('#tambahanjam_v').val(rup8);
											rupiah12.value = formatRupiah9(this.value, 'Rp. ');
										});

										function formatRupiah9(angka, prefix) {
											var number_string = angka.replace(/[^,\d]/g, '').toString(),
												split = number_string.split(','),
												sisa = split[0].length % 3,
												rupiah12 = split[0].substr(0, sisa),
												ribuan12 = split[0].substr(sisa).match(/\d{3}/gi);

											// tambahkan titik jika yang di input sudah menjadi angka ribuan
											if (ribuan12) {
												separator = sisa ? '.' : '';
												rupiah12 += separator + ribuan12.join('.');
											}

											rupiah12 = split[1] != undefined ? rupiah12 + ',' + split[1] : rupiah12;
											return prefix == undefined ? rupiah12 : (rupiah12 ? 'Rp. ' + rupiah12 : '');
										}
									</script>
								</div>
							</div> -->
							
							<!-- <div class="form-group">
								<label class="col-sm-3 control-label no-padding-right" for="form-field-1">Tambahan Hadir</label>
								<div class="col-sm-9">
								<input type="text" id="tambahanhadir" required name="tambahanhadir" placeholder="Rp. 10.000" class="form-control" />
                                <input type="hidden" id="tambahanhadir_v" required name="tambahanhadir_v"/>
								<script language="JavaScript">
										var rupiah13 = document.getElementById('tambahanhadir');
										rupiah13.addEventListener('keyup', function(e) {
											rup8 = this.value.replace(/\D/g, '');
											$('#tambahanhadir_v').val(rup8);
											rupiah13.value = formatRupiah9(this.value, 'Rp. ');
										});

										function formatRupiah9(angka, prefix) {
											var number_string = angka.replace(/[^,\d]/g, '').toString(),
												split = number_string.split(','),
												sisa = split[0].length % 3,
												rupiah13 = split[0].substr(0, sisa),
												ribuan13 = split[0].substr(sisa).match(/\d{3}/gi);

											// tambahkan titik jika yang di input sudah menjadi angka ribuan
											if (ribuan13) {
												separator = sisa ? '.' : '';
												rupiah13 += separator + ribuan13.join('.');
											}

											rupiah13 = split[1] != undefined ? rupiah13 + ',' + split[1] : rupiah13;
											return prefix == undefined ? rupiah13 : (rupiah13 ? 'Rp. ' + rupiah13 : '');
										}
									</script>
								</div>
							</div> -->
					</div>
				</div>
			</div>
			<div class="modal-footer">
				<button type="submit" id="btn_update" class="btn btn-sm btn-success pull-left">
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
				<h3 class="smaller lighter blue no-margin">Form Edit <?=$page_name ?></h3>
			</div>
			<div class="modal-body">
				<div class="row">
					<div class="col-xs-12">
						<!-- PAGE CONTENT BEGINS -->
						<form class="form-horizontal" role="form" id="formEdit">
                            <div class="form-group">
								<label class="col-sm-3 control-label no-padding-right" for="form-field-1"> Karyawan </label>
								<input type="hidden" id="e_id_potong"  required name="e_id_potong"  />
								<div class="col-sm-9">
									<select  disabled class="form-control" name="e_id_karyawan" id="e_id_karyawan">
										<option value="">-- Pilih Karyawan --</option>
										<?php foreach ($mykaryawan as $value) { ?>
											<option value=<?= $value['nip'] ?>><?= $value['nama'] ?></option>
										<?php } ?>
									</select>
								</div>
                            </div>
                            <div class="form-group">
								<label class="col-sm-3 control-label no-padding-right" for="form-field-1"> Infaq Masjid</label>
								<div class="col-sm-9">
								<input type="text" id="e_infaq_masjid" required name="e_infaq_masjid" placeholder="Tarif Potongan" class="form-control" />
                                <input type="hidden" id="e_infaq_masjid_v" required name="e_infaq_masjid_v"/>
								<script language="JavaScript">
										var rupiah31 = document.getElementById('e_infaq_masjid');
										rupiah31.addEventListener('keyup', function(e) {
											rup31 = this.value.replace(/\D/g, '');
											$('#e_infaq_masjid_v').val(rup31);
											rupiah31.value = formatRupiah31(this.value, 'Rp. ');
										});

										function formatRupiah31(angka, prefix) {
											var number_string = angka.replace(/[^,\d]/g, '').toString(),
												split = number_string.split(','),
												sisa = split[0].length % 3,
												rupiah31 = split[0].substr(0, sisa),
												ribuan31 = split[0].substr(sisa).match(/\d{3}/gi);

											// tambahkan titik jika yang di input sudah menjadi angka ribuan
											if (ribuan31) {
												separator = sisa ? '.' : '';
												rupiah31 += separator + ribuan31.join('.');
											}

											rupiah31 = split[1] != undefined ? rupiah31 + ',' + split[1] : rupiah31;
											return prefix == undefined ? rupiah31 : (rupiah31 ? 'Rp. ' + rupiah31 : '');
										}
									</script>
								</div>
                            </div>

							<div class="form-group">
								<label class="col-sm-3 control-label no-padding-right" for="form-field-1"> Anggota Koperasi</label>
								<div class="col-sm-9">
								<input type="text" id="e_anggota_koperasi" required name="e_anggota_koperasi" placeholder="Rp. 10.000" class="form-control" />
                                <input type="hidden" id="e_anggota_koperasi_v" required name="e_anggota_koperasi_v"/>
								<script language="JavaScript">
										var rupiah41 = document.getElementById('e_anggota_koperasi');
										rupiah41.addEventListener('keyup', function(e) {
											rup41 = this.value.replace(/\D/g, '');
											$('#e_anggota_koperasi_v').val(rup41);
											rupiah41.value = formatRupiah41(this.value, 'Rp. ');
										});

										function formatRupiah41(angka, prefix) {
											var number_string = angka.replace(/[^,\d]/g, '').toString(),
												split = number_string.split(','),
												sisa = split[0].length % 3,
												rupiah41 = split[0].substr(0, sisa),
												ribuan41 = split[0].substr(sisa).match(/\d{3}/gi);

											// tambahkan titik jika yang di input sudah menjadi angka ribuan
											if (ribuan41) {
												separator = sisa ? '.' : '';
												rupiah41 += separator + ribuan41.join('.');
											}

											rupiah41 = split[1] != undefined ? rupiah4 + ',' + split[1] : rupiah41;
											return prefix == undefined ? rupiah41 : (rupiah41 ? 'Rp. ' + rupiah41 : '');
										}
									</script>
								</div>
                            </div>

							<div class="form-group">
								<label class="col-sm-3 control-label no-padding-right" for="form-field-1"> Kas / Bon</label>
								<div class="col-sm-9">
								<input type="text" id="e_kas_bon" required name="e_kas_bon" placeholder="Rp. 10.000" class="form-control" />
                                <input type="hidden" id="e_kas_bon_v" required name="e_kas_bon_v"/>
								<script language="JavaScript">
										var rupiah51 = document.getElementById('e_kas_bon');
										rupiah51.addEventListener('keyup', function(e) {
											rup51 = this.value.replace(/\D/g, '');
											$('#e_kas_bon_v').val(rup51);
											rupiah51.value = formatRupiah51(this.value, 'Rp. ');
										});

										function formatRupiah51(angka, prefix) {
											var number_string = angka.replace(/[^,\d]/g, '').toString(),
												split = number_string.split(','),
												sisa = split[0].length % 3,
												rupiah51 = split[0].substr(0, sisa),
												ribuan51 = split[0].substr(sisa).match(/\d{3}/gi);

											// tambahkan titik jika yang di input sudah menjadi angka ribuan
											if (ribuan51) {
												separator = sisa ? '.' : '';
												rupiah51 += separator + ribuan51.join('.');
											}

											rupiah51 = split[1] != undefined ? rupiah51 + ',' + split[1] : rupiah51;
											return prefix == undefined ? rupiah51 : (rupiah51 ? 'Rp. ' + rupiah51 : '');
										}
									</script>
								</div>
                            </div>
                            

							<div class="form-group">
								<label class="col-sm-3 control-label no-padding-right" for="form-field-1"> Ijin / Telat</label>
								<div class="col-sm-9">
								<input type="text" id="e_ijin_telat" required name="e_ijin_telat" placeholder="Rp. 10.000" class="form-control" />
                                <input type="hidden" id="e_ijin_telat_v" required name="e_ijin_telat_v"/>
								<script language="JavaScript">
										var rupiah61 = document.getElementById('e_ijin_telat');
										rupiah61.addEventListener('keyup', function(e) {
											rup61 = this.value.replace(/\D/g, '');
											$('#e_ijin_telat_v').val(rup61);
											rupiah61.value = formatRupiah51(this.value, 'Rp. ');
										});

										function formatRupiah51(angka, prefix) {
											var number_string = angka.replace(/[^,\d]/g, '').toString(),
												split = number_string.split(','),
												sisa = split[0].length % 3,
												rupiah61 = split[0].substr(0, sisa),
												ribuan61 = split[0].substr(sisa).match(/\d{3}/gi);

											// tambahkan titik jika yang di input sudah menjadi angka ribuan
											if (ribuan61) {
												separator = sisa ? '.' : '';
												rupiah61 += separator + ribuan61.join('.');
											}

											rupiah61 = split[1] != undefined ? rupiah61 + ',' + split[1] : rupiah61;
											return prefix == undefined ? rupiah61 : (rupiah61 ? 'Rp. ' + rupiah61 : '');
										}
									</script>
								</div>
                            </div>

							<div class="form-group">
								<label class="col-sm-3 control-label no-padding-right" for="form-field-1"> BMT</label>
								<div class="col-sm-9">
								<input type="text" id="e_bmt" required name="e_bmt" placeholder="Rp. 10.000" class="form-control" />
                                <input type="hidden" id="e_bmt_v" required name="e_bmt_v"/>
								<script language="JavaScript">
										var rupiah71 = document.getElementById('e_bmt');
										rupiah71.addEventListener('keyup', function(e) {
											rup71 = this.value.replace(/\D/g, '');
											$('#e_bmt_v').val(rup71);
											rupiah71.value = formatRupiah71(this.value, 'Rp. ');
										});

										function formatRupiah71(angka, prefix) {
											var number_string = angka.replace(/[^,\d]/g, '').toString(),
												split = number_string.split(','),
												sisa = split[0].length % 3,
												rupiah71 = split[0].substr(0, sisa),
												ribuan71 = split[0].substr(sisa).match(/\d{3}/gi);

											// tambahkan titik jika yang di input sudah menjadi angka ribuan
											if (ribuan71) {
												separator = sisa ? '.' : '';
												rupiah71 += separator + ribuan71.join('.');
											}

											rupiah71 = split[1] != undefined ? rupiah71 + ',' + split[1] : rupiah71;
											return prefix == undefined ? rupiah71 : (rupiah71 ? 'Rp. ' + rupiah71 : '');
										}
									</script>
								</div>
                            </div>

							<div class="form-group">
								<label class="col-sm-3 control-label no-padding-right" for="form-field-1"> Koperasi</label>
								<div class="col-sm-9">
								<input type="text" id="e_koperasi" required name="e_koperasi" placeholder="Rp. 10.000" class="form-control" />
                                <input type="hidden" id="e_koperasi_v" required name="e_koperasi_v"/>
								<script language="JavaScript">
										var rupiah81 = document.getElementById('e_koperasi');
										rupiah81.addEventListener('keyup', function(e) {
											rup81 = this.value.replace(/\D/g, '');
											$('#e_koperasi_v').val(rup81);
											rupiah81.value = formatRupiah8(this.value, 'Rp. ');
										});

										function formatRupiah81(angka, prefix) {
											var number_string = angka.replace(/[^,\d]/g, '').toString(),
												split = number_string.split(','),
												sisa = split[0].length % 3,
												rupiah81 = split[0].substr(0, sisa),
												ribuan81 = split[0].substr(sisa).match(/\d{3}/gi);

											// tambahkan titik jika yang di input sudah menjadi angka ribuan
											if (ribuan81) {
												separator = sisa ? '.' : '';
												rupiah81 += separator + ribuan81.join('.');
											}

											rupiah81 = split[1] != undefined ? rupiah81 + ',' + split[1] : rupiah81;
											return prefix == undefined ? rupiah81 : (rupiah81 ? 'Rp. ' + rupiah81 : '');
										}
									</script>
								</div>
							</div>
							
							<div class="form-group">
								<label class="col-sm-3 control-label no-padding-right" for="form-field-1">Inval</label>
								<div class="col-sm-9">
								<input type="text" id="e_inval" required name="e_inval" placeholder="Rp. 10.000" class="form-control" />
                                <input type="hidden" id="e_inval_v" required name="e_inval_v"/>
								<script language="JavaScript">
										var rupiah91 = document.getElementById('e_inval');
										rupiah91.addEventListener('keyup', function(e) {
											rup81 = this.value.replace(/\D/g, '');
											$('#e_inval_v').val(rup81);
											rupiah91.value = formatRupiah9(this.value, 'Rp. ');
										});

										function formatRupiah9(angka, prefix) {
											var number_string = angka.replace(/[^,\d]/g, '').toString(),
												split = number_string.split(','),
												sisa = split[0].length % 3,
												rupiah91 = split[0].substr(0, sisa),
												ribuan91 = split[0].substr(sisa).match(/\d{3}/gi);

											// tambahkan titik jika yang di input sudah menjadi angka ribuan
											if (ribuan91) {
												separator = sisa ? '.' : '';
												rupiah91 += separator + ribuan91.join('.');
											}

											rupiah91 = split[1] != undefined ? rupiah91 + ',' + split[1] : rupiah91;
											return prefix == undefined ? rupiah91 : (rupiah91 ? 'Rp. ' + rupiah91 : '');
										}
									</script>
								</div>
							</div>
							
							<div class="form-group">
								<label class="col-sm-3 control-label no-padding-right" for="form-field-1">Toko Al Hamra</label>
								<div class="col-sm-9">
								<input type="text" id="e_toko" required name="e_toko" placeholder="Rp. 10.000" class="form-control" />
                                <input type="hidden" id="e_toko_v" required name="e_toko_v"/>
								<script language="JavaScript">
										var rupiah101 = document.getElementById('e_toko');
										rupiah101.addEventListener('keyup', function(e) {
											rup8 = this.value.replace(/\D/g, '');
											$('#e_toko_v').val(rup8);
											rupiah101.value = formatRupiah101(this.value, 'Rp. ');
										});

										function formatRupiah101(angka, prefix) {
											var number_string = angka.replace(/[^,\d]/g, '').toString(),
												split = number_string.split(','),
												sisa = split[0].length % 3,
												rupiah101 = split[0].substr(0, sisa),
												ribuan101 = split[0].substr(sisa).match(/\d{3}/gi);

											// tambahkan titik jika yang di input sudah menjadi angka ribuan
											if (ribuan101) {
												separator = sisa ? '.' : '';
												rupiah101 += separator + ribuan101.join('.');
											}

											rupiah101 = split[1] != undefined ? rupiah101 + ',' + split[1] : rupiah101;
											return prefix == undefined ? rupiah101 : (rupiah101 ? 'Rp. ' + rupiah101 : '');
										}
									</script>
								</div>
							</div>
							
							<div class="form-group">
								<label class="col-sm-3 control-label no-padding-right" for="form-field-1">Lain - Lain</label>
								<div class="col-sm-9">
								<input type="text" id="e_lain" required name="e_lain" placeholder="Rp. 10.000" class="form-control" />
                                <input type="hidden" id="e_lain_v" required name="e_lain_v"/>
								<script language="JavaScript">
										var rupiah111 = document.getElementById('e_lain');
										rupiah111.addEventListener('keyup', function(e) {
											rup8 = this.value.replace(/\D/g, '');
											$('#e_lain_v').val(rup8);
											rupiah111.value = formatRupiah111(this.value, 'Rp. ');
										});

										function formatRupiah111(angka, prefix) {
											var number_string = angka.replace(/[^,\d]/g, '').toString(),
												split = number_string.split(','),
												sisa = split[0].length % 3,
												rupiah111 = split[0].substr(0, sisa),
												ribuan111 = split[0].substr(sisa).match(/\d{3}/gi);

											// tambahkan titik jika yang di input sudah menjadi angka ribuan
											if (ribuan111) {
												separator = sisa ? '.' : '';
												rupiah111 += separator + ribuan111.join('.');
											}

											rupiah111 = split[1] != undefined ? rupiah111 + ',' + split[1] : rupiah111;
											return prefix == undefined ? rupiah111 : (rupiah111 ? 'Rp. ' + rupiah111 : '');
										}
									</script>
								</div>
							</div>
							
							<div class="form-group">
								<label class="col-sm-3 control-label no-padding-right" for="form-field-1">PPH 21</label>
								<div class="col-sm-9">
								<input type="text" id="e_pph21" required name="e_pph21" placeholder="Rp. 10.000" class="form-control" />
                                <input type="hidden" id="e_pph21_v" required name="e_pph21_v"/>
								<script language="JavaScript">
										var rupiah121 = document.getElementById('e_pph21');
										rupiah121.addEventListener('keyup', function(e) {
											rup8 = this.value.replace(/\D/g, '');
											$('#e_pph21_v').val(rup8);
											rupiah121.value = formatRupiah121(this.value, 'Rp. ');
										});

										function formatRupiah121(angka, prefix) {
											var number_string = angka.replace(/[^,\d]/g, '').toString(),
												split = number_string.split(','),
												sisa = split[0].length % 3,
												rupiah121 = split[0].substr(0, sisa),
												ribuan121 = split[0].substr(sisa).match(/\d{3}/gi);

											// tambahkan titik jika yang di input sudah menjadi angka ribuan
											if (ribuan121) {
												separator = sisa ? '.' : '';
												rupiah121 += separator + ribuan121.join('.');
											}

											rupiah121 = split[1] != undefined ? rupiah121 + ',' + split[1] : rupiah121;
											return prefix == undefined ? rupiah121 : (rupiah121 ? 'Rp. ' + rupiah121 : '');
										}
									</script>
								</div>
							</div>
							
							<div class="form-group">
								<label class="col-sm-3 control-label no-padding-right" for="form-field-1">Tawun</label>
								<div class="col-sm-9">
								<input type="text" id="e_tawun" required name="e_tawun" placeholder="Rp. 10.000" class="form-control" />
                                <input type="hidden" id="e_tawun_v" required name="e_tawun_v"/>
								<script language="JavaScript">
										var rupiah131 = document.getElementById('e_tawun');
										rupiah131.addEventListener('keyup', function(e) {
											rup8 = this.value.replace(/\D/g, '');
											$('#e_tawun_v').val(rup8);
											rupiah131.value = formatRupiah131(this.value, 'Rp. ');
										});

										function formatRupiah131(angka, prefix) {
											var number_string = angka.replace(/[^,\d]/g, '').toString(),
												split = number_string.split(','),
												sisa = split[0].length % 3,
												rupiah131 = split[0].substr(0, sisa),
												ribuan131 = split[0].substr(sisa).match(/\d{3}/gi);

											// tambahkan titik jika yang di input sudah menjadi angka ribuan
											if (ribuan131) {
												separator = sisa ? '.' : '';
												rupiah131 += separator + ribuan131.join('.');
											}

											rupiah131 = split[1] != undefined ? rupiah131 + ',' + split[1] : rupiah131;
											return prefix == undefined ? rupiah131 : (rupiah131 ? 'Rp. ' + rupiah131 : '');
										}
									</script>
								</div>
							</div>
							
							<div class="form-group">
								<label class="col-sm-3 control-label no-padding-right" for="form-field-1">BPJS</label>
								<div class="col-sm-9">
								<input type="text" id="e_bpjs" required name="e_bpjs" placeholder="Rp. 10.000" class="form-control" />
                                <input type="hidden" id="e_bpjs_v" required name="e_bpjs_v"/>
								<script language="JavaScript">
										var rupiah141 = document.getElementById('e_bpjs');
										rupiah141.addEventListener('keyup', function(e) {
											rup8 = this.value.replace(/\D/g, '');
											$('#e_bpjs_v').val(rup8);
											rupiah141.value = formatRupiah141(this.value, 'Rp. ');
										});

										function formatRupiah141(angka, prefix) {
											var number_string = angka.replace(/[^,\d]/g, '').toString(),
												split = number_string.split(','),
												sisa = split[0].length % 3,
												rupiah141 = split[0].substr(0, sisa),
												ribuan141 = split[0].substr(sisa).match(/\d{3}/gi);

											// tambahkan titik jika yang di input sudah menjadi angka ribuan
											if (ribuan141) {
												separator = sisa ? '.' : '';
												rupiah141 += separator + ribuan141.join('.');
											}

											rupiah141 = split[1] != undefined ? rupiah141 + ',' + split[1] : rupiah141;
											return prefix == undefined ? rupiah141 : (rupiah141 ? 'Rp. ' + rupiah141 : '');
										}
									</script>
								</div>
							</div>
							
                            <div class="form-group">
								<label class="col-sm-3 control-label no-padding-right" for="form-field-1"> Periode </label>
								<div class="col-sm-9">
									<input type="date" id="e_periode" required name="e_periode" placeholder="Rp. 10.000" class="form-control" />
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
			Semua Data Potongan guru
		</div>
	</div>
</div>
<div class="table-responsive">
	<table id="datatable_tabletools" class="display">
		<thead>
			<tr>
				<th>No</th>
				<th>Nama Guru</th>
				<th>Jml Jam X Tarif </th>
				<th>Inval </th>
                <th>Total</th>
				<th>Periode</th>
				<th>Action</th>
			</tr>
		</thead>
		<tbody id="show_data">
		</tbody>
	</table>
</div>
<script type="text/javascript">

	if ($("#formTambah").length > 0) {
		$("#formTambah").validate({
			errorClass: "my-error-class",
			validClass: "my-valid-class",
			submitHandler: function(form) {
				$.ajax({
					type: "POST",
					url: "<?php echo base_url('modulpayroll/honoriumguru/simpan') ?>",
					dataType: "JSON",
					data: $('#formTambah').serialize(),
					success: function(data) {
						$('#my-modal').modal('hide');
						if (data == 1) {
							document.getElementById("formTambah").reset();
							swalInputSuccess();
							show_data();
						} else if (data == 401) {
							document.getElementById("formTambah").reset();
							swalInputFailedCustom("Master Tarif Guru Belum Tedaftar !!");
						} else {
							document.getElementById("formTambah").reset();
							swalInputFailed();
						}
					}
				});
				return false;
			}
		});
	}

	$(document).ready(function() {
		show_data();
		$('#datatable_tabletools').DataTable();
	});

	//function show all Data
	function show_data() {
		$.ajax({
			type: 'POST',
			url: '<?php echo site_url('modulpayroll/honoriumguru/tampil') ?>',
			async: true,
			dataType: 'json',
			success: function(data) {
				var html = '';
				var i = 0;
				var no = 1;
				for (i = 0; i < data.length; i++) {
					html += '<tr>' +
						'<td class="text-center">' + no + '</td>' +
						'<td class="text-center">' + data[i].GuruNama + '</td>' +
						'<td>' + data[i].JMLJAM + ' X ' + data[i].tarif +  '</td>' +
						'<td>' + data[i].inval + '</td>' +
						'<td>' + data[i].tarif2 + '</td>' +
						'<td>' + data[i].TGLAWAL + ' - '+ data[i].TGLAKHIR  + '</td>' +
						'<td>' +
                        '<button  href="#my-modal-edit" class="btn btn-xs btn-danger item_hapus" title="Hapus" data-id="' + data[i].IDRD + '">' +
						'<i class="ace-icon fa fa-trash-o bigger-120"> Hapus</i>' +
						'</button> ' + 
						'</td>' +
						'</tr>';
					no++;
				}
				$("#datatable_tabletools").dataTable().fnDestroy();
				var a = $('#show_data').html(html);
				//                    $('#mydata').dataTable();
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
			url: "<?php echo base_url('modulpayroll/master_potongan/tampil_byid') ?>",
			async: true,
			dataType: "JSON",
			data: {
				id: id,
			},
			success: function(data) {
				$('#e_id_potong').val(data[0].id_potong);
				$('#e_id_karyawan').val(data[0].id_karyawan);
				$('#e_infaq_masjid').val(data[0].infaq_masjid);
				$('#e_anggota_koperasi').val(data[0].anggota_koperasi);
				$('#e_anggota_koperasi_v').val(data[0].anggota_koperasi);
				$('#e_infaq_masjid_v').val(data[0].infaq_masjid);
				$('#e_kas_bon').val(data[0].kas_bon);
				$('#e_kas_bon_v').val(data[0].kas_bon);
				$('#e_ijin_telat').val(data[0].ijin_telat);
				$('#e_ijin_telat_v').val(data[0].ijin_telat);
				$('#e_bmt').val(data[0].bmt);
				$('#e_bmt_v').val(data[0].bmt);
				$('#e_koperasi').val(data[0].koperasi);
				$('#e_koperasi_v').val(data[0].koperasi);
				$('#e_inval').val(data[0].inval);
				$('#e_inval_v').val(data[0].inval);
				$('#e_toko').val(data[0].toko);
				$('#e_toko_v').val(data[0].toko);
				$('#e_lain').val(data[0].lain);
				$('#e_lain_v').val(data[0].lain);
				$('#e_pph21').val(data[0].pph21);
				$('#e_pph21_v').val(data[0].pph21);
				$('#e_periode').val(data[0].periode);
				$('#e_tawun').val(data[0].tawun);
				$('#e_tawun_v').val(data[0].tawun);
				$('#e_bpjs').val(data[0].bpjs);
				$('#e_bpjs_v').val(data[0].bpjs);
			}
		});
    });

	if ($("#formEdit").length > 0) {
        $("#formEdit").validate({
            errorClass: "my-error-class",
            validClass: "my-valid-class",
            submitHandler: function(form) {
                $('#btn_edit').html('Sending..');
                $.ajax({
                    url: "<?php echo base_url('modulpayroll/master_potongan/update') ?>",
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
                            swalIdDouble('Kode Tarif Sudah Terdaftar');
                        } else {
                            swalEditFailed();
                        }
                    }
                });
            }
        })
	}
  
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
					url: "<?php echo base_url('modulpayroll/honoriumguru/delete') ?>",
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