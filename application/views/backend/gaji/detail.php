<div class="row d-print-none">
	<div class="col-md-12">
		<div class="card box-shadow-2">
			<?php
			if ($this->session->flashdata('alert') == 'tambah_gaji'):
				?>
				<div class="alert alert-success alert-dismissible animated fadeInDown" id="feedback" role="alert">
					<button type="button" class="close" data-dismiss="alert" aria-label="Close">
						<span aria-hidden="true">&times;</span>
					</button>
					Berhasil Gaji
				</div>
			<?php
			elseif ($this->session->flashdata('alert') == 'update_gaji'):
				?>
				<div class="alert alert-success alert-dismissible animated fadeInDown" id="feedback" role="alert">
					<button type="button" class="close" data-dismiss="alert" aria-label="Close">
						<span aria-hidden="true">&times;</span>
					</button>
					Data berhasil diupdate
				</div>
			<?php
			elseif ($this->session->flashdata('alert') == 'hapus_gaji'):
				?>
				<div class="alert alert-danger alert-dismissible animated fadeInDown" id="feedback" role="alert">
					<button type="button" class="close" data-dismiss="alert" aria-label="Close">
						<span aria-hidden="true">&times;</span>
					</button>
					Data berhasil dihapus
				</div>
			<?php
			endif;
			?>
			<div class="card-header">
				<h1 style="text-align: center">Detail Gaji <?=$karyawan['karyawan_nama']?></h1>
			</div>
			<div class="card-body">
				<table class="table table-bordered zero-configuration" style="width: 100%">
					<thead>
					<tr>
						<td style="width: 2%">No</td>
						<td>Nama Karyawan</td>
						<td>Jabatan</td>
						<td>Gaji Wali</td>
						<td>Gaji Perhari</td>
						<td>Bulan ke</td>
						<td>Status Bayar</td>
						<td style="text-align: center"><i class="ft-settings spinner"></i></td>
					</tr>
					</thead>
					<tbody>
					<?php
					$no = 1;
					foreach ($gaji as $key => $value):
						?>
						<tr>
							<td><?= $no ?></td>
							<td><?= $value['karyawan_nama'] ?></td>
							<td><?= $value['jabatan_nama'] ?></td>
							<td><?= $value['gawali'] ?></td>
							<td>Rp. <?= nominal($value['gaji_total']) ?></td>
							<td><?= $value['gaji_bulan_ke'] ?></td>
							<td>
								<?php
								if ($value['gaji_status'] == 'belum'):
									?>
									<div class="badge badge-warning"><i class="ft-x-circle"></i> Menunggu Verifikasi</div>
								<?php
								else:
									?>
									<div class="badge badge-success"><i class="ft-check-circle"></i> Sudah disetujui</div>
								<?php
								endif;
								?>
							</td>
							<td>
								<button
									class="btn btn-success btn-sm  btn-bg-gradient-x-purple-blue box-shadow-2 gaji-lihat"
									data-toggle="modal" data-target="#lihat" value="<?= $value['gaji_id'] ?>"
									title="Lihat selengkapnya"><i class="ft-eye"></i></button>
								<?php if ($this->session->userdata('session_hak_akses') == 'bendahara' || $this->session->userdata('session_hak_akses') == 'admin'|| $this->session->userdata('session_hak_akses') == 'kepsek'): ?>
									<?php
									if ($value['gaji_status'] == 'belum'):
										?>
										<button
											class="btn btn-success btn-sm  btn-bg-gradient-x-purple-blue box-shadow-2 gaji-slip"
											data-toggle="modal" data-target="#slip" value="<?= $value['gaji_id'] ?>"
											title="Lihat slip gaji"><i class="ft-printer"></i></button>
										<button
											class="btn btn-success btn-sm  btn-bg-gradient-x-purple-blue box-shadow-2 gaji-bayar"
											data-toggle="modal" data-target="#bayar" value="<?= $value['gaji_id'] ?>"
											title="ACC Kepala Sekolah"><i class="ft-check-square"></i></button>
										<button
											class="btn btn-success btn-sm  btn-bg-gradient-x-purple-blue box-shadow-2 gaji-bayar"
											data-toggle="modal" data-target="#bayar" value="<?= $value['gaji_id'] ?>"
											title="ACC Bendahara"><i class="ft-check-square"></i></button>
									<?php
									else:
										?>
										<button
											class="btn btn-success btn-sm  btn-bg-gradient-x-purple-blue box-shadow-2 gaji-slip"
											data-toggle="modal" data-target="#slip" value="<?= $value['gaji_id'] ?>"
											title="Sudah bayar"><i class="ft-printer"></i></button>
										<button
											class="btn btn-success btn-sm  btn-bg-gradient-x-purple-blue box-shadow-2 gaji-bayar"
											data-toggle="modal" data-target="#bayar" value="<?= $value['gaji_id'] ?>"
											title="ACC Kepala Sekolah" disabled><i class="ft-check-square"></i></button>
										<button
											class="btn btn-success btn-sm  btn-bg-gradient-x-purple-blue box-shadow-2 gaji-bayar"
											data-toggle="modal" data-target="#bayar" value="<?= $value['gaji_id'] ?>"
											title="ACC Bendahara" disabled><i class="ft-check-square"></i></button>
									<?php
									endif;
									?>
								<?php
								endif;
								?>
							</td>
						</tr>

						<?php
						$no++;
					endforeach;
					?>
					</tbody>
				</table>
			</div>
		</div>
	</div>
