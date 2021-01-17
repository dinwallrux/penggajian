<?php
class Message{

    public function success_msg(){
        return "<font color='green'>Data telah tersimpan</font>";
    }
    
    public function error_msg($errmsg){
        return "<font color='red'>".$errmsg."</font>";
    }

    public function delete_msg(){
        return "<font color='green'>Data telah terhapus</font>";
    }

    public function error_delete_msg(){
        return "<font color='red'>Data gagal/sudah terhapus</font>";
    }

    public function active_msg(){
        return "<font color='green'>Data telah aktif</font>";
    }

    public function error_active_msg(){
        return "<font color='red'>Data gagal/sudah aktif</font>";
    }
}
?>