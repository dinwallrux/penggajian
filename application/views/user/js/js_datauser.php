<script>
var table;
$(function(){
	$("#pesan").hide();
	table = $('#table_data').DataTable({
			"order": [[ 1, "asc" ]],
			"ajax": {
					"url": "<?php base_url()?>user/Listdata",
					"type": "POST",
					"dataSrc":function (data){
						console.log(data);
							return data;							
						  }
			},
            "columns": [
				  { "data": "nip"},
                  { "data": "nama" },
                  { "data": "alamat" },
                  { "data": "pokok" },
                  { "data": "role" },
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
	$("#telp").val(data["telp"]);
	$("#anak").val(data["anak"]);
	if (data["nikah"]=="Ya"){
	    $("#nikah_1").attr('checked', 'checked');
	}else{
	    $("#nikah_2").attr('checked', 'checked');
	}
	if (data["jnskel"]=="Wanita"){
	    $("#jnskel_2").attr('checked', 'checked');
	}else{
	    $("#jnskel_1").attr('checked', 'checked');
	}
	$("#jabatan").val(data["jabatan"]);
	$("#masuk").val(data["masuk"]);
	$("#pokok").val(data["pokok"]);
	$("#role").val(data["role"]);
	$("#username").attr("readonly","true");
	$("#btnSimpan").attr("id","btnUpdate");
});



$("button[name=btnSimpan]").click(function (e) {
	e.preventDefault();
	var dataString = $("#form_input").serialize(); 	
	if ($(this).attr("id")=="btnSimpan")
	{
		$.ajax({
			type: "POST",
			url: "<?php echo base_url()?>user/AddData",
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
			url: "<?php echo base_url()?>user/updateData",
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