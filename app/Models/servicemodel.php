<?php

namespace App\Models;

use CodeIgniter\Model;
use TCPDF;

class servicemodel extends Model

{
    // protected $table = 'user';
    // protected $primaryKey = 'id_user';
    // protected $allowedFields = ['foto'];
    protected $table = 'pesanan';
    protected $primaryKey = 'id_pesanan';
    protected $table2 = 'transaksi';
    protected $primaryKey2 = 'id_transaksi';
    protected $allowedFields = [
        'no_transaksi', 'tanggal', 'nama_pemilik', 'jenis_service', 'harga', 'status', 'bayaran', 'kembalian'
    ];


	public function tampil($tabel){
     return $this->db->table($tabel)  
     				 ->get()
          			 ->getResult();   

	}
    public function tampil_urut($tabel){
        return $this->db->table($tabel)
            ->orderBy('id_donasi', 'DESC')
            ->get()
            ->getResult();   
    }
    public function join($tabel1, $tabel2, $on){
     return $this->db->table($tabel1)  
                     ->join($tabel2,$on,'left')
                     ->get()
                     ->getResult();   

    }
     public function join1($tabel1, $tabel2, $on){
     return $this->db->table($tabel1)  
                     ->join($tabel2,$on,'inner')
                     ->get()
                     ->getResult();   

    }
    public function joinWhere($tabel1, $tabel2, $on, $where){
     return $this->db->table($tabel1, $where)  
                     ->join($tabel2,$on,'left')
                     ->get()
                     ->getRow();   

    }
    public function joinWherer($tabel1, $tabel2, $on, $where){
     return $this->db->table($tabel1)  
                     ->join($tabel2,$on,'left')
                     ->getWhere($where)
                     ->getRow();   

    }
	public function tambah($table,$isi){
		return $this->db->table($table)
						->insert($isi);
	}
    public function upload($file){
		 $imageName = $file->getName();
         $file->move(ROOTPATH . 'public/img', $imageName);
	}
	public function hapus($table,$where){
        return $this->db->table($table)
                        ->delete($where);
    }
    public function edit($tabel,$isi,$where){
        return $this->db->table($tabel)
                        ->update($isi,$where);
    }
    public function updatee($tabel,$isi){
        return $this->db->table($tabel)
                        ->update($isi);
    }
    public function getWhere($tabel,$where){
        return $this->db->table($tabel)
                        ->getwhere($where)
                        ->getRow();
    }

    public function joinWhererr($tabel1, $tabel2, $on, $where){
        return $this->db->table($tabel1)  
                        ->join($tabel2, $on,'inner')
                        ->getWhere($where)
                        ->getResult();   
   
       } 

        public function join3($tabel1, $tabel2, $tabel3, $on, $on2,$where){
            return $this->db->table($tabel1)  
                            ->join($tabel2, $on,'inner')
                            ->join($tabel3, $on2,'inner')
                            ->getWhere($where)
                            ->getResult();   
    
        }

        public function join3s($tabel1, $tabel2, $tabel3, $on, $on2){
            return $this->db->table($tabel1)  
                            ->join($tabel2, $on,'inner')
                            ->join($tabel3, $on2,'inner')
                            ->get()
                            ->getResult();   
    
        }
        public function getById($id)
        {
            return $this->where('id_user', $id)->first();
        }

        public function betweenjoin1($table1,$table2,$on1,$tanggalAwal, $tanggalAkhir)
{
        return $this->db->table($table1)
        ->join($table2,$on1)
        ->where('transaksi.tanggal>=', $tanggalAwal)
        ->where('transaksi.tanggal<=', $tanggalAkhir)
        ->get()
        ->getResult();
}

public function getTotalOrders()
{
    return $this->countAll();
}


public function edit2($table2, $data, $where)
{
    return $this->db->table($table2)->update($data, $where);
}

public function getOrderById($id)
{
    return $this->where('id_pesanan', $id)->get()->getRowArray();
}

public function insertTransaksi($data)
{
    $transaksiTable = $this->db->table('transaksi');
    return $transaksiTable->insert($data);
}

public function deletePesanan($id)
{
    return $this->where('id_pesanan', $id)->delete();
}

public function getLatestTransaksi()
    {
        return $this->db->table('transaksi')->orderBy('id_transaksi', 'DESC')->limit(1)->get()->getRowArray();
    }

    public function checkTransaksiExists($no_transaksi)
    {
        return $this->db->table('transaksi')
            ->where('no_transaksi', $no_transaksi)
            ->countAllResults() > 0;
    }

    public function getOrdersByUser($id_user)
    {
        return $this->where('id_user', $id_user)->findAll();
    }

    public function getAllOrders()
    {
        return $this->findAll(); // Mengambil semua data
    }

    public function updateTransaksi($id, $data)
    {
        return $this->update($id, $data);
    }

    public function getActiveTechnicians()
    {
        return $this->db->table('teknisi')
                        ->where('status', 'Aktif')
                        ->get()
                        ->getResult();
    }
    

    public function getTechnicianNameById($id_teknisi)
{
    return $this->db->table('teknisi')
                    ->select('nama_teknisi')
                    ->where('id_teknisi', $id_teknisi)
                    ->get()
                    ->getRowArray()['nama_teknisi'];
}

public function getAllTechnicians()
{
    return $this->db->table('teknisi')->get()->getResult();
}

public function getTransactionById($id)
{
    return $this->where('id_transaksi', $id)->first();
}

public function getRecentOrders()
{
    // Mengurutkan berdasarkan id_pesanan dalam urutan menurun
    return $this->orderBy('id_pesanan', 'DESC')->findAll();
}


public function generateNoTransaksi($kodeToko = '100') {
    $today = date('ymd'); // Format tahun, bulan, tanggal
    $prefix = $kodeToko . $today;
    $query = $this->db->query("SELECT no_transaksi FROM " . $this->table2 . " WHERE no_transaksi LIKE '" . $prefix . "%' ORDER BY no_transaksi DESC LIMIT 1");
    
    if (!$query) {
        die("Query Error: " . $this->db->error()['message']);
    }
    
    $row = $query->getRow();
    if ($row) {
        $lastCode = $row->no_transaksi;
        $lastNumber = (int)substr($lastCode, -3); // Mengambil dua angka terakhir
        $newNumber = $lastNumber + 1;
        $newCode = $prefix . str_pad($newNumber, 3, '0', STR_PAD_LEFT);
    } else {
        $newCode = $prefix . '100';
    }
    
    return $newCode;
}

public function tampil2($table2)
{
    return $this->db->table($table2)->orderBy('id_transaksi', 'DESC')->get()->getResultArray();
}
// public function getActivityLogs()
// {
//     return $this->db->table('activity_log')
//                     ->join('user', 'activity_log.id_user = user.id_user', 'left')
//                     ->select('activity_log.*, user.nama_user')
//                     ->orderBy('activity_log.timestamp', 'DESC')
//                     ->get()
//                     ->getResult();
// }
}



