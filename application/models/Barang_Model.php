<?php if (!defined('BASEPATH')) exit('No direct script access allowed');
class Barang_Model extends CI_Model
{
  public function __construct()
  {
    parent::__construct();
  }

  public function all_daftar_barang_bahan_baku()
  {
    return $this->db->query("SELECT * FROM tb_barang WHERE id_jenis = '3'")->result_array();
  }

  public function all_daftar_barang_makanandanminuman()
  {
    return $this->db->query("SELECT * FROM tb_barang WHERE id_jenis <> '3'")->result_array();
  }

  public function all_barang()
  {
    return $this->db->query('SELECT tb_barang.id_barang, tb_barang.barang, tb_barang.harga, tb_barang.durasi_exp, tb_jenis.jenis, tb_satuan.satuan FROM tb_barang INNER JOIN tb_jenis ON tb_barang.id_jenis=tb_jenis.id INNER JOIN tb_satuan ON tb_satuan.id_satuan=tb_barang.id_satuan')->result_array();
  }

  public function all_barang_by_id($id_barang)
  {
    return $this->db->query("SELECT tb_barang.id_barang, tb_barang.qrcode, tb_barang.barang, tb_barang.harga, tb_barang.id_jenis, tb_jenis.jenis, tb_satuan.satuan, tb_satuan.id_satuan, tb_stok.stok FROM tb_barang INNER JOIN tb_jenis ON tb_barang.id_jenis=tb_jenis.id INNER JOIN tb_satuan ON tb_satuan.id_satuan=tb_barang.id_satuan INNER JOIN tb_stok ON tb_barang.id_barang=tb_stok.id_barang WHERE tb_barang.id_barang='$id_barang'")->result_array();
  }

  public function all_barang_by_idJenis($id_jenis)
  {
    return $this->db->query("SELECT * FROM tb_barang WHERE id_jenis = '$id_jenis'")->result_array();
  }

  public function all_barang_by_perTanggal($dr_tgl, $sm_tgl, $method)
  {
    if ($method == "persediaan") {
      return $this->db->query("SELECT tb_header_persediaan_barang.tanggal_persediaan, tb_barang.barang, tb_detail_persediaan_barang.harga, tb_detail_persediaan_barang.qty, tb_satuan.satuan FROM tb_barang INNER JOIN tb_detail_persediaan_barang ON tb_barang.id_barang=tb_detail_persediaan_barang.id_barang INNER JOIN tb_header_persediaan_barang ON tb_header_persediaan_barang.id_persediaan=tb_detail_persediaan_barang.id_persediaan INNER JOIN tb_satuan ON tb_satuan.id_satuan=tb_barang.id_satuan WHERE tb_header_persediaan_barang.tanggal_persediaan >= '$dr_tgl' AND tb_header_persediaan_barang.tanggal_persediaan <= '$sm_tgl' ORDER BY tb_header_persediaan_barang.tanggal_persediaan ASC")->result_array();
    } else if ($method == "penjualan") {
      return $this->db->query("SELECT tb_header_penjualan_barang.tanggal_penjualan, tb_barang.barang, tb_detail_penjualan_barang.harga, tb_detail_penjualan_barang.qty, tb_satuan.satuan FROM tb_barang INNER JOIN tb_detail_penjualan_barang ON tb_barang.id_barang=tb_detail_penjualan_barang.id_barang INNER JOIN tb_header_penjualan_barang ON tb_header_penjualan_barang.id_penjualan=tb_detail_penjualan_barang.id_penjualan INNER JOIN tb_satuan ON tb_satuan.id_satuan=tb_barang.id_satuan WHERE tb_header_penjualan_barang.tanggal_penjualan >= '$dr_tgl' AND tb_header_penjualan_barang.tanggal_penjualan <= '$sm_tgl' ORDER BY tb_header_penjualan_barang.tanggal_penjualan ASC")->result_array();
    }
  }

  public function all_barang_by_perBulan($per_bulan, $per_tahun, $method)
  {
    if ($method == "persediaan") {
      return $this->db->query("SELECT tb_header_persediaan_barang.tanggal_persediaan, tb_barang.barang, tb_detail_persediaan_barang.harga, tb_detail_persediaan_barang.qty, tb_satuan.satuan FROM tb_barang INNER JOIN tb_detail_persediaan_barang ON tb_barang.id_barang=tb_detail_persediaan_barang.id_barang INNER JOIN tb_header_persediaan_barang ON tb_header_persediaan_barang.id_persediaan=tb_detail_persediaan_barang.id_persediaan INNER JOIN tb_satuan ON tb_satuan.id_satuan=tb_barang.id_satuan WHERE EXTRACT(YEAR FROM tb_header_persediaan_barang.tanggal_persediaan) = '$per_tahun' AND EXTRACT(MONTH FROM tb_header_persediaan_barang.tanggal_persediaan)='$per_bulan' ORDER BY tb_header_persediaan_barang.tanggal_persediaan ASC")->result_array();
    } else {
      return $this->db->query("SELECT tb_header_penjualan_barang.tanggal_penjualan, tb_barang.barang, tb_detail_penjualan_barang.harga, tb_detail_penjualan_barang.qty, tb_satuan.satuan FROM tb_barang INNER JOIN tb_detail_penjualan_barang ON tb_barang.id_barang=tb_detail_penjualan_barang.id_barang INNER JOIN tb_header_penjualan_barang ON tb_header_penjualan_barang.id_penjualan=tb_detail_penjualan_barang.id_penjualan INNER JOIN tb_satuan ON tb_satuan.id_satuan=tb_barang.id_satuan WHERE EXTRACT(YEAR FROM tb_header_penjualan_barang.tanggal_penjualan) = '$per_tahun' AND EXTRACT(MONTH FROM tb_header_penjualan_barang.tanggal_penjualan)='$per_bulan' ORDER BY tb_header_penjualan_barang.tanggal_penjualan ASC")->result_array();
    }
  }

