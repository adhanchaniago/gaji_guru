<div class="row">
	<div class="col-md-12">
		<div class="card box-shadow-2">
			<?php
			if ($this->session->flashdata('alert') == 'tambah_absen'):
				?>
				<div class="alert alert-success alert-dismissible animated fadeInDown" id="feedback" role="alert">
					<button type="button" class="close" data-dismiss="alert" aria-label="Close">
						<span aria-hidden="true">&times;</span>
					</button>
					Berhasil absen
				</div>
			<?php
			elseif ($this->session->flashdata('alert') == 'update_absen'):
				?>
				<div class="alert alert-success alert-dismissible animated fadeInDown" id="feedback" role="alert">
					<button type="button" class="close" data-dismiss="alert" aria-label="Close">
						<span aria-hidden="true">&times;</span>
					</button>
					Data berhasil diupdate
				</div>
			<?php
			elseif ($this->session->flashdata('alert') == 'hapus_absen'):
				?>
				<div class="alert alert-danger alert-dismissible animated fadeInDown" id="feedback" role="alert">
					<button type="button" class="close" data-dismiss="alert" aria-label="Close">
						<span aria-hidden="true">&times;</span>
					</button>
					Data berhasil dihapus
				</div>
			<?php
			elseif ($this->session->flashdata('alert') == 'absen_sudah_ada'):
				?>
				<div class="alert alert-danger alert-dismissible animated fadeInDown" id="feedback" role="alert">
					<button type="button" class="close" data-dismiss="alert" aria-label="Close">
						<span aria-hidden="true">&times;</span>
					</button>
					Karyawan sudah absen hari ini
				</div>
			<?php
			endif;
			?>
			<div class="card-header">
				<h1 style="text-align: center">Absen Karyawan</h1>
				<?php if ($this->session->userdata('session_hak_akses') == 'wkkurikulum' || $this->session->userdata('session_hak_akses') == 'admin'): ?>
					<button type="button" class="btn btn-primary btn-bg-gradient-x-purple-blue box-shadow-2"
							data-toggle="modal" data-target="#tambah">
						<i class="ft-plus-circle"></i> Tambah data Absen
					</button>
				<?php endif; ?>
			</div>
			<hr>
			<div class="card-body">
				<table class="table table-bordered zero-configuration" style="width: 100%">
					<thead>
					<tr>
						<td>No</td>
						<td>Nama Guru</td>
						<td>Jabatan</td>
						<td>Mata Pelajaran</td>
						<td>Jumlah Hadir</td>
						<td>tanggal rekap</td>
						<td style="text-align: center"><i class="ft-settings spinner"></i></td>
					</tr>
					</thead>
					<tbody>
					<?php
					$no = 1;
					foreach ($absen as $key => $value):
						?>
						<tr>
							<td><?= $no ?></td>
							<td><?= $value['karyawan_nama'] ?></td>
							<td><?= $value['jabatan_nama'] ?></td>
							<td><?= $value['mata_pelajaran'] ?></td>
							<td><?= $value['absen_rekap'] ?></td>
							<td><?php
								$tanggal = explode(' ', $value['absen_date_created']);
								echo date_indo($tanggal[0]);
								?>
							</td>
							<!-- <td>
								<?php
								if ($value['absen_status'] == 'normal'):
									?>
									<div class="badge badge-primary">
										<i class="ft-sun"></i> Normal
									</div>
								<?php
								elseif ($value['absen_status'] == 'lembur'):
									?>
									<div class="badge badge-secondary">
										<i class="ft-moon"></i> Lembur
									</div>
								<?php
								endif;
								?>
							</td> -->
							<!-- <td>
								<?php if ($this->session->userdata('session_hak_akses') == 'wkkurikulum' || $this->session->userdata('session_hak_akses') == 'admin'): ?>
									<?php
									if ($value['absen_status'] == 'normal'):
										?>
										<button
											class="btn btn-success btn-sm  btn-bg-gradient-x-purple-blue box-shadow-2 absen-lembur"
											data-toggle="modal" data-target="#lembur" value="<?= $value['absen_id'] ?>"
											title="<?= $value['karyawan_nama'] ?> lembur? "><i class="ft-moon"></i>
										</button>
									<?php
									elseif ($value['absen_status'] == 'lembur'):
										?>
										<button
											class="btn btn-success btn-sm  btn-bg-gradient-x-purple-blue box-shadow-2 absen-lembur"
											data-toggle="modal" data-target="#lembur" value="<?= $value['absen_id'] ?>"
											title="<?= $value['karyawan_nama'] ?> lembur " disabled><i
												class="ft-moon"></i></button>
									<?php
									endif;
									?>
								<?php
								endif;
								?>
							</td> -->
							<td>
								<button
									class="btn btn-success btn-sm  btn-bg-gradient-x-purple-blue box-shadow-2 absen-lihat"
									data-toggle="modal" data-target="#lihat" value="<?= $value['absen_id'] ?>"
									title="Lihat selengkapnya"><i class="ft-eye"></i></button>
								<?php if ($this->session->userdata('session_hak_akses') == 'wkkurikulum' || $this->session->userdata('session_hak_akses') == 'admin'):?>
								<button
									class="btn btn-success btn-sm  btn-bg-gradient-x-blue-green box-shadow-2 absen-edit"
									data-toggle="modal" data-target="#ubah" value="<?= $value['absen_id'] ?>"
									title="Update data absen"><i class="ft-edit"></i></button>
								<button
									class="btn btn-danger btn-sm  btn-bg-gradient-x-red-pink box-shadow-2 absen-hapus"
									data-toggle="modal" data-target="#hapus" value="<?= $value['absen_id'] ?>"
									title="Hapus data absen"><i class="ft-trash"></i></button>
								<?php endif;?>
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
</div>

