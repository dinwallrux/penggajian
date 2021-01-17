<div class="row">
	<form id="form_input">
		<div class="col-lg-12">
			<div class="card-body">
			  <div class="form-group row">
				<label class="col-sm-5 col-form-label">Nama Jabatan</label>
				<div class="col-sm-7">
				  <input type="text" class="form-control" id="jabatan" name="jabatan" placeholder="Jabatan" maxlength="50">
				</div>
			  </div>
			  <div class="form-group row">
				<label class="col-sm-5 col-form-label">Tunj. Jabatan</label>
				<div class="col-sm-7">
				  <input type="text" class="form-control" id="tunjjabatan" name="tunjjabatan" placeholder="Tunj. Jabatan">
				</div>
			  </div>
			  <div class="form-group row">
				<label class="col-sm-5 col-form-label">Tunj. Piket</label>
				<div class="col-sm-7">
				  <input type="text" class="form-control" id="piket" name="piket" placeholder="Tunj. Piket">
				</div>
			  </div>
			  <div class="form-group row">
				<label class="col-sm-5 col-form-label">BPJS</label>
				<div class="col-sm-7">
				  <input type="text" class="form-control" id="bpjs" name="bpjs" placeholder="BPJS">
				</div>
			  </div>
			  <div class="form-group row">
				<label class="col-sm-5 col-form-label">Tunj. Makan</label>
				<div class="col-sm-7">
				  <input type="text" class="form-control" id="makan" name="makan" placeholder="Tunj. Makan">
				</div>
			  </div>
			  <div class="form-group row">
				<label class="col-sm-5 col-form-label">Tunj. Kehadiran</label>
				<div class="col-sm-7">
				  <input type="text" class="form-control" id="hadir" name="hadir" placeholder="Tunj. Kehadiran">
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
			  <h3 class="card-title">Data Jabatan</h3>
			</div>
		<!-- /.card-header -->
			<div class="card-body">
				<table id="table_data" class="table table-bordered table-hover" border="1" width="100%">
					<thead>
						<tr>
							<th width="150px">Nama Jabatan</th>
							<th width="75px">Tunj Jabatan</th>
							<th width="75px">Tunj Piket</th>
							<th width="75px">BPJS</th>
							<th width="75px">Tunj Makan</th>
							<th width="75px">Tunj Hadir</th>
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