  public function all_barang_by_perTahun($per_tahun, $method)
  {
    if ($method == "persediaan") {
      return $this->db->query("SELECT tb_header_persediaan_barang.tanggal_persediaan, tb_barang.barang, tb_detail_persediaan_barang.harga, tb_detail_persediaan_barang.qty, tb_satuan.satuan FROM tb_barang INNER JOIN tb_detail_persediaan_barang ON tb_barang.id_barang=tb_detail_persediaan_barang.id_barang INNER JOIN tb_header_persediaan_barang ON tb_header_persediaan_barang.id_persediaan=tb_detail_persediaan_barang.id_persediaan INNER JOIN tb_satuan ON tb_satuan.id_satuan=tb_barang.id_satuan WHERE EXTRACT(YEAR FROM tb_header_persediaan_barang.tanggal_persediaan) = '$per_tahun' ORDER BY tb_header_persediaan_barang.tanggal_persediaan ASC")->result_array();
    } else {
      return $this->db->query("SELECT tb_header_penjualan_barang.tanggal_penjualan, tb_barang.barang, tb_detail_penjualan_barang.harga, tb_detail_penjualan_barang.qty, tb_satuan.satuan FROM tb_barang INNER JOIN tb_detail_penjualan_barang ON tb_barang.id_barang=tb_detail_penjualan_barang.id_barang INNER JOIN tb_header_penjualan_barang ON tb_header_penjualan_barang.id_penjualan=tb_detail_penjualan_barang.id_penjualan INNER JOIN tb_satuan ON tb_satuan.id_satuan=tb_barang.id_satuan WHERE EXTRACT(YEAR FROM tb_header_penjualan_barang.tanggal_penjualan) = '$per_tahun' ORDER BY tb_header_penjualan_barang.tanggal_penjualan ASC")->result_array();
    }
  }

  public function jumlah_makanan_ringan()
  {
    $this->db->select('COUNT(id_barang) as jumlah_makanan_ringan');
    $this->db->where('id_jenis', 1);
    $this->db->from('tb_barang');
    return $this->db->get()->row()->jumlah_makanan_ringan;
  }

  public function jumlah_minuman()
  {
    $this->db->select('COUNT(id_barang) as jumlah_minuman');
    $this->db->where('id_jenis', 2);
    $this->db->from('tb_barang');
    return $this->db->get()->row()->jumlah_minuman;
  }

  public function jumlah_bolu()
  {
    $this->db->select('COUNT(id_barang) as jumlah_bolu');
    $this->db->where('id_jenis', 4);
    $this->db->from('tb_barang');
    return $this->db->get()->row()->jumlah_bolu;
  }

  public function jumlah_roti()
  {
    $this->db->select('COUNT(id_barang) as jumlah_roti');
    $this->db->where('id_jenis', 5);
    $this->db->from('tb_barang');
    return $this->db->get()->row()->jumlah_roti;
  }

  public function jumlah_kue_tradisional()
  {
    $this->db->select('COUNT(id_barang) as jumlah_kue_tradisional');
    $this->db->where('id_jenis', 6);
    $this->db->from('tb_barang');
    return $this->db->get()->row()->jumlah_kue_tradisional;
  }

  public function jumlah_bahan_baku()
  {
    $this->db->select('COUNT(id_barang) as jumlah_bahan_baku');
    $this->db->where('id_jenis', 3);
    $this->db->from('tb_barang');
    return $this->db->get()->row()->jumlah_bahan_baku;
  }


  public function jenis_barang()
  {
    return $this->db->get('tb_jenis')->result_array();
  }

  public function satuan()
  {
    return $this->db->get('tb_satuan')->result_array();
  }

  public function add()
  {
    $data_barang = [
      "id_barang"       => $this->input->post('id_barang', true),
      "qrcode"          => $this->input->post('id_barang', true),
      "id_jenis"        => $this->input->post('id_jenis', true),
      "barang"          => $this->input->post('barang', true),
      "harga"           => str_replace(".", "", $this->input->post('harga', true)),
      "id_satuan"       => $this->input->post('id_satuan', true),
      "durasi_exp"      => $this->input->post('durasi', true)
    ];
    $this->db->insert('tb_barang', $data_barang);


    $data_stok = [
      "id_barang"       => $this->input->post('id_barang', true),
      "stok"            => 0
    ];
    $this->db->insert('tb_stok', $data_stok);
  }

