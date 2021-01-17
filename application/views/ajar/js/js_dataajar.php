<script>
var table;
$(function(){
	$("#pesan").hide();
	table = $('#table_data').DataTable({
			"order": [[ 1, "asc" ]],
			"ajax": {
					"url": "<?php base_url()?>/ajar/listajar",
					"type": "POST",
					"dataSrc":function (data){
						console.log(data);
							return data;							
						  }
			},
            "columns": [
				  { "data": "nip"},
                  { "data": "nama" },
                  { "data": "tglmasuk" },
                  { "data": "jam_masuk" },
                  { "data": "jam_keluar" },
			]
	});
})

$('#table_data tbody').on( 'click', 'tr', function (e) {
	if ($(e.target).is($(this).find('td:last,button,i')))
	{
			return;
	}
	var data=table.row( this ).data();
	$("#username").val(data["nip"]);
	$("#nama").val(data["nama"]);
	$("#alamat").val(data["alamat"]);
	$("#username").attr("readonly","true");
	$("#btnSimpan").attr("id","btnUpdate");
});

 $('#nama').on('input', function() {
	var val = $('#nama').val()
	var xyz = $('#gurulist option').filter(function() {
		return this.value == val;
	}).data('nip');
	$("#username").val(xyz);
  })

$("button[name=btnSimpan]").click(function (e) {
	e.preventDefault();
	var dataString = $("#form_input").serialize(); 	
	if ($(this).attr("id")=="btnSimpan")
	{
		$.ajax({
			type: "POST",
			url: "<?php echo base_url()?>cuti/AddData",
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
			url: "<?php echo base_url()?>cuti/updateData",
			data: dataString,
			success: function(data)
			{
				$("#pesan").show();
				$("#pesan").html(data);
				table.ajax.reload();
				$("#btnSimpan").attr("id","btnSimpan");
				$("#username").removeAttr("readonly");
				$('#form_input')[0].reset();
			}
		});	
	}
});
</script>