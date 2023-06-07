<?php

namespace App\Http\Livewire;

use App\Models\Kelas as ModelsKelas;
use Livewire\Component;
use Livewire\WithPagination;
//use Illuminate\Database\Eloquent\Collection;

class Kelas extends Component
{
    use WithPagination;
    protected $paginationTheme = 'bootstrap';

    public $create, $edit, $delete, $nama_kelas, $wali_kelas, $kelas_id, $search;

    protected $rules = [
        'nama_kelas' => 'required|min:6',
        'wali_kelas' => 'required|min:5',
    ];

    public function create(){
        $this->create = true;
        //dd($this->create);
    }

    public function store(){

        $this->validate();
        //dd($this->nama_kelas);

        ModelsKelas::create([
            'nama_kelas' => $this->nama_kelas,
            'wali_kelas' => $this->wali_kelas
        ]);

        session()->flash('sukses', 'Data Berhasil Ditambahkan');

        $this->format();
    }

    public function update(ModelsKelas $kelas){

        $this->validate();

        $kelas->update([
            'nama_kelas' => $this->nama_kelas,
            'wali_kelas' => $this->wali_kelas

        ]);

        session()->flash('sukses', 'Data Berhasil Diubah');

        $this->format();
    }

    public function edit(ModelsKelas $kelas){

        $this->edit = true;
        $this->nama_kelas = $kelas->nama_kelas;
        $this->wali_kelas = $kelas->wali_kelas;
        $this->kelas_id = $kelas->id;


    }

    public function delete($id){

        $this->format();

        $this->delete = true;
        $this->kelas_id = $id;
    }

    public function updatingSearch()
    {
        $this->resetPage();
    }

    public function destroy(ModelsKelas $kelas){

        $kelas->delete();

        session()->flash('sukses', 'Data Berhasil Dihapus');

        $this->format();

    }



    public function render()
    {
        if ($this->search) {
            $kelas = ModelsKelas::first()->where('nama_kelas', 'like', '%'. $this->search .'%')->paginate(7);
        }
        else {

            $kelas = ModelsKelas::first()->paginate(7);
        }





        return view('livewire.kelas', [
           'kelas' => $kelas
        ]);
    }



    public function format(){

        unset($this->nama_kelas);
        unset($this->wali_kelas);
        unset($this->create);
        unset($this->update);
        unset($this->edit);
        unset($this->delete);

    }


}