  public function delete($id_barang)
  {
    $this->db->where('id_barang', $id_barang);
    $this->db->delete('tb_barang');

    $this->db->where('id_barang', $id_barang);
    $this->db->delete('tb_stok');
  }

  public function edit()
  {
    $data_edit = [
      "id_barang"       => $this->input->post('id_barang', true),
      "id_jenis"        => $this->input->post('id_jenis', true),
      "barang"          => $this->input->post('barang', true),
      "harga"           => str_replace(".", "", $this->input->post('harga', true)),
      "id_satuan"       => $this->input->post('id_satuan', true),
    ];
    $this->db->where("id_barang", $this->input->post('id_barang', true));
    $this->db->update('tb_barang', $data_edit);
  }




  public function total_pembelian_barang()
  {
    $tahun = date('Y');

    return $this->db->query("SELECT tb_header_pembelian_brg.tanggal, tb_detail_pembelian_brg.id_brg, tb_detail_pembelian_brg.qty, tb_barang.harga_satuan FROM tb_header_pembelian_brg INNER JOIN tb_detail_pembelian_brg ON tb_header_pembelian_brg.id_pembelian=tb_detail_pembelian_brg.id_pembelian INNER JOIN tb_barang ON tb_barang.id_barang=tb_detail_pembelian_brg.id_brg WHERE EXTRACT(YEAR FROM tb_header_pembelian_brg.tanggal) = '$tahun'")->result_array();
  }


  public function opsi()
  {
    $data_opsi = [
      "nip"        => $this->input->post('no', true),
      "tanggal"    => date('Y-m-d'),
      "opsi"       => $this->input->post('opsi', true),
      "keterangan" => $this->input->post('keterangan', true)
    ];
    $this->db->insert('tb_opsi', $data_opsi);


    $data_brg = [
      "status_v"    => "Pending"
    ];
    $this->db->where("no", $this->input->post('no', true));
    $this->db->update('tb_m_brg', $data_brg);
  }

  public function select_pemberitahuan($no)
  {
    return $this->db->query("SELECT tb_m_brg.status_v, tb_opsi.nip, tb_opsi.opsi, tb_opsi.keterangan FROM tb_m_brg INNER JOIN tb_opsi ON tb_m_brg.no=tb_opsi.nip WHERE tb_m_brg.no = '$no'")->result_array();
  }

  // Master Barang
  public function kode_barang()
  {
    $q = $this->db->query("SELECT MAX(RIGHT(id_barang,3)) AS kd_max FROM tb_barang");
    $kd = "";
    if ($q->num_rows() > 0) {
      foreach ($q->result() as $k) {
        $tmp = ((int)$k->kd_max) + 1;
        $kd = sprintf("%03s", $tmp);
      }
    } else {
      $kd = "BRG-SBC-" . date('y') . "-001";
    }
    date_default_timezone_set('Asia/Jakarta');
    $a = "BRG-SBC-" . date('y') . "-" . $kd;
    return $a;
  }

  public function add_m_brg()
  {
    $data_brg = [
      "no"              => $this->input->post('id_brg', true),
      "jenis"           => $this->input->post('jenis', true)
    ];
    $this->db->insert('tb_m_brg', $data_brg);
  }

  public function delete_m_brg($no)
  {
    $this->db->where('no', $no);
    $this->db->delete('tb_m_brg');
  }

  public function edit_m_brg()
  {
    $data = [
      "no"       => $this->input->post('no', true),
      "jenis"    => $this->input->post('jenis', true),
      "status_v" => ""
    ];
    $this->db->where("no", $this->input->post('no', true));
    $this->db->update('tb_m_brg', $data);


    $this->db->where('nip', $this->input->post('no', true));
    $this->db->delete('tb_opsi');
  }


  // End Master Barang



  // Pembelian Barang
  public function all_barang_masuk()
  {
    $this->db->select('tanggal');
    $this->db->distinct();
    $this->db->order_by('tanggal', 'DESC');
    return $this->db->get('tb_barang_masuk')->result_array();
  }


  function select_all_by_tanggal($tanggal)
  { //untuk menampilkan data tanggal
    return $this->db->query("SELECT tb_barang_masuk.tanggal, tb_barang.barang, tb_barang.satuan,tb_barang_masuk.qty, tb_barang.harga_satuan FROM tb_barang_masuk INNER JOIN tb_barang ON tb_barang.id_barang=tb_barang_masuk.id_barang WHERE tanggal = '$tanggal' ORDER BY tb_barang_masuk.tanggal DESC")->result_array();
  }

  public function add_barang_masuk()
  {
    $data_barang_masuk = [
      "tanggal"         => $this->input->post('tanggal', true),
      "id_barang"       => $this->input->post('id_barang', true),
      "qty"             => $this->input->post('qty', true)
    ];
    $this->db->insert('tb_barang_masuk', $data_barang_masuk);

    //Update jumlah bertambah pada tb_barang
    $this->db->set('jumlah', 'jumlah+' . $this->input->post('qty', true), FALSE);
    $this->db->where("id_barang", $this->input->post('id_barang', true));
    $this->db->update('tb_barang');
  }
  // End Pembelian Barang


