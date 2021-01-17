<div class="modal fade" id="modal-default">
    <div class="modal-dialog modal-lg">
      <div class="modal-content">
        <div id="printThis">
            <div class="modal-header">
              <h4 class="modal-title">Slip Gaji</h4>
              <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
              </button>
            </div>
            <div class="modal-body">
                <div class="form-group row">
    				<label class="col-sm-5 col-form-label">Nama Pegawai</label>
    				<div class="col-sm-7">
    				  <span id="nama"></span>
    				</div>
    			</div>
                <div class="form-group row">
    				<label class="col-sm-5 col-form-label">Periode</label>
    				<div class="col-sm-7">
    				    <span id="periode"></span>
    				</div>
    			</div>
                <div class="form-group row">
    				<label class="col-sm-5 col-form-label">Total Cuti</label>
    				<div class="col-sm-7">
    				    <span id="cuti"></span>
    				</div>
    			</div>
    			<div class="form-group row">
    				<label class="col-sm-4 col-form-label">Rincian</label>
    				<div class="col-sm-4">
    				  Gaji Pokok
    				</div>
    				<div class="col-sm-1">
    				    Rp.
                    </div>
    				<div class="col-sm-3 text-right">
    				  <span id="pokok"></span>
    				</div>
    				<div class="col-sm-4">
    				  &nbsp;
    				</div>
    				<div class="col-sm-4">
    				  Tunjangan Istri
    				</div>
    				<div class="col-sm-1">
    				    Rp.
                    </div>
    				<div class="col-sm-3 text-right">
    				  <span id="istri"></span>
    				</div>
    				<div class="col-sm-4">
    				  &nbsp;
    				</div>
    				<div class="col-sm-4">
                        Tunjangan Anak
    				</div>
    				<div class="col-sm-1">
    				    Rp.
                    </div>
    				<div class="col-sm-3 text-right">
    				  <span id="anak"></span>
    				</div>
    				<div class="col-sm-4">
    				  &nbsp;
    				</div>
    				<div class="col-sm-4">
    				  Tunjangan Makan
    				</div>
    				<div class="col-sm-1">
    				    Rp.
                    </div>
    				<div class="col-sm-3 text-right">
    				  <span id="makan"></span>
    				</div>
    				<div class="col-sm-4">
    				  &nbsp;
    				</div>
    				<div class="col-sm-4">
    				    Tunjangan Kehadiran
    				</div>
    				<div class="col-sm-1">
    				    Rp.
                    </div>
    				<div class="col-sm-3 text-right">
    				  <span id="hadir"></span>
    				</div>
    				<div class="col-sm-4">
    				  &nbsp;
    				</div>
    				<div class="col-sm-4">
    				    Tunjangan Jabatan
    				</div>
    				<div class="col-sm-1">
    				    Rp.
                    </div>
    				<div class="col-sm-3 text-right">
    				  <span id="jabatan"></span>
    				</div>
    				<div class="col-sm-4">
    				  &nbsp;
    				</div>
    				<div class="col-sm-4">
    				  Tunjangan Pendidikan
    				</div>
    				<div class="col-sm-1">
    				    Rp.
                    </div>
    				<div class="col-sm-3 text-right">
    				  <span id="pendidikan"></span>
    				</div>
    				<div class="col-sm-4">
    				  &nbsp;
    				</div>
    				<div class="col-sm-4">
    				  Tunjangan Piket
    				</div>
    				<div class="col-sm-1">
    				    Rp.
                    </div>
    				<div class="col-sm-3 text-right">
    				  <span id="piket"></span>
    				</div>
    				<div class="col-sm-4">
    				  &nbsp;
    				</div>
    				<div class="col-sm-4">
    				  Total KJM <span id="lebihkjm"></span>
    				</div>
    				<div class="col-sm-1">
    				    Rp.
                    </div>
    				<div class="col-sm-3 text-right">
    				  <span id="kjm"></span>
    				</div>
    				<div class="col-sm-4">
    				  &nbsp;
    				</div>
    				<div class="col-sm-4">
    				  Iuran Wajib Pegawai
    				</div>
    				<div class="col-sm-1">
    				    Rp.
                    </div>
    				<div class="col-sm-3 text-right">
    				  <span id="iuran"></span>
    				</div>
    				<div class="col-sm-4">
    				  &nbsp;
    				</div>
    				<div class="col-sm-4">
    				  Iuran BPJS
    				</div>
    				<div class="col-sm-1">
    				    Rp.
                    </div>
    				<div class="col-sm-3 text-right">
    				  <span id="bpjs"></span>
    				</div>
    				<div class="col-sm-4">
    				  &nbsp;
    				</div>
    				<div class="col-sm-4">
    				  Total
    				</div>
    				<div class="col-sm-1">
    				    Rp.
                    </div>
    				<div class="col-sm-3">
    				  <span id="totalgaji"></span>
    				</div>
    			</div>
            </div>
        </div>
        <div class="modal-footer justify-content-between">
          <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
          <?php if ($_SESSION["logged_in"]["role"]!="Kepala Sekolah"){?>
          <button type="button" id="btnPrint" class="btn btn-primary">Print</button>
          <?php } ?>
        </div>
      </div>
      <!-- /.modal-content -->
    </div>
    <!-- /.modal-dialog -->
  </div>
  <!-- /.modal -->