<!-- Modal tambah -->
<div class="modal fade text-left" id="tambah" tabindex="-1" role="dialog" aria-labelledby="myModalLabel35"
	 aria-hidden="true">
	<div class="modal-dialog" role="document">
		<div class="modal-content">
			<div class="modal-header">
				<h3 class="modal-title" id="myModalLabel35"> Tambah data Absen</h3>
				<button type="button" class="close" data-dismiss="modal" aria-label="Close">
					<span aria-hidden="true">&times;</span>
				</button>
			</div>
			<?= form_open('absen/tambah') ?>
			<div class="modal-body">
			<div class="form-group floating-label-form-group">
					<label for="karyawan">Nama Guru</label>
					<select name="karyawan" id="basicSelect" class="form-control">
						<?php
						foreach ($karyawan as $key => $value):
							?>
							<option value="<?= $value['karyawan_id'] ?>"><?= $value['karyawan_nama'] ?></option>
						<?php
						endforeach;
						?>
					</select>
				</div>
				<div class="form-group floating-label-form-group">
						<label for="rekap_absen">Hadir/masuk</label>
						<input type="text" class="form-control" name="rekap_absen" id="rekap_absen" placeholder="Jumlah hadir">
					</div>
				 <div class="form-group floating-label-form-group">
					<label for="mapel">Mata Pelajaran</label>
					<input type="text" name="mapel" id="mapel" class="form-control" placeholder="Mapel"
						   value="<?= hari_indo(date('')) ?>">
				</div>
				<div class="form-group floating-label-form-group">
					<label for="jabatan">Jabatan</label>
					<select name="jabatan" id="basicSelect" class="form-control">
						<?php
						foreach ($jabatan as $key => $value):
							?>
							<option value="<?= $value['jabatan_id'] ?>"><?= $value['jabatan_nama'] ?></option>
						<?php
						endforeach;
						?>
					</select>
				</div>
				<!-- <div class="form-group floating-label-form-group">
					<label for="tanggal_absen">Tanggal</label>
					<input type="text" name="tanggal_absen" id="tanggal_absen" class="form-control"
						   placeholder="Tanggal" value="<?= date_indo(date('Y-m-d')) ?>" readonly>
				</div>
				 -->
			</div> 
			<div class="modal-footer">
				<input type="reset" class="btn btn-secondary btn-bg-gradient-x-red-pink" data-dismiss="modal"
					   value="Tutup">
				<input type="submit" class="btn btn-primary btn-bg-gradient-x-blue-cyan" name="simpan" value="Simpan">
			</div>
			<?= form_close() ?>
		</div>
	</div>