</div>

<!-- Modal lihat -->
<div class="modal fade text-left" id="lihat" tabindex="-1" role="dialog" aria-labelledby="myModalLabel35"
	 aria-hidden="true">
	<div class="modal-dialog" role="document">
		<div class="modal-content">
			<div class="modal-header">
				<h3 class="modal-title" id="myModalLabel35"> Lihat Data Gaji</h3>
				<button type="button" class="close" data-dismiss="modal" aria-label="Close">
					<span aria-hidden="true">&times;</span>
				</button>
			</div>
			<div class="modal-body">
				<fieldset class="form-group floating-label-form-group">
					<label for="gaji_lihat_nama">Nama Karyawan</label>
					<input type="text" class="form-control" name="nama" id="gaji_lihat_nama" placeholder="Nama Karyawan"
						   autocomplete="off" readonly>
				</fieldset>
				<fieldset class="form-group floating-label-form-group">
					<label for="gaji_lihat_jabatan">Jabatan</label>
					<input type="text" class="form-control" name="tempat_lahir" id="gaji_lihat_jabatan" value=""
						   placeholder="Tempat Lahir" autocomplete="off" readonly>
				</fieldset>
				<fieldset class="form-group floating-label-form-group">
					<label for="gaji_lihat_tg">Tanggal Bergabung</label>
					<div class='input-group'>
						<input type="date" class="form-control" id="gaji_lihat_tg" name="tanggal_gabung"
							   placeholder="Tanggal Bergabung" autocomplete="off" readonly>
						<div class="input-group-append">
										<span class="input-group-text">
											<span class="ft-calendar"></span>
										</span>
						</div>
					</div>
				</fieldset>
				<fieldset class="form-group floating-label-form-group">
					<label for="gaji_lihat_gaji">Gaji Perhari</label>
					<input type="text" class="form-control" id="gaji_lihat_gaji" name="nomor_hp"
						   placeholder="Nomor HP"
						   autocomplete="off" readonly>
				</fieldset>
				<fieldset class="form-group floating-label-form-group">
					<label for="gaji_lihat_total">Gaji Wali</label>
					<input type="text" class="form-control" value=""
						   placeholder="Nomor rekening boleh kosong"
						   autocomplete="off" readonly>
				</fieldset>
				<fieldset class="form-group floating-label-form-group">
					<label for="trasi">Transportasi</label>
					<input type="text" class="form-control" value=""
						   placeholder="Nomor rekening boleh kosong"
						   autocomplete="off" readonly>
				</fieldset>
				<fieldset class="form-group floating-label-form-group">
					<label for="mejar">Mengajar</label>
					<input type="text" class="form-control" value=""
						   placeholder="Nomor rekening boleh kosong"
						   autocomplete="off" readonly>
				</fieldset>
				<fieldset class="form-group floating-label-form-group">
					<label for="piket">Piket</label>
					<input type="text" class="form-control" value=""
						   placeholder="Nomor rekening boleh kosong"
						   autocomplete="off" readonly>
				</fieldset>
				<fieldset class="form-group floating-label-form-group">
					<label for="prog">IT Program</label>
					<input type="text" class="form-control" value=""
						   placeholder="Nomor rekening boleh kosong"
						   autocomplete="off" readonly>
				</fieldset>
				<fieldset class="form-group floating-label-form-group">
					<label for="gaji_lihat_total">Total Gaji</label>
					<input type="text" class="form-control" value="<?= nominal($value['gawali'] + $value['trasi'] + $value['mejar'] + $value['piket'] + $value['prog'] + $value['gaji_total']) ?>"
						   placeholder="Nomor rekening boleh kosong"
						   autocomplete="off" readonly>
				</fieldset>
				<fieldset class="form-group floating-label-form-group">
					<label for="gaji_lihat_bulan">Bulan ke</label>
					<input type="number" class="form-control" id="gaji_lihat_bulan" name="nomor_rekening"
						   placeholder="gaji bulan ke "
						   autocomplete="off" readonly>
				</fieldset>
			</div>
			<div class="modal-footer">
				<input type="reset" class="btn btn-secondary btn-bg-gradient-x-red-pink" data-dismiss="modal"
					   value="Tutup">
			</div>
		</div>
	</div>
