<?php

namespace App\Controllers;

use App\Models\MahasiswaModel;
use CodeIgniter\Exceptions\PageNotFoundException;

class MahasiswaController extends BaseController
{
    // Menampilkan seluruh data mahasiswa
    public function index()
    {
        $model = new MahasiswaModel();

        $data['mahasiswa'] = $model->findAll();

        return view('mahasiswa/index', $data);
    }

    // Menampilkan halaman tambah mahasiswa
    public function tambah()
    {
        return view('mahasiswa/tambah');
    }

    // Menyimpan data mahasiswa
    public function simpan()
    {
        $rules = [
            'nim'      => 'required',
            'nama'     => 'required|min_length[3]',
            'email'    => 'required|valid_email',
            'prodi'    => 'required',
            'angkatan' => 'required|integer',
            'ipk'      => 'required|decimal|greater_than_equal_to[0]|less_than_equal_to[4]'
        ];

        if (!$this->validate($rules)) {
            return view('mahasiswa/tambah', [
                'validation' => $this->validator
            ]);
        }

        $model = new MahasiswaModel();

        $data = [
            'nim'      => $this->request->getPost('nim'),
            'nama'     => $this->request->getPost('nama'),
            'email'    => $this->request->getPost('email'),
            'prodi'    => $this->request->getPost('prodi'),
            'angkatan' => $this->request->getPost('angkatan'),
            'ipk'      => $this->request->getPost('ipk')
        ];

        $model->insert($data);

        return redirect()->to('/mahasiswa');
    }

    // Menampilkan halaman edit mahasiswa
    public function edit($nim)
    {
        $model = new MahasiswaModel();

        $mahasiswa = $model->find($nim);

        if ($mahasiswa === null) {
            throw PageNotFoundException::forPageNotFound(
                'Data mahasiswa tidak ditemukan.'
            );
        }

        return view('mahasiswa/edit', [
            'mahasiswa' => $mahasiswa
        ]);
    }

    // Memperbarui data mahasiswa
    public function update($nim)
    {
        $model = new MahasiswaModel();

        $mahasiswa = $model->find($nim);

        if ($mahasiswa === null) {
            throw PageNotFoundException::forPageNotFound(
                'Data mahasiswa tidak ditemukan.'
            );
        }

        $rules = [
            'nim'      => 'required',
            'nama'     => 'required|min_length[3]',
            'email'    => 'required|valid_email',
            'prodi'    => 'required',
            'angkatan' => 'required|integer',
            'ipk'      => 'required|decimal|greater_than_equal_to[0]|less_than_equal_to[4]'
        ];

        if (!$this->validate($rules)) {
            return view('mahasiswa/edit', [
                'mahasiswa' => array_merge(
                    $mahasiswa,
                    $this->request->getPost()
                ),
                'validation' => $this->validator
            ]);
        }

        $data = [
            'nim'      => $this->request->getPost('nim'),
            'nama'     => $this->request->getPost('nama'),
            'email'    => $this->request->getPost('email'),
            'prodi'    => $this->request->getPost('prodi'),
            'angkatan' => $this->request->getPost('angkatan'),
            'ipk'      => $this->request->getPost('ipk')
        ];

        $model->update($nim, $data);

        return redirect()->to('/mahasiswa');
    }

    // Menghapus data mahasiswa
    public function hapus($nim)
    {
        $model = new MahasiswaModel();

        $mahasiswa = $model->find($nim);

        if ($mahasiswa === null) {
            throw PageNotFoundException::forPageNotFound(
                'Data mahasiswa tidak ditemukan.'
            );
        }

        $model->delete($nim);

        return redirect()->to('/mahasiswa');
    }
}