</div>


<!-- Modal lihat -->
<div class="modal fade text-left" id="lihat" tabindex="-1" role="dialog" aria-labelledby="myModalLabel35"
	 aria-hidden="true">
	<div class="modal-dialog" role="document">
		<div class="modal-content">
			<div class="modal-header">
				<h3 class="modal-title" id="myModalLabel35"> Lihat Data Karyawan</h3>
				<button type="button" class="close" data-dismiss="modal" aria-label="Close">
					<span aria-hidden="true">&times;</span>
				</button>
			</div>
			<div class="modal-body">
				<fieldset class="form-group floating-label-form-group">
					<label for="lihat_nama">Nama / Wali Kelas</label>
					<input type="text" class="form-control" name="nama" id="lihat_nama" placeholder="Nama Karyawan"
						   autocomplete="off" readonly>
				</fieldset>
				<fieldset class="form-group floating-label-form-group">
					<label for="lihat_tempat">Tempat Lahir</label>
					<input type="text" class="form-control" name="tempat_lahir" id="lihat_tempat" value=""
						   placeholder="Tempat Lahir" autocomplete="off" readonly>
				</fieldset>
				<fieldset class="form-group floating-label-form-group">
					<label for="lihat_tl">Tanggal Lahir</label>
					<div class='input-group'>
						<input type="date" class="form-control" name="tanggal_lahir" id="lihat_tl"
							   placeholder="Tanggal Lahir" autocomplete="off" readonly>
						<div class="input-group-append">
										<span class="input-group-text">
											<span class="ft-calendar"></span>
										</span>
						</div>
					</div>
				</fieldset>
				<fieldset class="form-group floating-label-form-group">
					<label for="lihat_alamat">Alamat</label>
					<textarea class="form-control" id="lihat_alamat" rows="3" name="alamat" placeholder="Alamat"
							  autocomplete="off" readonly></textarea>
				</fieldset>
				<fieldset class="form-group floating-label-form-group">
					<label for="lihat_tg">Tanggal Bergabung</label>
					<div class='input-group'>
						<input type="date" class="form-control" id="lihat_tg" name="tanggal_gabung"
							   placeholder="Tanggal Bergabung" autocomplete="off" readonly>
						<div class="input-group-append">
										<span class="input-group-text">
											<span class="ft-calendar"></span>
										</span>
						</div>
					</div>
				</fieldset>
				<fieldset class="form-group floating-label-form-group">
					<label for="lihat_jabatan_karyawan">Jabatan</label>
					<input type="text" class="form-control" name="jabatan" id="lihat_jabatan_karyawan"
						   placeholder="Jabatan" autocomplete="off" readonly>
				</fieldset>
				<fieldset class="form-group floating-label-form-group">
					<label for="lihat_gaji_pokok">Gaji Perhari</label>
					<input type="text" class="form-control" name="jabatan" id="lihat_gaji_pokok"
						   placeholder="Gaji pokok" autocomplete="off" readonly>
				</fieldset>
				<fieldset class="form-group floating-label-form-group">
					<label for="lihat_nohp">Nomor HP</label>
					<input type="number" class="form-control" id="lihat_nohp" name="nomor_hp" placeholder="Nomor HP"
						   autocomplete="off" readonly>
				</fieldset>
				<fieldset class="form-group floating-label-form-group">
					<label for="lihat_mapel">Mata Pelajaran</label>
					<input type="text" class="form-control" id="lihat_mapel" name="mapel" placeholder="Mapel"
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


