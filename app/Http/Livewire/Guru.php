<?php

namespace App\Http\Livewire;

use App\Models\Guru as ModelsGuru;
use Livewire\Component;
use Livewire\WithPagination;
use Livewire\WithFileUploads;

class Guru extends Component
{
    use WithFileUploads;
    use WithPagination;
    protected $paginationTheme = 'bootstrap';

    public $create,$edit, $delete, $nama_guru, $photo, $mapel, $jabatan, $guru_id, $search;

    protected $rules = [
        'nama_guru' => 'required|min:5',
        'mapel' => 'required|min:1',
        'jabatan' => 'required|min:5'
    ];

    public function create(){
        $this->create = true;
    }

    public function store(){

        $this->validate();
        //dd($this->nama_kelas);

        ModelsGuru::create([
            'nama_guru' => $this->nama_guru,
            'photo' => $this->photo->store('photo', 'public'),
            'mapel' => $this->mapel,
            'jabatan' =>$this->jabatan
        ]);

        session()->flash('sukses', 'Data Berhasil Ditambahkan');

        $this->format();
    }

    public function edit(ModelsGuru $guru){

        $this->edit = true;
        $this->nama_guru = $guru->nama_guru;
        $this->photo = $guru->photo;
        $this->mapel = $guru->mapel;
        $this->jabatan = $guru->jabatan;
        $this->guru_id = $guru->id;
    }

    public function update(ModelsGuru $guru){

        $this->validate();

        $guru->update([
            'nama_guru' => $this->nama_guru,
            'photo' => $this->photo->store('photo', 'public'),
            'mapel' => $this->mapel,
            'jabatan' => $this->jabatan

        ]);

        session()->flash('sukses', 'Data Berhasil Diubah');

        $this->format();
    }

    public function delete($id){

        $this->format();

        $this->delete = true;
        $this->guru_id = $id;
    }

    public function destroy(ModelsGuru $guru){

        $guru->delete();

        session()->flash('sukses', 'Data Berhasil Dihapus');

        $this->format();

    }


    public function render()
    {

        if ($this->search) {

            $guru = ModelsGuru::first()->where('nama_guru', 'like', '%'. $this->search .'%')->paginate(7);
            //$guru = ModelsGuru::first()->where('mapel', 'like', '%'. $this->search .'%')->paginate(7);
            //$guru = ModelsGuru::first()->where('jabatan', 'like', '%'. $this->search .'%')->paginate(7);



        }
        else {

            $guru = ModelsGuru::first()->paginate(7);

        }



        return view('livewire.guru', [
            'guru' => $guru
        ]);
    }

    public function updatingSearch()
    {
        $this->resetPage();
    }

    public function format(){

        unset($this->nama_guru);
        unset($this->mapel);
        unset($this->jabatan);
        unset($this->create);
        unset($this->edit);
        unset($this->delete);
    }
}