  // Peminjaman Barang
  public function all_v_pembelian_brg()
  {
    $this->db->select('tanggal');
    $this->db->distinct();
    $this->db->order_by('tanggal', 'DESC');
    return $this->db->get('tb_header_v_pembelian_brg')->result_array();
  }

  public function filter_pembelian_per_tanggal($tanggal)
  {
    return $this->db->query("SELECT * FROM tb_header_v_pembelian_brg WHERE tanggal = '$tanggal'")->result_array();
  }

  public function filter_pembelian_per_id($id)
  {
    return $this->db->query("SELECT tb_header_v_pembelian_brg.id_pembelian, tb_header_v_pembelian_brg.tanggal, tb_header_v_pembelian_brg.status_v, tb_header_v_pembelian_brg.alasan, tb_detail_v_pembelian_brg.id_brg, tb_detail_v_pembelian_brg.qty, tb_barang.barang, tb_barang.satuan, tb_barang.harga_satuan FROM tb_header_v_pembelian_brg INNER JOIN tb_detail_v_pembelian_brg ON tb_header_v_pembelian_brg.id_pembelian=tb_detail_v_pembelian_brg.id_pembelian INNER JOIN tb_barang ON tb_barang.id_barang=tb_detail_v_pembelian_brg.id_brg WHERE tb_header_v_pembelian_brg.id_pembelian = '$id'")->result_array();
  }

  public function kode_pembelian()
  {
    $q = $this->db->query("SELECT MAX(LEFT(id_pembelian,4)) AS kd_max FROM tb_header_v_pembelian_brg");
    $kd = "";
    if ($q->num_rows() > 0) {
      foreach ($q->result() as $k) {
        $tmp = ((int)$k->kd_max) + 1;
        $kd = sprintf("%04s", $tmp);
      }
    } else {
      $kd = "0001-BKD-BRG-" . date('Y');
    }
    date_default_timezone_set('Asia/Jakarta');
    $a = $kd . "-BKD-BRG-" . date('Y');
    return $a;
  }

  public function tambah_verifikasi_pembelian_barang()
  {
    for ($i = 0; $i < count($this->input->post('id_barang', true)); $i++) {
      $this->db->set('id_pembelian', $this->input->post('id_pembelian', true));
      $this->db->set('id_brg', $this->input->post('id_barang', true)[$i]);
      $this->db->set('qty', $this->input->post('qty', true)[$i]);
      $this->db->insert('tb_detail_v_pembelian_brg');
    }

    $data_header = [
      "id_pembelian" => $this->input->post('id_pembelian', true),
      "tanggal"       => date('Y-m-d'),
      "status_v"      => "Belum",
      "alasan"        => "-"
    ];
    $this->db->insert('tb_header_v_pembelian_brg', $data_header);
  }


  public function tambah_pembelian()
  {
    for ($i = 0; $i < count($this->input->post('id_barang', true)); $i++) {
      $this->db->set('id_pembelian', $this->input->post('id_pembelian', true));
      $this->db->set('id_brg', $this->input->post('id_barang', true)[$i]);
      $this->db->set('qty', $this->input->post('qty', true)[$i]);
      $this->db->insert('tb_detail_pembelian_brg');

      //Update jumlah bertambah pada tb_atk
      $this->db->set('jumlah', 'jumlah+' . $this->input->post('qty', true)[$i], FALSE);
      $this->db->where("id_barang", $this->input->post('id_barang', true)[$i]);
      $this->db->update('tb_barang');
    }

    $data_header = [
      "id_pembelian"     => $this->input->post('id_pembelian', true),
      "tanggal"          => date('Y-m-d')
    ];
    $this->db->insert('tb_header_pembelian_brg', $data_header);


    // Ubah status menjadi Sudah Verifikasi
    $data = [
      "status_v"       => "Sudah",
    ];
    $this->db->where("id_pembelian", $this->input->post('id_pembelian', true));
    $this->db->update('tb_header_v_pembelian_brg', $data);
  }


  public function tolak_pembelian()
  {
    $data = [
      "status_v"       => "Ditolak",
      "alasan"         => $this->input->post('alasan', true)
    ];
    $this->db->where("id_pembelian", $this->input->post('id_pembelian', true));
    $this->db->update('tb_header_v_pembelian_brg', $data);
  }

  public function all_v_peminjaman_barang()
  {
    $this->db->select('tanggal');
    $this->db->distinct();
    $this->db->order_by('tanggal', 'DESC');
    return $this->db->get('tb_header_v_peminjaman_brg')->result_array();
  }

  public function all_peminjaman_barang()
  {
    $this->db->select('tanggal');
    $this->db->distinct();
    $this->db->order_by('tanggal', 'DESC');
    return $this->db->get('tb_header_barang_keluar')->result_array();
  }

