@if ($create)
        <div class="card-body">
            <div class="form-group">
              <label for="exampleInputEmail1">Nama Kelas</label>
              <input wire:model="nama_kelas" type="text" class="form-control" id="exampleInputEmail1" placeholder="Nama Kelas" name="nama_kelas">
              @error('nama_kelas') <small class="text-danger">{{ $message }}</small> @enderror
            </div>
            <div class="form-group">
              <label for="exampleInputPassword1">Wali Kelas</label>
              <input wire:model="wali_kelas" type="text" class="form-control" id="exampleInputPassword1" placeholder="Wali Kelas" name="wali_kelas">
              @error('wali_kelas') <small class="text-danger">{{ $message }}</small> @enderror
            </div>
            <span wire:click="store" class="btn btn-sm btn-primary">Submit</span>
        </div>
        @endif
