<div>
    <div class="row">
        <div class="col-12">

            @if (session('sukses'))

            <div class="alert alert-success">
                {{session('sukses')}}
            </div>

        @endif

            @include('admin/siswa/create')

              @include('admin/siswa/edit')

              @include('admin/siswa/delete')

            <div class="card-body table-responsive p-0" style="">
                <div class="card">
        <div class="card-header">
          <span wire:click="create"  class="btn btn-sm btn-primary">Add</span>
          <div class="card-tools">
            <div class="input-group input-group-sm" style="width: 150px;">
              <input wire:model="search" type="text" name="table_search" class="form-control float-right" placeholder="Search">





              <div class="input-group-append">
                <button type="submit" class="btn btn-default">
                  <i class="fas fa-search"></i>
                </button>
              </div>
            </div>
          </div>
        </div>
                <table class="table table-head-fixed text-nowrap">
                  <thead>
                    <tr>
                      <th>Nama</th>
                      <th>Foto</th>
                      <th>NIS</th>
                      <th>NISN</th>
                      <th>Tempat Tanggal Lahir</th>
                      <th>Aksi</th>
                    </tr>
                  </thead>
                  <tbody>
                    @foreach ($siswa as $item)
                    <tr>
                        <td>{{$item->name}}</td>
                        <td><img src="{{ asset('storage') }}/{{$item->foto}}" alt="" width="60" height="80"></td>
                        <td>{{$item->nis}}</td>
                        <td>{{$item->nisn}}</td>
                        <td>{{$item->tempat_tanggal_lahir}}</td>
                        <td>
                            <div class="btn-group">
                                <span wire:click="edit({{$item->id}})" class="btn btn-sm btn-warning mr-2">Edit</span>
                                <span wire:click="delete({{$item->id}})" class="btn btn-sm btn-danger">Hapus</span>
                            </div>
                        </td>
                      </tr>
                    @endforeach


                  </tbody>
                </table>
                <tfoot>
                    {{$siswa->links()}}
                </tfoot>
              </div>
              <!-- /.card-body -->
            </div>
            <!-- /.card -->
        </div>
    </div>

  </div>
</div>
</div>