  function filter_v_tanggal($tanggal)
  {
    return $this->db->query("SELECT tb_header_v_peminjaman_brg.id_peminjaman, tb_header_v_peminjaman_brg.nip, tb_header_v_peminjaman_brg.status_v, tb_pegawai.nama, tb_pegawai.bidang FROM tb_header_v_peminjaman_brg INNER JOIN tb_pegawai ON tb_header_v_peminjaman_brg.nip=tb_pegawai.nip WHERE tb_header_v_peminjaman_brg.tanggal = '$tanggal'")->result_array();
  }

  function filter_tanggal($tanggal)
  {
    return $this->db->query("SELECT tb_header_barang_keluar.id_barang_keluar, tb_header_barang_keluar.nip, tb_pegawai.nama FROM tb_header_barang_keluar INNER JOIN tb_pegawai ON tb_header_barang_keluar.nip=tb_pegawai.nip WHERE tb_header_barang_keluar.tanggal = '$tanggal'")->result_array();
  }

  function filter_v_nip($id)
  {
    return $this->db->query("SELECT tb_header_v_peminjaman_brg.tanggal, tb_header_v_peminjaman_brg.nip, tb_header_v_peminjaman_brg.alasan, tb_header_v_peminjaman_brg.status_v, tb_pegawai.nama FROM tb_header_v_peminjaman_brg INNER JOIN tb_pegawai ON tb_header_v_peminjaman_brg.nip=tb_pegawai.nip WHERE tb_header_v_peminjaman_brg.id_peminjaman='$id'")->result_array();
  }

  function filter_nip($id)
  {
    return $this->db->query("SELECT tb_header_barang_keluar.tanggal, tb_header_barang_keluar.nip, tb_pegawai.nama FROM tb_header_barang_keluar INNER JOIN tb_pegawai ON tb_header_barang_keluar.nip=tb_pegawai.nip WHERE tb_header_barang_keluar.id_barang_keluar='$id'")->result_array();
  }

  function filter_v_id($id)
  {
    return $this->db->query("SELECT tb_header_v_peminjaman_brg.id_peminjaman, tb_detail_v_peminjaman_brg.id_brg, tb_detail_v_peminjaman_brg.qty, tb_barang.barang, tb_barang.satuan FROM tb_header_v_peminjaman_brg INNER JOIN tb_detail_v_peminjaman_brg ON tb_header_v_peminjaman_brg.id_peminjaman=tb_detail_v_peminjaman_brg.id_peminjaman INNER JOIN tb_barang ON tb_barang.id_barang=tb_detail_v_peminjaman_brg.id_brg  WHERE tb_header_v_peminjaman_brg.id_peminjaman='$id'")->result_array();
  }

  function filter_id($id)
  {
    return $this->db->query("SELECT tb_header_barang_keluar.id_barang_keluar, tb_detail_barang_keluar.id_barang, tb_detail_barang_keluar.qty, tb_barang.barang, tb_barang.satuan FROM tb_header_barang_keluar INNER JOIN tb_detail_barang_keluar ON tb_header_barang_keluar.id_barang_keluar=tb_detail_barang_keluar.id_barang_keluar INNER JOIN tb_barang ON tb_barang.id_barang=tb_detail_barang_keluar.id_barang  WHERE tb_header_barang_keluar.id_barang_keluar='$id'")->result_array();
  }

  public function kode_barang_keluar()
  {

    $q = $this->db->query("SELECT MAX(LEFT(id_peminjaman,4)) AS kd_max FROM tb_header_v_peminjaman_brg");
    $kd = "";
    if ($q->num_rows() > 0) {
      foreach ($q->result() as $k) {
        $tmp = ((int)$k->kd_max) + 1;
        $kd = sprintf("%04s", $tmp);
      }
    } else {
      $kd = "0001-BKD-P-BRG-" . date('Y');
    }
    date_default_timezone_set('Asia/Jakarta');
    $a = $kd . "-BKD-P-BRG-" . date('Y');
    return $a;
  }

