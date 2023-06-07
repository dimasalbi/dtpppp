<div>
    <div class="row">
        <div class="col-12">

            @if (session('sukses'))

                <div class="alert alert-success">
                    {{session('sukses')}}
                </div>

            @endif

            @include('admin/guru/create')

            @include('admin/guru/edit')

            @include('admin/guru/delete')

          <div class="card">
            <div class="card-header">
                <span wire:click="create" class="btn btn-sm btn-primary">Add</span>


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

            <!-- /.card-header -->
            <div class="card-body table-responsive p-0">
              <table class="table table-hover text-nowrap">
                <thead>

                  <tr>
                    <th width="10%">Nama Guru</th>
                    <th >Foto</th>
                    <th>Mapel</th>
                    <th>Jabatan</th>
                    <th width="15%">Aksi</th>
                  </tr>
                </thead>
                <tbody>
                    @foreach ($guru as $item)
                        <tr>
                            <td>{{$item->nama_guru}}</td>
                            <td><img src="{{asset('storage')}}/{{$item->photo}}" alt="" width="50" height="60"></td>
                            <td>{{$item->mapel}}</td>
                            <td>{{$item->jabatan}}</td>
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
            </div>
            <!-- /.card-body -->
          </div>
          <!-- /.card -->
        </div>
      </div>
</div>
