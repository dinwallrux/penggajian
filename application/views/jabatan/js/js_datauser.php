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
                  { "data": "tunj_jabatan" },
                  { "data": "tunj_piket" },
                  { "data": "bpjs" },
                  { "data": "tunj_makan" },
                  { "data": "hadir" },
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
	$("#tunjjabatan").val(data["tunj_jabatan"]);
	$("#piket").val(data["tunj_piket"]);
	$("#bpjs").val(data["bpjs"]);
	$("#makan").val(data["tunj_makan"]);
	$("#hadir").val(data["hadir"]);
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