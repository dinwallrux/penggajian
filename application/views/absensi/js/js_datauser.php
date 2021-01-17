<script>
var table;
$(function(){
	$("#pesan").hide();
	table = $('#table_data').DataTable({
			"order": [[ 1, "asc" ]],
			"ajax": {
					"url": "<?php base_url()?>jabatan/Listdata",
					"type": "POST",
					"dataSrc":function (data){
						console.log(data);
							return data;							
						  }
			},
            "columns": [
				  { "data": "namajabatan"},
                  { "data": "pokok" },
                  { "data": "tunj_jabatan" },
                  { "data": "tunj_piket" },
                  { "data": "tunj_pendidik" },
                  { "data": "bpjs" },
                  { "data": "tunj_istri" },
                  { "data": "tunj_anak" },
                  { "data": "tunj_makan" },
                  { "data": "hadir" },
                  { "data": "iuranwajib" },
			]
	});
})

$('#table_data tbody').on( 'click', 'tr', function (e) {
	if ($(e.target).is($(this).find('td:last,button,i')))
	{
			return;
	}
	var data=table.row( this ).data();
	$("#jabatan").val(data["namajabatan"]);
	$("#pokok").val(data["pokok"]);
	$("#tunjjabatan").val(data["tunj_jabatan"]);
	$("#piket").val(data["tunj_piket"]);
	$("#pendidik").val(data["tunj_pendidik"]);
	$("#bpjs").val(data["bpjs"]);
	$("#istri").val(data["tunj_istri"]);
	$("#anak").val(data["tunj_anak"]);
	$("#makan").val(data["tunj_makan"]);
	$("#hadir").val(data["hadir"]);
	$("#wajib").val(data["iuranwajib"]);
	$("#jabatan").attr("readonly","true");
	$("#btnSimpan").attr("id","btnUpdate");
});



$("button[name=btnSimpan]").click(function (e) {
	e.preventDefault();
	var dataString = $("#form_input").serialize(); 	
	if ($(this).attr("id")=="btnSimpan")
	{
		$.ajax({
			type: "POST",
			url: "<?php echo base_url()?>jabatan/AddData",
			data: dataString,
			success: function(data)
			{
				console.log(data);
				$("#pesan").show();
				$("#pesan").html(data);
				table.ajax.reload();
				$('#form_input')[0].reset();
			}
		});
	}else{
		$.ajax({
			type: "POST",
			url: "<?php echo base_url()?>jabatan/updateData",
			data: dataString,
			success: function(data)
			{
				$("#pesan").show();
				$("#pesan").html(data);
				table.ajax.reload();
				$("#btnSimpan").attr("id","btnSimpan");
				$("#jabatan").removeAttr("readonly");
				$('#form_input')[0].reset();
			}
		});	
	}
});
</script>