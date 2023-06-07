@if ($edit)
            <div class="card-body">
                <div class="form-group">
                  <label for="exampleInputEmail1">Nama Guru</label>
                  <input wire:model="nama_guru" type="text" class="form-control" id="exampleInputEmail1" placeholder="Nama Kelas" name="nama_guru">
                  @error('nama_guru') <small class="text-danger">{{ $message }}</small> @enderror
                </div>
                <div class="form-group">
                  <label for="exampleInputPassword1">Mapel</label>
                  <input wire:model="mapel" type="text" class="form-control" id="exampleInputPassword1" placeholder="Wali Kelas" name="mapel">
                  @error('mapel') <small class="text-danger">{{ $message }}</small> @enderror
                </div>
                <div class="form-group">
                    <label for="exampleInputPassword1">Jabatan</label>
                    <input wire:model="jabatan" type="text" class="form-control" id="exampleInputPassword1" placeholder="Wali Kelas" name="jabatan">
                    @error('jabatan') <small class="text-danger">{{ $message }}</small> @enderror
                  </div>
                  <label for="exampleInputFile">File input</label>
                    <div class="input-group">
                      <div class="custom-file">
                        <input wire:model="photo" type="file" class="custom-file-input" id="exampleInputFile" name="photo">
                        <label class="custom-file-label" for="exampleInputFile">Choose file</label>
                        @error('photo') <small class="text-danger">{{ $message }}</small> @enderror
                      </div>
                    </div>
                <span wire:click="update({{$guru_id}})" class="btn btn-sm btn-primary">Update</span>
            </div>
            @endif
