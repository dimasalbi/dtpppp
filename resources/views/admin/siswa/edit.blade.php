@if ($edit)
              <div class="card-body">
                <div class="form-group">
                <label for="exampleInputEmail1">Nama</label>
                <input wire:model="name" type="text" class="form-control" id="exampleInputEmail1" placeholder="Nama" name="name">
                @error('name') <small class="text-danger">{{ $message }}</small> @enderror
                </div>
                <div class="form-group">
                <label for="exampleInputPassword1">NIS</label>
                <input wire:model="nis" type="text" class="form-control" id="exampleInputPassword1" placeholder="NIS" name="nis">
                @error('nis') <small class="text-danger">{{ $message }}</small> @enderror
                </div>
                <div class="form-group">
                    <label for="exampleInputPassword1">NISN</label>
                    <input wire:model="nisn" type="text" class="form-control" id="exampleInputPassword1" placeholder="NISN" name="nisn">
                    @error('nisn') <small class="text-danger">{{ $message }}</small> @enderror
                </div>
                <div class="form-group">
                    <label for="exampleInputPassword1">Tempat Tanggal Lahir</label>
                    <input wire:model="tempat_tanggal_lahir" type="text" class="form-control" id="exampleInputPassword1" placeholder="Tempamt Tanggal Lahir" name="tempat_tanggal_lahir">
                    @error('tempat_tanggal_lahir') <small class="text-danger">{{ $message }}</small> @enderror
                </div>
                <label for="exampleInputFile">File input</label>
            <div class="input-group">
              <div class="custom-file">
                <input wire:model="foto" type="file" class="custom-file-input" id="exampleInputFile" name="foto">
                <label class="custom-file-label" for="exampleInputFile">Choose file</label>
              </div>

            </div>
            <span wire:click="update({{$siswa_id}})" class="btn btn-sm btn-primary">Submit</span>

              @endif