  public function tambah_verifikasi_peminjaman_brg()
  {
    if ($this->input->post('kebutuhan', true) == "Mendesak") {
      for ($i = 0; $i < count($this->input->post('kode_brg', true)); $i++) {
        $this->db->set('id_peminjaman', $this->input->post('id_barang_keluar', true));
        $this->db->set('id_brg', $this->input->post('kode_brg', true)[$i]);
        $this->db->set('qty', $this->input->post('qty', true)[$i]);
        $this->db->insert('tb_detail_v_peminjaman_brg');
      }
      $data_header = [
        "id_peminjaman"    => $this->input->post('id_barang_keluar', true),
        "tanggal"          => date('Y-m-d'),
        "nip"              => $this->input->post('nip', true),
        "kebutuhan"        => $this->input->post('kebutuhan', true),
        "status_v"         => "mendesak",
        "alasan"           => "-"
      ];
      $this->db->insert('tb_header_v_peminjaman_brg', $data_header);

      $data_header2 = [
        "id_barang_keluar"    => $this->input->post('id_barang_keluar', true),
        "id_barcode"       => $this->input->post('id_barang_keluar', true),
        "tanggal"          => date('Y-m-d'),
        "nip"              => $this->input->post('nip', true)
      ];
      $this->db->insert('tb_header_barang_keluar', $data_header2);

      for ($i = 0; $i < count($this->input->post('kode_brg', true)); $i++) {
        $this->db->set('id_barang_keluar', $this->input->post('id_barang_keluar', true));
        $this->db->set('id_barang', $this->input->post('kode_brg', true)[$i]);
        $this->db->set('qty', $this->input->post('qty', true)[$i]);
        $this->db->insert('tb_detail_barang_keluar');

        //Update jumlah berkurang pada tb_brg
        $this->db->set('jumlah', 'jumlah-' . $this->input->post('qty', true)[$i], FALSE);
        $this->db->where("id_barang", $this->input->post('kode_brg', true)[$i]);
        $this->db->update('tb_barang');
      }
    } else {
      for ($i = 0; $i < count($this->input->post('kode_brg', true)); $i++) {
        $this->db->set('id_peminjaman', $this->input->post('id_barang_keluar', true));
        $this->db->set('id_brg', $this->input->post('kode_brg', true)[$i]);
        $this->db->set('qty', $this->input->post('qty', true)[$i]);
        $this->db->insert('tb_detail_v_peminjaman_brg');
      }

      $data_header = [
        "id_peminjaman"    => $this->input->post('id_barang_keluar', true),
        "tanggal"          => date('Y-m-d'),
        "nip"              => $this->input->post('nip', true),
        "kebutuhan"        => $this->input->post('kebutuhan', true),
        "status_v"         => "Belum",
        "alasan"           => "-"
      ];
      $this->db->insert('tb_header_v_peminjaman_brg', $data_header);
    }
  }

  public function tambah_peminjaman()
  {
    for ($i = 0; $i < count($this->input->post('kode_brg', true)); $i++) {
      $this->db->set('id_barang_keluar', $this->input->post('id_peminjaman', true));
      $this->db->set('id_barang', $this->input->post('kode_brg', true)[$i]);
      $this->db->set('qty', $this->input->post('qty', true)[$i]);
      $this->db->insert('tb_detail_barang_keluar');

      //Update jumlah berkurang pada tb_brg
      $this->db->set('jumlah', 'jumlah-' . $this->input->post('qty', true)[$i], FALSE);
      $this->db->where("id_barang", $this->input->post('kode_brg', true)[$i]);
      $this->db->update('tb_barang');
    }

    $data_header = [
      "id_barang_keluar"    => $this->input->post('id_peminjaman', true),
      // "id_barcode"       => $this->input->post('id_barang_keluar', true),
      "tanggal"          => date('Y-m-d'),
      "nip"              => $this->input->post('nip', true)
    ];
    $this->db->insert('tb_header_barang_keluar', $data_header);



    // Ubah status menjadi Sudah Verifikasi
    $data = [
      "status_v"       => "Sudah",
    ];
    $this->db->where("id_peminjaman", $this->input->post('id_peminjaman', true));
    $this->db->update('tb_header_v_peminjaman_brg', $data);
  }


  public function tolak_peminjaman()
  {
    $data = [
      "status_v"       => "Ditolak",
      "alasan"         => $this->input->post('alasan', true)
    ];
    $this->db->where("id_peminjaman", $this->input->post('id_peminjaman', true));
    $this->db->update('tb_header_v_peminjaman_brg', $data);
  }

  // End Peminjaman Barang


  // Pengembalian Barang
  public function all_pengembalian_barang()
  {
    $this->db->select('tanggal');
    $this->db->distinct();
    $this->db->order_by('tanggal', 'DESC');
    return $this->db->get('tb_header_pengembalian_barang')->result_array();
  }

  function filter_tanggal_pengembalian($tanggal)
  {
    return $this->db->query("SELECT tb_header_pengembalian_barang.id_pengembalian, tb_header_pengembalian_barang.nip, tb_pegawai.nama FROM tb_header_pengembalian_barang INNER JOIN tb_pegawai ON tb_header_pengembalian_barang.nip=tb_pegawai.nip WHERE tb_header_pengembalian_barang.tanggal = '$tanggal'")->result_array();
  }

  function filter_nip_pengembalian($id)
  {
    return $this->db->query("SELECT tb_header_pengembalian_barang.tanggal, tb_header_pengembalian_barang.nip, tb_pegawai.nama FROM tb_header_pengembalian_barang INNER JOIN tb_pegawai ON tb_header_pengembalian_barang.nip=tb_pegawai.nip WHERE tb_header_pengembalian_barang.id_pengembalian='$id'")->result_array();
  }

  function filter_id_pengembalian($id)
  {
    return $this->db->query("SELECT tb_header_pengembalian_barang.id_pengembalian, tb_detail_pengembalian_barang.id_barang, tb_detail_pengembalian_barang.qty, tb_detail_pengembalian_barang.keterangan, tb_barang.barang, tb_barang.satuan FROM tb_header_pengembalian_barang INNER JOIN tb_detail_pengembalian_barang ON tb_header_pengembalian_barang.id_pengembalian=tb_detail_pengembalian_barang.id_pengembalian INNER JOIN tb_barang ON tb_barang.id_barang=tb_detail_pengembalian_barang.id_barang  WHERE tb_header_pengembalian_barang.id_pengembalian='$id'")->result_array();
  }

