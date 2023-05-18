<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Barang extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        is_logged_in(5);
    }
    public function in()
    {
        $data['judul'] = 'Barang Masuk';
        $data['user'] = $this->user->getUser();

        $data['barangMasuk'] = $this->barang->getBarangAll();
        $this->load->view('templates/header', $data);
        $this->load->view('templates/sider', $data);
        $this->load->view('templates/topbar', $data);
        $this->load->view('Barang/masuk', $data);
        $this->load->view('templates/footer');
    }

    public function cetakIn()
    {
        $data['judul'] = 'Laporan Barang Masuk';
        $data['barang'] = $this->barang->getBarangAll();
        $this->pdf->setPaper('A4', 'portrait');
        $this->pdf->filename = "Laporan-barang-masuk.pdf";
        $this->pdf->load_view('Barang/cetak', $data);
    }

    public function cetakOut()
    {
        $data['judul'] = 'Laporan Barang Keluar';
        $data['barang'] = $this->barang->getBarangAll();
        $this->pdf->setPaper('A4', 'portrait');
        $this->pdf->filename = "Laporan-barang-masuk.pdf";
        $this->pdf->load_view('Barang/cetakout', $data);
    }

    public function out()
    {
        $data['judul'] = 'Barang Keluar';
        $data['user'] = $this->user->getUser();

        $data['barangKeluar'] = $this->db->get('barang_keluar')->result_array();
        $this->load->view('templates/header', $data);
        $this->load->view('templates/sider', $data);
        $this->load->view('templates/topbar', $data);
        $this->load->view('Barang/keluar', $data);
        $this->load->view('templates/footer');
    }

    public function tambah()
    {
        $data['judul'] = 'Barang Masuk';
        $data['user'] = $this->user->getUser();


        $this->form_validation->set_rules('nama', 'Nama', 'required');
        $this->form_validation->set_rules('jumlah', 'Jumlah', 'required');
        $this->form_validation->set_rules('ket', 'Keterangan', 'required');

        if ($this->form_validation->run() == false) {
            $this->load->view('templates/header', $data);
            $this->load->view('templates/sider', $data);
            $this->load->view('templates/topbar', $data);
            $this->load->view('Barang/tambah', $data);
            $this->load->view('templates/footer');
        } else {

            $nama = $this->input->post('nama');
            $jumlah = $this->input->post('jumlah');
            $keterangan = $this->input->post('ket');

            $gambar = $_FILES['image']['name'];

            if ($gambar) {
                $config['upload_path']          = './assets/img/barang/';
                $config['allowed_types']        = 'gif|jpg|png|JPEG';
                $config['max_size']             = 5028;

                $this->load->library('upload', $config);

                if ($this->upload->do_upload('image')) {
                    $namaGambar = $this->upload->data('file_name');
                    $data = [
                        'nama' => $nama,
                        'jumlah' => $jumlah,
                        'bukti' => $namaGambar,
                        'ket' => $keterangan,
                        'date' => time() + (60 * 60 * 7)
                    ];

                    $this->db->insert('barang_masuk', $data);
                    $this->session->set_flashdata('message', '<div class="alert alert-success alert-dismissible fade show" role="alert">
                            <strong>Berhasil!</strong> Berhasil Diatambahkan!
                            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                            </button>
                        </div>');
                    redirect('barang/in');
                } else {
                    echo $this->upload->display_errors();
                }
            }
        }
    }

    public function edit($id)
    {
        $data['judul'] = 'Barang Masuk';
        $data['user'] = $this->user->getUser();
        $data['barang'] = $this->barang->getBarang($id);
        $this->form_validation->set_rules('nama', 'Nama', 'required');
        $this->form_validation->set_rules('jumlah', 'Jumlah', 'required');
        $this->form_validation->set_rules('ket', 'Keterangan', 'required');

        if ($this->form_validation->run() == false) {
            $this->load->view('templates/header', $data);
            $this->load->view('templates/sider', $data);
            $this->load->view('templates/topbar', $data);
            $this->load->view('Barang/edit', $data);
            $this->load->view('templates/footer');
        } else {

            $namaGambarLama = $this->input->post('bukti');
            $nama = $this->input->post('nama');
            $jumlah = $this->input->post('jumlah');
            $keterangan = $this->input->post('ket');
            $image = $_FILES['image']['name'];
            // var_dump($image);
            // die;



            if ($image == "") {
                $data = [
                    'id' => $id,
                    'nama' => $nama,
                    'jumlah' => $jumlah,
                    'ket' => $keterangan
                ];
                $this->db->where('id', $id);
                $this->db->update('barang_masuk', $data);
                unlink(FCPATH . 'assets/img/barang/' . $namaGambarLama);
                $this->session->set_flashdata('message', '<div class="alert alert-success alert-dismissible fade show" role="alert">
                                <strong>Berhasil!</strong> Berhasil Diubah!
                                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                                </button>
                            </div>');
                redirect('barang/in');
            } else {
                $gambar = $_FILES['image']['name'];

                if ($gambar) {
                    $config['upload_path']          = './assets/img/barang/';
                    $config['allowed_types']        = 'gif|jpg|png';
                    $config['max_size']             = 5028;

                    $this->load->library('upload', $config);

                    if ($this->upload->do_upload('image')) {
                        $namaGambarBaru = $this->upload->data('file_name');
                        $data = [
                            'id' => $id,
                            'nama' => $nama,
                            'jumlah' => $jumlah,
                            'bukti' => $namaGambarBaru,
                            'ket' => $keterangan
                        ];

                        $this->db->where('id', $id);
                        $this->db->update('barang_masuk', $data);
                        unlink(FCPATH . 'assets/img/barang/' . $namaGambarLama);
                        $this->session->set_flashdata('message', '<div class="alert alert-success alert-dismissible fade show" role="alert">
                                <strong>Berhasil!</strong> Berhasil Diubah!
                                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                                </button>
                            </div>');
                        redirect('barang/in');
                    }
                }
            }
        }
    }

    public function hapus()
    {

        $id = $this->input->post('id');
        $nama = $this->input->post('nama');

        $this->db->where('id', $id);
        $this->db->delete('barang_masuk');
        unlink(FCPATH . 'assets/img/barang/' . $nama);
        $this->session->set_flashdata('message', '<div class="alert alert-success alert-dismissible fade show" role="alert">
                            <strong>Berhasil!</strong> Berhasil Dihapus!
                            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                            </button>
                        </div>');
        redirect('barang/in');
    }

    public function kirim($id)
    {
        $data['judul'] = 'Barang Masuk';
        $data['user'] = $this->user->getUser();
        $data['barang'] = $this->barang->getBarang($id);

        $data['toko'] = $this->db->get('toko')->result_array();

        $this->form_validation->set_rules('jumlah', 'Jumlah', 'required');

        if ($this->form_validation->run() == false) {
            $this->load->view('templates/header', $data);
            $this->load->view('templates/sider', $data);
            $this->load->view('templates/topbar', $data);
            $this->load->view('Barang/Kirim', $data);
            $this->load->view('templates/footer');
        } else {

            $nama = $this->input->post('nama');
            $toko = $this->input->post('toko_id');
            $jumlah = $this->input->post('jumlah');
            $pesan = $this->input->post('pesan');
            $sisajumlah = $this->input->post('sisajumlah');
            $hasil = $sisajumlah - $jumlah;

            echo $jumlah;
            echo $sisajumlah;
            die;

            if ($sisajumlah <= $jumlah) {

                $this->session->set_flashdata('message', '<div class="alert alert-danger alert-dismissible fade show" role="alert">
                                <strong>Gagal!</strong> Dikirim jumlah yang dikirim melelebihi jumlah stok!
                                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                                </button>
                            </div>');
                redirect('barang/in');
                return false;
            }

            $gambar = $_FILES['image']['name'];

            if ($gambar) {
                $config['upload_path']          = './assets/img/barang/';
                $config['allowed_types']        = 'gif|jpg|png';
                $config['max_size']             = 5028;

                $this->load->library('upload', $config);

                if ($this->upload->do_upload('image')) {
                    $namaGambar = $this->upload->data('file_name');
                    $data = [
                        'nama' => $nama,
                        'toko_id' => $toko,
                        'jumlah' => $jumlah,
                        'bukti' => $namaGambar,
                        'date_out' => time() + (60 * 60 * 7),
                        'pesan' => $pesan
                    ];

                    $this->db->insert('barang_keluar', $data);
                    $this->session->set_flashdata('message', '<div class="alert alert-success alert-dismissible fade show" role="alert">
                    <strong>Berhasil!</strong> Berhasil Diatambahkan!
                    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                    </button>
                    </div>');
                    $this->db->where('id', $id);
                    $this->db->update('barang_masuk', ['jumlah' => $hasil]);
                    redirect('barang/out');
                } else {
                    echo $this->upload->display_errors();
                }
            }
        }
    }
}