<!-- Modal update -->
<div class="modal fade text-left" id="ubah" tabindex="-1" role="dialog" aria-labelledby="myModalLabel35"
	 aria-hidden="true">
	<div class="modal-dialog" role="document">
		<div class="modal-content">
			<div class="modal-header">
				<h3 class="modal-title" id="myModalLabel35"> Update Data Absen</h3>
				<button type="button" class="close" data-dismiss="modal" aria-label="Close">
					<span aria-hidden="true">&times;</span>
				</button>
			</div>
			<?= form_open('absen/update') ?>
			<div class="modal-body">
				<fieldset class="form-group floating-label-form-group">
					<label for="edit_nama">Nama</label>
					<input type="hidden" id="karyawan_id" name="id">
					<input type="text" class="form-control" name="nama" id="edit_nama" placeholder="Nama"
						   autocomplete="off" required>
				</fieldset>
				<fieldset class="form-group floating-label-form-group">
					<label for="edit_absen">Jumlah Hadir</label>
					<input type="text" class="form-control" name="absen_rekap" id="edit_absen" placeholder="Rekap Absen"
						   autocomplete="off" required>
				</fieldset>
				<fieldset class="form-group floating-label-form-group">
					<label for="edit_mata">Mata Pelajaran</label>
					<textarea class="form-control" id="edit_mata" rows="3" name="mata" placeholder="Mata Pelajaran"
							  autocomplete="off" required></textarea>
				</fieldset>
				<fieldset class="form-group floating-label-form-group">
					<label for="jabatan">Jabatan</label>
					<select name="jabatan" id="jabatan" class="select2 form-control" style="width: 100%">
						<?php
						foreach ($jabatan as $key => $value):
							?>
							<option value="<?= $value['jabatan_id'] ?>"><?= $value['jabatan_nama'] ?></option>
						<?php
						endforeach;
						?>
					</select>
				</fieldset>
			<div class="modal-footer">
				<input type="reset" class="btn btn-secondary btn-bg-gradient-x-red-pink" data-dismiss="modal"
					   value="Tutup">
				<input type="submit" class="btn btn-primary btn-bg-gradient-x-blue-cyan" name="update" value="Update">
			</div>
			<?= form_close() ?>
		</div>
	</div>
</div>


<!-- Modal hapus -->
<div class="modal fade text-left" id="hapus" tabindex="-1" role="dialog" aria-labelledby="myModalLabel35" aria-hidden="true">
	<div class="modal-dialog" role="document">
		<div class="modal-content">
			<div class="modal-header">
				<h3 class="modal-title" id="myModalLabel35"> Hapus Data Absen ?</h3>
				<button type="button" class="close" data-dismiss="modal" aria-label="Close">
					<span aria-hidden="true">&times;</span>
				</button>
			</div>
				<div class="modal-footer">
					<input type="reset" class="btn btn-secondary btn-bg-gradient-x-blue-cyan" data-dismiss="modal" value="Tutup">
					<div id="hapusabsen">

					</div>
				</div>
		</div>
	</div>


<!-- Modal lembur -->
<div class="modal fade text-left" id="lembur" tabindex="-1" role="dialog" aria-labelledby="myModalLabel35"
	 aria-hidden="true">
	<div class="modal-dialog" role="document">
		<div class="modal-content">
			<div class="modal-header">
				<h3 class="modal-title" id="myModalLabel35"> Karyawan Lembur ?</h3>
				<button type="button" class="close" data-dismiss="modal" aria-label="Close">
					<span aria-hidden="true">&times;</span>
				</button>
			</div>
			<div class="modal-footer">
				<input type="reset" class="btn btn-secondary btn-bg-gradient-x-blue-cyan" data-dismiss="modal"
					   value="Tutup">
				<div id="tombol-lembur">

				</div>
			</div>
		</div>
	</div>
</div>