  public function kode_barang_retur()
  {
    $q = $this->db->query("SELECT MAX(LEFT(id_pengembalian,4)) AS kd_max FROM tb_header_pengembalian_barang");
    $kd = "";
    if ($q->num_rows() > 0) {
      foreach ($q->result() as $k) {
        $tmp = ((int)$k->kd_max) + 1;
        $kd = sprintf("%04s", $tmp);
      }
    } else {
      $kd = "0001-BKD-R-BRG-" . date('Y');
    }
    date_default_timezone_set('Asia/Jakarta');
    $a = $kd . "-BKD-R-BRG-" . date('Y');
    return $a;
  }

  public function id_peminjaman()
  {
    return $this->db->query("SELECT tb_header_barang_keluar.id_barang_keluar, tb_header_barang_keluar.nip, tb_pegawai.nama FROM tb_header_barang_keluar INNER JOIN tb_pegawai ON tb_header_barang_keluar.nip=tb_pegawai.nip")->result_array();
  }

  public function select_peminjaman_by_id($id_peminjaman)
  {
    return $this->db->query("SELECT tb_detail_barang_keluar.id_barang_keluar, tb_detail_barang_keluar.id_barang, tb_detail_barang_keluar.qty, tb_barang.barang, tb_barang.satuan FROM tb_detail_barang_keluar INNER JOIN tb_barang ON tb_detail_barang_keluar.id_barang=tb_barang.id_barang WHERE tb_detail_barang_keluar.id_barang_keluar = '$id_peminjaman'")->result_array();
  }

  public function select_brg_peminjaman_by_id($id_peminjaman)
  {
    return $this->db->query("SELECT tb_detail_barang_keluar.id_barang_keluar, tb_detail_barang_keluar.id_barang, tb_detail_barang_keluar.qty, tb_barang.barang, tb_barang.satuan FROM tb_detail_barang_keluar INNER JOIN tb_barang ON tb_detail_barang_keluar.id_barang=tb_barang.id_barang WHERE tb_detail_barang_keluar.id_barang_keluar = '$id_peminjaman'")->result_array();
  }

  public function edit_list_pengembalian()
  {
    $this->db->set('qty', 'qty-' . $this->input->post('qty', true));
    $this->db->where("id_barang_keluar", $this->input->post('id_peminjaman', true));
    $this->db->where("id_barang", $this->input->post('id_barang', true));
    $this->db->update('tb_detail_barang_keluar');
  }

  public function tambah_pengembalian()
  {
    for ($i = 0; $i < count($this->input->post('kode_brg', true)); $i++) {
      $this->db->set('id_pengembalian', $this->input->post('id_pengembalian_barang', true));
      $this->db->set('id_barang', $this->input->post('kode_brg', true)[$i]);
      $this->db->set('qty', $this->input->post('qty', true)[$i]);
      $this->db->set('keterangan', $this->input->post('keterangan', true)[$i]);
      $this->db->insert('tb_detail_pengembalian_barang');

      //Update jumlah bertambah pada tb_atk
      $this->db->set('jumlah', 'jumlah+' . $this->input->post('qty', true)[$i], FALSE);
      $this->db->where("id_barang", $this->input->post('kode_brg', true)[$i]);
      $this->db->update('tb_barang');
    }

    $data_header = [
      "id_pengembalian"  => $this->input->post('id_pengembalian_barang', true),
      "tanggal"          => date('Y-m-d'),
      "nip"              => $this->input->post('nip', true)
    ];
    $this->db->insert('tb_header_pengembalian_barang', $data_header);
  }
  // End Pengembalian Barang



  // Rekap Barang Master Barang
  public function tb_header()
  {
    return $this->db->query('SELECT tb_header_barang_keluar.id_barang_keluar, tb_header_barang_keluar.tanggal, tb_pegawai.nip, tb_pegawai.nama FROM tb_header_barang_keluar INNER JOIN tb_pegawai ON tb_header_barang_keluar.nip=tb_pegawai.nip')->result_array();
  }

  public function tb_header_pengembalian_barang()
  {
    return $this->db->get('tb_header_pengembalian_barang')->result_array();
  }

  // End Rekap Barang Master Barang


  // untuk laporan pembelian brg
  public function rekap_barang_perbulan()
  {
    $tahun = $this->input->post('tahun', true);
    $bulan = $this->input->post('bulan', true);

    return $this->db->query("SELECT tb_header_pembelian_brg.tanggal, tb_detail_pembelian_brg.id_brg, tb_detail_pembelian_brg.qty, tb_barang.barang, tb_barang.satuan, tb_barang.harga_satuan FROM tb_header_pembelian_brg INNER JOIN tb_detail_pembelian_brg ON tb_header_pembelian_brg.id_pembelian=tb_detail_pembelian_brg.id_pembelian INNER JOIN tb_barang ON tb_detail_pembelian_brg.id_brg=tb_barang.id_barang WHERE EXTRACT(YEAR FROM tb_header_pembelian_brg.tanggal) = '$tahun' AND EXTRACT(MONTH FROM tb_header_pembelian_brg.tanggal)='$bulan'")->result_array();
  }

