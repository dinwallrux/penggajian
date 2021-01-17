<script>
$("#awal").on("blur",function(){
    var date1 = new Date($("#awal").val());
    var date2 = new Date($("#akhir").val());
    var Difference_In_Time = date2.getTime() - date1.getTime();     
    var days = Difference_In_Time / (1000 * 3600 * 24);
    $("#lama").val(days);
})

$("#akhir").on("blur",function(){
    var date1 = new Date($("#awal").val());
    var date2 = new Date($("#akhir").val());
    var Difference_In_Time = date2.getTime() - date1.getTime();     
    var days = Difference_In_Time / (1000 * 3600 * 24);
    $("#lama").val(days);
})

var table;
$(function(){
	$("#pesan").hide();
	table = $('#table_data').DataTable({
			"order": [[ 1, "asc" ]],
			"ajax": {
					"url": "<?php base_url()?>cuti/Listdata",
					"type": "POST",
					"dataSrc":function (data){
						console.log(data);
							return data;							
						  }
			},
			"aoColumnDefs": [
				{
					"aTargets": [5],
					"mData": "status",
					"searchable": false,
					"orderable": false,
					"mRender": function (data, type, full, meta){
					   var date1 = new Date(full.awal);
                       var date2 = new Date(full.akhir);
                       var Difference_In_Time = date2.getTime() - date1.getTime();     
                       var days = Difference_In_Time / (1000 * 3600 * 24);
                       return days;
					}
				},{
					"aTargets": [6],
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
					"aTargets": [7],
					"mData": "status",
					"searchable": false,
					"orderable": false,
					"mRender": function (data, type, full, meta){
					    if (full.status=="0"){
					        return "<a href='<?=base_url()?>cuti/validasi/"+full.nip+"/"+full.tanggal_aju+"/"+full.awal+"/"+full.akhir+"'>Validasi</a>";
					    }else{
					        return "";
					    }
					}
				}
				<?php } ?>
			],
            "columns": [
				  { "data": "tanggal_aju"},
                  { "data": "nip" },
                  { "data": "nama" },
                  { "data": "awal" },
                  { "data": "akhir" },
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