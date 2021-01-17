<?php
//Menggabungkan semua bagian halaman
require_once('header.php');
require_once('sidebar.php');
if (isset($content)){
	$this->load->view($content);
}else{
    require_once('body.php');
}
require_once('footer.php');
?>