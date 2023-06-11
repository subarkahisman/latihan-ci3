<?php 
defined('BASEPATH') or exit('No direct script access allowed');

class Siswa extends CI_Controller {
    public function index() {
        
        $this->load->model('m_siswa');

        $data = array('data_siswa' => $this->m_siswa->get_siswa()->result());
        
        $this->load->view('data_siswa', $data);

    }

    public function tambah() {
        
        $this->load->view('tambah_siswa');
    }

    public function simpan() {
        $this->load->model('m_siswa');

        $nisn           = $this->input->post('nisn');
        $nama_lengkap   = $this->input->post('nama_lengkap');
        $alamat         = $this->input->post('alamat');

        $data = array(
            'nisn'          => $nisn,
            'nama_lengkap'  => $nama_lengkap,
            'alamat'        => $alamat
        );

        $this->m_siswa->simpan_siswa($data);

        redirect('siswa');
    }

    public function edit($id_siswa) {
        $this->load->model('m_siswa');
        $id_siswa = $this->uri->segment(3);

        $data = array(
            'data_siswa' => $this->m_siswa->edit_siswa($id_siswa)

        );

        $this->load->view('edit_siswa', $data);

    }

    public function update() {
        $this->load->model('m_siswa');

        $id_siswa['id_siswa']   =   $this->input->post('id_siswa');
        $nisn                   =   $this->input->post('nisn');
        $nama_lengkap           =   $this->input->post('nama_lengkap');
        $alamat                 =   $this->input->post('alamat');

        $data = array(
            'nisn'          =>      $nisn,
            'nama_lengkap'   =>      $nama_lengkap,
            'alamat'        =>      $alamat
        );

        $this->m_siswa->update_siswa($data, $id_siswa);

        redirect('siswa');

    }

    public function hapus($id_siswa) {
        $this->load->model('m_siswa');
        $id['id_siswa'] = $this->uri->segment(3);
        $this->m_siswa->hapus_siswa($id);

        redirect('siswa');
    }

    
}
