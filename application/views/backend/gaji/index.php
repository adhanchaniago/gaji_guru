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
					Berhasil absen
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
				<h1 style="text-align: center">Gaji Guru</h1>
				<?php if ($this->session->userdata('session_hak_akses') == 'admin');?>
				<button type="button" class="btn btn-primary btn-bg-gradient-x-purple-blue box-shadow-2" data-toggle="modal" data-target="#bootstrap">
				<i class="ft-plus-circle"></i>Tambah Gaji Guru</button>
			</div>
				<table class="table table-bordered zero-configuration" style="width: 100%">
					<thead>
					<tr>
						<td style="width: 2%">No</td>
						<td>Nama Karyawan</td>
						<th>Jabatan</th>
						<th>Tanggal Bergabung</th>
						<th>Nomor HP</th>
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
							<td><?= date_indo($value['karyawan_tanggal_gabung']) ?></td>
							<td><?= $value['karyawan_nomor_hp'] ?></td>
							<td>
								<a href="<?=base_url('gaji/detail/'.$value['karyawan_id'])?>"
									class="btn btn-success btn-sm  btn-bg-gradient-x-purple-blue box-shadow-2"
									 data-toggle="tooltip" data-placement="top"
									title="Lihat detail"><i class="ft-eye"></i></a>

							</td>
						</tr>

						<?php
						$no++;
					endforeach;
					?>
					</tbody>
				</table>
			</div>

<!-- Modal tambah -->
<div class="modal fade text-left" id="bootstrap" tabindex="-1" role="dialog" aria-labelledby="myModalLabel35"
	 aria-hidden="true">
	<div class="modal-dialog" role="document">
		<div class="modal-content">
			<div class="modal-header">
				<h3 class="modal-title" id="myModalLabel35"> Tambah data Gaji</h3>
				<button type="button" class="close" data-dismiss="modal" aria-label="Close">
					<span aria-hidden="true">&times;</span>
				</button>
			</div>
			<?= form_open('gaji/tambah') ?>
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
					
				<fieldset class="form-group floating-label-form-group">
					<label for="barokah">Barokah Pengelolah</label>
					<input type="text" class="form-control" name="barokah" id="barokah" placeholder="barokah"
						   autocomplete="off" required>
				</fieldset>
			<fieldset class="form-group floating-label-form-group">
					<label for="gawali">Gaji Wali Kelas</label>
					<input type="text" class="form-control" name="gawali" id="gawali" placeholder="Gaji Wali"
						   autocomplete="off" required>
				</fieldset>
				<fieldset class="form-group floating-label-form-group">
					<label for="trasi">Transportasi</label>
					<input type="text" class="form-control" name="trasi" id="trasi" placeholder="Trasnportasi"
						   autocomplete="off" required>
				</fieldset>
				<fieldset class="form-group floating-label-form-group">
					<label for="mejar">Mengajar</label>
					<input type="text" class="form-control" name="mejar" id="mejar" placeholder="Mengajar"
						   autocomplete="off" required>
				</fieldset>
				<fieldset class="form-group floating-label-form-group">
					<label for="piket">Piket</label>
					<input type="text" class="form-control" name="piket" id="piket" placeholder="Piket"
						   autocomplete="off" required>
				</fieldset>
				<fieldset class="form-group floating-label-form-group">
					<label for="prog">IT Program</label>
					<input type="text" class="form-control" name="prog" id="prog" placeholder="IT program"
						   autocomplete="off" required>
				</fieldset>
				<fieldset class="form-group floating-label-form-group">
					<label for="jam">Jam Ngajar</label>
					<input type="text" class="form-control" name="jam_ngajar" id="jam_ngajar" placeholder="Jam Ngajar"
						   autocomplete="off" required>
				</fieldset>
			<div class="modal-footer">
				<input type="reset" class="btn btn-secondary btn-bg-gradient-x-red-pink" data-dismiss="modal"
					   value="Tutup">
				<input type="submit" class="btn btn-primary btn-bg-gradient-x-blue-cyan" name="simpan" value="Simpan">
			</div>
			<?= form_close() ?>
		</div>
	</div>
</div>
		</div>
	</div>
</div>
