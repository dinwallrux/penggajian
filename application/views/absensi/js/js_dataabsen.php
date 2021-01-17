<script>
var table;
$(function(){
	$("#pesan").hide();
	table = $('#table_data').DataTable({
			"order": [[ 1, "asc" ]],
			"ajax": {
					"url": "<?php base_url()?>/absensi/listabsen",
					"type": "POST",
					"dataSrc":function (data){
						console.log(data);
							return data;							
						  }
			},
            "aoColumnDefs": [
				{
					"aTargets": [4],
					"mData": "status",
					"searchable": false,
					"orderable": false,
					"mRender": function (data, type, full, meta){
					    if (full.status=="1"){
					        return "valid"
					    }else{
					        return "";
					    }
					}
				}
				<?php
				    if ($_SESSION["logged_in"]["role"]=="Waka Kurikulum"){
				?>				
				,{
					"aTargets": [5],
					"mData": "status",
					"searchable": false,
					"orderable": false,
					"mRender": function (data, type, full, meta){
					    if ((full.status=="0") && (full.keluar!="0000-00-00 00:00:00")) {
					        return "<a href='<?=base_url()?>absensi/validasi/"+full.nip+"/"+full.masuk+"'>Validasi</a>";
					    }else{
					        return "";
					    }
					}
				}
				<?php }?>
			],
			"columns": [
				  { "data": "nip"},
                  { "data": "nama" },
                  { "data": "masuk" },
                  { "data": "keluar" },
			]
	});
})
</script>