  public function rekap_barang_pertgl()
  {
    $dr_tgl = $this->input->post('dr_tgl', true);
    $sd_tgl = $this->input->post('sd_tgl', true);
    return $this->db->query("SELECT tb_header_pembelian_brg.tanggal, tb_detail_pembelian_brg.id_brg, tb_detail_pembelian_brg.qty, tb_barang.barang, tb_barang.satuan, tb_barang.harga_satuan FROM tb_header_pembelian_brg INNER JOIN tb_detail_pembelian_brg ON tb_header_pembelian_brg.id_pembelian=tb_detail_pembelian_brg.id_pembelian INNER JOIN tb_barang ON tb_detail_pembelian_brg.id_brg=tb_barang.id_barang WHERE tb_header_pembelian_brg.tanggal >= '$dr_tgl' AND tb_header_pembelian_brg.tanggal <= '$sd_tgl'")->result_array();
  }
  // End laporan pembelian brg

  // untuk laporan Peminjaman brg
  public function tb_detail($id)
  {
    return $this->db->query("SELECT tb_detail_barang_keluar.id_barang, tb_barang.barang, tb_detail_barang_keluar.qty, tb_barang.satuan, tb_header_barang_keluar.nip, tb_header_barang_keluar.tanggal, tb_pegawai.nama, tb_pegawai.jabatan FROM tb_detail_barang_keluar INNER JOIN tb_barang ON tb_barang.id_barang=tb_detail_barang_keluar.id_barang INNER JOIN tb_header_barang_keluar ON tb_detail_barang_keluar.id_barang_keluar=tb_header_barang_keluar.id_barang_keluar INNER JOIN tb_pegawai ON tb_pegawai.nip=tb_header_barang_keluar.nip WHERE tb_detail_barang_keluar.id_barang_keluar = '$id'")->result_array();
  }

  public function rekap_peminjaman_per_org($nip)
  {
    return $this->db->query("SELECT tb_pegawai.nip, tb_pegawai.nama, tb_pegawai.jabatan, tb_header_barang_keluar.id_barang_keluar, tb_detail_barang_keluar.id_barang, tb_detail_barang_keluar.qty, tb_barang.barang, tb_barang.satuan FROM tb_pegawai INNER JOIN tb_header_barang_keluar ON tb_header_barang_keluar.nip=tb_pegawai.nip INNER JOIN tb_detail_barang_keluar ON tb_header_barang_keluar.id_barang_keluar=tb_detail_barang_keluar.id_barang_keluar INNER JOIN tb_barang ON tb_detail_barang_keluar.id_barang=tb_barang.id_barang WHERE tb_pegawai.nip = '$nip'")->result_array();
  }

  public function rekap_brg_perbidang()
  {
    $bidang = $this->input->post('bidang', true);
    $dr_tgl = $this->input->post('dr_tgl', true);
    $sd_tgl = $this->input->post('sd_tgl', true);


    return $this->db->query("SELECT tb_pegawai.bidang, tb_barang.barang, tb_barang.satuan, tb_header_barang_keluar.tanggal, tb_detail_barang_keluar.id_barang, tb_detail_barang_keluar.qty FROM tb_barang INNER JOIN tb_detail_barang_keluar ON tb_detail_barang_keluar.id_barang=tb_barang.id_barang INNER JOIN tb_header_barang_keluar ON tb_detail_barang_keluar.id_barang_keluar=tb_header_barang_keluar.id_barang_keluar INNER JOIN tb_pegawai ON tb_header_barang_keluar.nip=tb_pegawai.nip WHERE tb_pegawai.bidang = '$bidang' AND tb_header_barang_keluar.tanggal >= '$dr_tgl' AND tb_header_barang_keluar.tanggal <= '$sd_tgl'")->result_array();
  }
  // 




  // untuk laporan Pengembalian brg
  public function tb_detail_pengembalian_barang($id)
  {
    return $this->db->query("SELECT tb_detail_pengembalian_barang.id_barang, tb_detail_pengembalian_barang.keterangan, tb_barang.barang, tb_detail_pengembalian_barang.qty, tb_barang.satuan, tb_header_pengembalian_barang.nip, tb_header_pengembalian_barang.tanggal, tb_pegawai.nama, tb_pegawai.jabatan FROM tb_detail_pengembalian_barang INNER JOIN tb_barang ON tb_barang.id_barang=tb_detail_pengembalian_barang.id_barang INNER JOIN tb_header_pengembalian_barang ON tb_detail_pengembalian_barang.id_pengembalian=tb_header_pengembalian_barang.id_pengembalian INNER JOIN tb_pegawai ON tb_pegawai.nip=tb_header_pengembalian_barang.nip WHERE tb_detail_pengembalian_barang.id_pengembalian = '$id'")->result_array();
  }
  // 

}