<style>
@media screen {
  #printSection {
      display: none;
  }
}

@media print {
  body * {
    visibility:hidden;
  }
  #printSection, #printSection * {
    visibility:visible;
  }
  #printSection {
    position:absolute;
    left:0;
    top:0;
  }
}
</style>
<script>
var table;
$(function(){
	$("#pesan").hide();
	table = $('#table_data').DataTable({
			"order": [[ 1, "asc" ]],
			"ajax": {
					"url": "<?php base_url()?>penggajian/Listdata",
					"type": "POST",
                    "data"	: function ( d ) {
						d.bulan=$("#bulan").val();
						d.tahun=$("#tahun").val();
					},
					"dataSrc":function (data){
						console.log(data);
							return data;							
						  }
			},
			"aoColumnDefs": [
				{
					"aTargets": [6],
					"mData": "status",
					"searchable": false,
					"orderable": false,
					"mRender": function (data, type, full, meta){
					    return "<a href='#' data-toggle='modal' data-target='#modal-default' onclick='detailgaji("+full.nip+")'>Detail</a>";
					}
				}
			],
            "columns": [
				  { "data": "nip"},
                  { "data": "nama" },
                  { "data": "hadir" },
                  { "data": "cuti" },
                  { "data": "kjm" },
                  { "data": "gaji",render: $.fn.dataTable.render.number('.', ',', 0, '', '')},
			]
	});
	
	$("#cari").click(function (e){
    	e.preventDefault();
    	table.ajax.reload();
    });

})

$("#btnPrint").on("click",function () {
    printElement(document.getElementById("printThis"));
});

function printElement(elem) {
    var domClone = elem.cloneNode(true);
    
    var $printSection = document.getElementById("printSection");
    
    if (!$printSection) {
        var $printSection = document.createElement("div");
        $printSection.id = "printSection";
        document.body.appendChild($printSection);
    }
    
    $printSection.innerHTML = "";
    $printSection.appendChild(domClone);
    window.print();
}

function reset(){
    $("#nama").html("");    
    $("#pokok").html("");    
    $("#istri").html("");    
    $("#anak").html("");    
    $("#makan").html("");    
    $("#hadir").html("");    
    $("#jabatan").html("");    
    $("#pendidikan").html("");    
    $("#piket").html("");    
    $("#kjm").html("");    
    $("#iuran").html("");    
    $("#bpjs").html("");    
    $("#totalgaji").html("");    
}

function detailgaji(nip){
    reset();
    bulan=$("#bulan").val();
    tahun=$("#tahun").val();
    $("#periode").html($("#bulan option:selected").text()+" "+$("#tahun").val());
    $.get("<?=base_url()?>penggajian/detailgaji/"+bulan+"/"+tahun+"/"+nip, function(data){
        isi=JSON.parse(data);
        gjpokok=isi["gaji"][0]["pokok"];
        hadir=0;
        kjm=0;
        if (isi["absen"].length !== 0) {
            hadir=isi["absen"][0]["hadir"];
            kjm=isi["absen"][0]["kjm"];
        }
        $("#nama").html(isi["gaji"][0]["nama"]);
        $("#pokok").html(Number(gjpokok).toLocaleString("id-ID"));
        istri=0;
        anak=0;
        if (isi["gaji"][0]["nikah"]=="Ya"){
            istri=Number(0.05*gjpokok);
            if (isi["gaji"][0]["anak"]>0){
                anak=Number(0.02*gjpokok*isi["gaji"][0]["anak"])
            }
        }
        
        $("#cuti").html(isi["cuti"][0]["cuti"]+" Hari");
        $("#istri").html(istri.toLocaleString("id-ID"));
        $("#anak").html(anak.toLocaleString("id-ID"));                
        $("#makan").html(Number(hadir*isi["gaji"][0]["tunj_makan"]).toLocaleString("id-ID"));
        $("#hadir").html(Number(hadir*isi["gaji"][0]["hadir"]).toLocaleString("id-ID"));
        $("#jabatan").html(Number(isi["gaji"][0]["tunj_jabatan"]).toLocaleString("id-ID"));
        $("#pendidikan").html(Number(0.1*gjpokok).toLocaleString("id-ID"));
        $("#piket").html(Number(isi["gaji"][0]["tunj_piket"]).toLocaleString("id-ID"));
        $("#kjm").html(Number(kjm*25000).toLocaleString("id-ID"));
        $("#lebihkjm").html("("+Number(kjm)+" Jam )");
        $("#iuran").html("("+(Number(0.1*gjpokok).toLocaleString("id-ID"))+")");
        $("#bpjs").html("("+Number(isi["gaji"][0]["bpjs"]).toLocaleString("id-ID")+")");
        var gaji=Number(gjpokok)+istri+anak+Number(hadir*isi["gaji"][0]["tunj_makan"]);
        gaji=gaji+Number(hadir*isi["gaji"][0]["hadir"])+Number(isi["gaji"][0]["tunj_jabatan"])+Number(0.1*gjpokok)+Number(isi["gaji"][0]["tunj_piket"]);
        gaji=gaji+Number(kjm*25000)-Number(0.1*gjpokok)-Number(isi["gaji"][0]["bpjs"]);
        $("#totalgaji").html(gaji.toLocaleString("id-ID"));
  });
}
</script>