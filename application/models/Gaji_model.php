<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Gaji_model extends CI_Model{
    private $pengguna = 'guru';
    private $absen = 'absensi';

    public function getAbsen($bulan,$tahun,$nip){
        if (!empty($nip)){
            $sql="SELECT nip, count(1) as hadir, sum(TIMESTAMPDIFF(HOUR, CONCAT(DATE(masuk),' 13:00:00'), keluar)) AS kjm FROM absensi WHERE status='1' AND nip='".$nip."' AND MONTH(masuk)='".$bulan."' AND YEAR(masuk)='".$tahun."' GROUP BY nip";
        }else{
            $sql="SELECT nip, count(1) as hadir, sum(TIMESTAMPDIFF(HOUR, CONCAT(DATE(masuk),' 13:00:00'), keluar)) AS kjm FROM absensi WHERE status='1' AND MONTH(masuk)='".$bulan."' AND YEAR(masuk)='".$tahun."' GROUP BY nip";
        }
        $query=$this->db->query($sql);
        return $query->result_array();
    }
    
    public function getCuti($bulan,$tahun,$nip){
        if (!empty($nip)){
            $sql="SELECT nip,TIMESTAMPDIFF(DAY, awal, akhir) AS cuti FROM cuti WHERE status='1' AND nip='".$nip."' AND MONTH(awal)='".$bulan."' AND YEAR(awal)='".$tahun."'  GROUP BY nip";
        }else{
            $sql="SELECT nip,TIMESTAMPDIFF(DAY, awal, akhir) AS cuti FROM cuti WHERE status='1' AND MONTH(awal)='".$bulan."' AND YEAR(awal)='".$tahun."' GROUP BY nip";
        }
        $query=$this->db->query($sql);
        return $query->result_array();
    }
    
    public function getGaji($nip){
        if (!empty($nip)){
            $sql="SELECT a.nip,a.nama,a.nikah, a.anak, a.pokok,b.* FROM guru a INNER JOIN jabatan b ON a.jabatan=b.namajabatan WHERE nip='".$nip."'";
        }else{
            $sql="SELECT a.nip,a.nama,a.nikah, a.anak, a.pokok,b.* FROM guru a INNER JOIN jabatan b ON a.jabatan=b.namajabatan";
        }
        $query=$this->db->query($sql);
        return $query->result_array();
    }
    
    public function listGaji($bulan,$tahun,$nip){
        $data["absen"]=$this->getAbsen($bulan,$tahun,$nip);
        $data["cuti"]=$this->getCuti($bulan,$tahun,$nip);
        $data["gaji"]=$this->getGaji($nip);
        return $data;
    }
}
?>