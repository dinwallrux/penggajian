<div class="row">
	<form id="form_input">
		<div class="col-lg-12">
			<div class="card-body">
			  <div class="form-group row">
				<label class="col-sm-5 col-form-label">NIP</label>
				<div class="col-sm-7">
				  <input type="text" class="form-control" id="username" name="username" placeholder="Username">
				</div>
			  </div>
			  <div class="form-group row">
				<label class="col-sm-5 col-form-label">Password</label>
				<div class="col-sm-7">
				  <input type="password" class="form-control" id="password" name="password" placeholder="Password">
				</div>
			  </div>
			  <div class="form-group row">
				<label class="col-sm-5 col-form-label">Nama</label>
				<div class="col-sm-7">
				  <input type="text" class="form-control" id="nama" name="nama" placeholder="Nama">
				</div>
			  </div>
			  <div class="form-group row">
				<label class="col-sm-5 col-form-label">Alamat</label>
				<div class="col-sm-7">
				  <input type="text" class="form-control" id="alamat" name="alamat" placeholder="Alamat">
				</div>
			  </div>
			  <div class="form-group row">
				<label class="col-sm-5 col-form-label">No HP</label>
				<div class="col-sm-7">
				  <input type="text" class="form-control" id="telp" name="telp" placeholder="No. HP/Telp">
				</div>
			  </div>
			  <div class="form-group row">
				<label class="col-sm-5 col-form-label">Jenis Kelamin</label>
					<div class="form-check">
						<input type="radio" name="jnskel" id="jnskel_1" value="Laki-laki" class="form-check-input" checked> Laki-Laki
					</div>&nbsp;&nbsp;&nbsp;
					<div class="form-check">
						<input type="radio" name="jnskel" id="jnskel_2" value="Wanita" class="form-check-input"> Wanita
					</div>
			  </div>
			  <div class="form-group row">
				<label class="col-sm-5 col-form-label">Status Pernikahan</label>
				<div class="form-check">
					<input type="radio" name="nikah" id="nikah_1" value="Ya" class="form-check-input" checked> Menikah
				</div>&nbsp;&nbsp;&nbsp;
				<div class="form-check">
					<input type="radio" name="nikah" id="nikah_2" value="Tidak" class="form-check-input"> Belum
				</div>
			  </div>
			  <div class="form-group row">
				<label class="col-sm-5 col-form-label">Jumlah Anak</label>
				<div class="col-sm-7">
				    <select name="anak" id="anak" class="form-control">
				      <option value="0">0</option>
				      <option value="1">1</option>
				      <option value="2">2</option>
				      <option value="3">3</option>
				      <option value="4">4</option>
				      <option value="5">5</option>
				      <option value="6">6</option>
				    </select>
				</div>
			  </div>
			  <div class="form-group row">
				<label class="col-sm-5 col-form-label">Tahun Masuk</label>
				<div class="col-sm-7">
				    <select name="masuk" id="masuk" class="form-control">
				        <?php
				            $now=date("Y");
				            for ($i=$now;$i>$now-15;$i--){
				                echo '<option value='.$i.'>'.$i.'</option>';
				            }
				        ?>
				    </select>
				</div>
			  </div>
			  <div class="form-group row">
				<label class="col-sm-5 col-form-label">Jabatan</label>
				<div class="col-sm-7">
				  <input type="text" class="form-control" id="jabatan" name="jabatan" list="jabatanlist">
					<datalist name="jabatanlist" id="jabatanlist">
					<?php
					foreach($jabatan as $dt) {
						echo "<option value='".$dt["namajabatan"]."'/>";
					}
					?>
					</datalist>
				</div>
			  </div>
			  <div class="form-group row">
				<label class="col-sm-5 col-form-label">Gaji Pokok</label>
				<div class="col-sm-7">
				  <input type="text" class="form-control" id="pokok" name="pokok">
				</div>
			  </div>
			  <div class="form-group row">
				<label class="col-sm-5 col-form-label">Role</label>
				<div class="col-sm-7">
					<select name="role" id="role" class="form-control">
						<option value="Pegawai">Pegawai</option>
						<option value="Waka Kurikulum">Waka Kurikulum</option>
						<option value="Kepala Sekolah">Kepala Sekolah</option>
						<option value="Admin">Admin</option>
					</select>
				</div>
			  </div>
			  <div class="form-group row">
				  <button id="btnSimpan" name="btnSimpan"  class="btn btn-primary">Simpan</button>
			  </div>
			</div>
		</div>
	</form>
</div>
<br>
<div id="pesan" class="alert alert-success"></div>
<br>
<div class="row">
	<div class="col-lg-12">
		<div class="card">
			<div class="card-header">
			  <h3 class="card-title">Data Pengguna</h3>
			</div>
		<!-- /.card-header -->
			<div class="card-body">
				<table id="table_data" class="table table-bordered table-hover" border="1" width="100%">
					<thead>
						<tr>
							<th width="150px">Username</th>
							<th width="75px">Nama</th>
							<th width="75px">Alamat</th>
							<th width="75px">Gaji Pokok</th>
							<th width="75px">Role</th>
						</tr>
					</thead>
					<tbody>
					</tbody>
				</table>
			</div>
		<!-- /.card-body -->
		</div>
	</div>
</div>
<style>
#table_data tbody tr{
  cursor:pointer;
}
</style>