</div>


<!-- Modal slip -->
<style type="text/css">
	.tengah {
		text-align: center;
	}

	.kotak {
		border: 1px solid rgba(0, 0, 0, 0.1);
		padding: 5px;
	}

	@media print {
		body * {
			visibility: hidden;
		}

		.kotak, .kotak * {
			visibility: visible;
		}

		.kotak {
			position: absolute;
			width: 100%;
			margin-top: 300px;
			transform: scale(2);
			left: 0;
			top: 0;
		}
	}
</style>

<div class="modal fade text-left" id="slip" tabindex="-1" role="dialog" aria-labelledby="myModalLabel35"
	 aria-hidden="true">
	<div class="modal-dialog" role="document">
		<div class="modal-content">
			<div class="modal-header d-print-none">
				<h3 class="modal-title" id="myModalLabel35"> Lihat Slip Gaji</h3>
				<button type="button" class="close" data-dismiss="modal" aria-label="Close">
					<span aria-hidden="true">&times;</span>
				</button>
			</div>
			<div class="modal-body ">
				<div class="kotak d-print-block">
					<div class="row">
						<div class="col-12">
							<div class="tengah"><h3><b>SMP IT FATWAH</b></h3></div>
							<div class="tengah">Curah Kalah, Jangkar, Situbondo</div>
							<hr>
							<div class="tengah"><b><u>SLIP GAJI GURU/KARYAWAN</u></b></div>
							<br>
						</div>
					</div>
					<div class="row">
						<div class="col-6">
							<table>
								<tr>
									<td>Nama</td>
									<td>:</td>
									<td><span class="slip-nama"></span></td>
								</tr>
								<tr>
									<td>Jabatan</td>
									<td>:</td>
									<td><span id="slip-jabatan"></span></td>
								</tr>
								<tr>
									<td>Nomor HP</td>
									<td>:</td>
									<td><span id="slip-nohp"></span></td>
								</tr>
							</table>
						</div>
						<div class="col-6">
							<table>
								<tr>
									<td>Bulan</td>
									<td>:</td>
									<td><span class="slip-bulan"></span></td>
								</tr>
								<tr>
									<td>Gaji Status</td>
									<td>:</td>
									<td><?= $value['gaji_status'] ?></span></td>
								</tr>
							</table>
						</div>
					</div>
					<br>
					<div class="row">
						<div class="col-6">
							<p><b><u>Penghasilan</u></b></p>
							<table style="width: 100%">
								<tr>
									<td>Gaji Perhari</td>
									<td>:</td>
									<td>Rp. <span id="slip-gaji"></span></td>
								</tr>
								<tr>
									<td>Gaji Wali</td>
									<td>:</td>
									<td>Rp. <?= nominal($value['gawali'] * $value['absen_rekap']) ?></span></td>
								</tr>
								<tr>
									<td>Transportasi</td>
									<td>:</td>
									<td>Rp. <?= nominal($value['trasi'] * $value['absen_rekap']) ?></span></td>
								</tr>
								<tr>
									<td>Mengajar</td>
									<td>:</td>
									<td>Rp. <?= nominal($value['mejar'] * $value['absen_rekap']) ?></span></td>
								</tr>
								<tr>
									<td>Piket</td>
									<td>:</td>
									<td>Rp. <?= nominal($value['piket'] * $value['absen_rekap']) ?></span></td>
								</tr>
								<tr>
									<td>IT Program</td>
									<td>:</td>
									<td>Rp. <?= nominal($value['prog'] * $value['absen_rekap']) ?></span></td>
								</tr>
								<tr>
									<td><b>Total Gaji</b></td>
									<td><b>:</b></td>
									<td><b>Rp. <?= nominal($value['gawali'] + $value['trasi'] + $value['mejar'] + $value['piket'] + $value['prog'] + $value['gaji_total']) ?></span></b></td>
								</tr>
							</table>
						</div>
					</div>
					<br>
					<div class="row">
						<div class="col-12">
							<p class="tengah"><b>PENERIMAAN BERSIH = Rp. <?= nominal($value['gawali'] + $value['trasi'] + $value['mejar'] + $value['piket'] + $value['prog'] + $value['gaji_total']) ?></span></b></p>
						</div>
					</div>
					<div class="row">
						<div class="col-6 text-center" >
							<p><br></p>
							<p>Penerima</p>
							<br>
							<br>
							<br>
							<p><b><u><span class="slip-nama"></span></u></b></p>
						</div>
						<div class="col-6 text-center">
							<p>Situbondo, <?= date_indo(date('Y-m-d')) ?></p>
							<p>TU</p>
							<br>
							<br>
							<br>
							<p><b><u>Imam Sanusi</u></b></p>
						</div>
					</div>
				</div>
			</div>
			<div class="modal-footer d-print-none">
				<input type="reset" class="btn btn-secondary btn-bg-gradient-x-red-pink" data-dismiss="modal"
					   value="Tutup">
				<button onclick="window.print()" class="btn btn-primary btn-bg-gradient-x-purple-blue"><i
						class="fa fa-print"></i> Cetak
				</button>
			</div>
		</div>
	</div>
</div>


<!-- Modal hapus -->
<div class="modal fade text-left" id="bayar" tabindex="-1" role="dialog" aria-labelledby="myModalLabel35"
	 aria-hidden="true">
	<div class="modal-dialog" role="document">
		<div class="modal-content">
			<div class="modal-header">
				<h3 class="modal-title" id="myModalLabel35"> Karyawan sudah menerima gaji ?</h3>
				<button type="button" class="close" data-dismiss="modal" aria-label="Close">
					<span aria-hidden="true">&times;</span>
				</button>
			</div>
			<div class="modal-footer">
				<input type="reset" class="btn btn-secondary btn-bg-gradient-x-red-pink" data-dismiss="modal"
					   value="Tutup">
				<div id="tombol-konfirmasi">

				</div>
			</div>
		</div>
	</div>
</div>

