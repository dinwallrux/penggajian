    <div class="form-group row col-sm-6">
		<label class="col-sm-3 col-form-label">Bulan</label>
		<div class="col-sm-3">
		    <select name="bulan" id="bulan" class="form-control">
		        <option value="1">Januari</option>
		        <option value="2">Februari</option>
		        <option value="3">Maret</option>
		        <option value="4">April</option>
		        <option value="5">Mei</option>
		        <option value="6">Juni</option>
		        <option value="7">Juli</option>
		        <option value="8">Agustus</option>
		        <option value="9">September</option>
		        <option value="10">Oktober</option>
		        <option value="11">November</option>
		        <option value="12">Desember</option>
		    </select>
		</div>
		<div class="col-sm-3">
		    <select name="tahun" id="tahun" class="form-control">
		        <?php for ($i=2020;$i<=2030;$i++){?>
    		        <option value="<?=$i?>"><?=$i?></option>
    		    <?php } ?>
		    </select>
		</div>
		<div class="col-sm-3">
		    <button id="cari" class="btn btn-primary">Tampilkan</button>
		</div>
	</div>
<div class="row">
	<div class="col-lg-12">
		<div class="card">
			<div class="card-header">
			  <h3 class="card-title">Data Rekap Penggajian</h3>
			</div>
		<!-- /.card-header -->
			<div class="card-body">
				<table id="table_data" class="table table-bordered table-hover" border="1" width="100%">
					<thead>
						<tr>
							<th width="75px">NIP</th>
							<th width="150px">Nama</th>
							<th width="75px">Kehadiran</th>
							<th width="75px">Cuti</th>
							<th width="75px">KJM</th>
							<th width="75px">Total Gaji</th>
							<th width="75px">Aksi</th>
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
