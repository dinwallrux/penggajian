<?php
    if ($_SESSION["logged_in"]["role"]=="Admin"){
?>
<div class="row">
	<form id="form_input">
		<div class="col-lg-12">
			<div class="card-body">
			  <div class="form-group row">
				<label class="col-sm-5 col-form-label">Tanggal Pengajuan</label>
				<div class="col-sm-7">
				  <input type="text" class="form-control" value="<?=date("d-m-Y")?>" disabled>
				</div>
			  </div>
			  <div class="form-group row">
				<label class="col-sm-5 col-form-label">NIP</label>
				<div class="col-sm-7">
				  <input type="text" class="form-control" id="username" name="username" placeholder="NIP" readonly>
				</div>
			  </div>
			  <div class="form-group row">
				<label class="col-sm-5 col-form-label">Nama</label>
				<div class="col-sm-7">
				    <input type="text" class="form-control" id="nama" name="nama" list="gurulist" placeholder="Nama">
					<datalist name="gurulist" id="gurulist">
					<?php
					foreach($guru as $dt) {
						echo "<option data-nip='".$dt["nip"]."' value='".$dt["nama"]."'/>";
					}
					?>
					</datalist>				  
				</div>
			  </div>
			  <div class="form-group row">
				<label class="col-sm-5 col-form-label">Tanggal Awal</label>
				<div class="col-sm-7">
				  <input type="date" class="form-control" id="awal" name="awal" placeholder="Awal" value="<?=date("m/d/Y")?>">
				</div>
			  </div>
			  <div class="form-group row">
				<label class="col-sm-5 col-form-label">Tanggal Akhir</label>
				<div class="col-sm-7">
				  <input type="date" class="form-control" id="akhir" name="akhir" placeholder="Akhir" value="<?=date("m/d/Y")?>">
				</div>
			  </div>
              <div class="form-group row">
				<label class="col-sm-5 col-form-label">Lama</label>
				<div class="col-sm-7">
				  <input type="text" class="form-control" id="lama" readonly>
				</div>
			  </div>			  
			  <div class="form-group row">
				<label class="col-sm-5 col-form-label">Alasan</label>
				<div class="col-sm-7">
				  <input type="text" class="form-control" id="alasan" name="alasan" placeholder="alasan" maxlength="100">
				</div>
			  </div>
			  <div class="form-group row">
				  <button id="btnSimpan" name="btnSimpan"  class="btn btn-primary">Simpan</button>
			  </div>
			</div>
		</div>
	</form>
</div>
<?php } ?>
<br>
<?php 
if (!empty($this->session->flashdata('error'))){
echo '<div class="alert alert-danger">';
echo $this->session->flashdata('error');
echo '</div>';
}
if (!empty($this->session->flashdata('sukses'))){
echo '<div class="alert alert-success">';
echo $this->session->flashdata('sukses');
echo '</div>';
}
?>
<br>
<div class="row">
	<div class="col-lg-12">
		<div class="card">
			<div class="card-header">
			  <h3 class="card-title">Data Cuti</h3>
			</div>
		<!-- /.card-header -->
			<div class="card-body">
				<table id="table_data" class="table table-bordered table-hover" border="1" width="100%">
					<thead>
						<tr>
							<th width="75px">Tgl Pengajuan</th>
							<th width="75px">NIP</th>
							<th width="150px">Nama Pegawai</th>
							<th width="75px">Awal Cuti</th>
							<th width="75px">Akhir Cuti</th>
							<th width="75px">Lama</th>
							<th width="75px">Status</th>
							<?php
							    if ($_SESSION["logged_in"]["role"]=="Waka Kurikulum"){
							?>
							<th width="75px">Aksi</th>
							<?php
							    }
							?>
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
