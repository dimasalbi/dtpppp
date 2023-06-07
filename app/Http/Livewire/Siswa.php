<?php

namespace App\Http\Livewire;

use App\Models\Siswa as ModelsSiswa;
use Livewire\Component;
use Livewire\WithPagination;
use Livewire\WithFileUploads;


class Siswa extends Component
{
    use WithFileUploads;
    use WithPagination;
    protected $paginationTheme = 'bootstrap';

    public $create, $edit, $delete, $name, $foto, $nis, $nisn, $tempat_tanggal_lahir, $siswa_id, $search;

    protected $rules = [
        'name' => 'required|min:6',
        'nis' => 'required|numeric',
        'nisn' => 'required|numeric',
        'tempat_tanggal_lahir' => 'required|min:5',
        //'foto' => 'required|max:1024'

    ];

    public function create(){

        $this->create = true;

        //dd($this->create);
    }

    public function store(){

        $this->validate();


        //dd($this->foto);

        //dd($this->nama_kelas);

        ModelsSiswa::create([
            'name' => $this->name,
            'foto' => $this->foto->store('foto', 'public'),
            'nis' => $this->nis,
            'nisn' => $this->nisn,
            'tempat_tanggal_lahir' => $this->tempat_tanggal_lahir,

        ]);



        session()->flash('sukses', 'Data Berhasil Ditambahkan');

        $this->format();
    }

    public function edit(ModelsSiswa $siswa){

        $this->edit = true;
        $this->name = $siswa->name;
        $this->nis = $siswa->nis;
        $this->nisn = $siswa->nisn;
        $this->tempat_tanggal_lahir = $siswa->tempat_tanggal_lahir;
        $this->siswa_id = $siswa->id;
        $this->foto = $siswa->foto;


    }

    public function update(ModelsSiswa $siswa){

        $this->validate();

        $siswa->update([
            'name' => $this->name,
            'foto' => $this->foto->store('foto', 'public'),
            'nis' => $this->nis,
            'nisn' => $this->nisn,
            'tempat_tanggal_lahir' => $this->tempat_tanggal_lahir,

        ]);

        session()->flash('sukses', 'Data Berhasil Diubah');

        $this->format();
    }

    public function delete($id){

        $this->format();

        $this->delete = true;
        $this->siswa_id = $id;
    }

    public function destroy(ModelsSiswa $siswa){

        $siswa->delete();

        session()->flash('sukses', 'Data Berhasil Dihapus');

        $this->format();

    }


    public function render()
    {
        if ($this->search) {
            $siswa = ModelsSiswa::latest()->where('name', 'like', '%'. $this->search .'%')->paginate(33);
            //$siswa = ModelsSiswa::latest()->where('nis', 'like', '%'. $this->search .'%')->paginate(3);
           // $siswa = ModelsSiswa::latest()->where('nisn', 'like', '%'. $this->search .'%')->paginate(3);
        }
        else {

            $siswa = ModelsSiswa::latest()->paginate(33);
        }





        return view('livewire.siswa', [
           'siswa' => $siswa
        ]);
    }

    public function format(){

        unset($this->create);
        unset($this->name);
        unset($this->nis);
        unset($this->nisn);
        unset($this->tempat_tanggal_lahir);
        unset($this->edit);
        unset($this->delete);


    }


}
