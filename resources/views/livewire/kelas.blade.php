<div class="row">
    <div class="col-12">
        @if (session('sukses'))

            <div class="alert alert-success">
                {{session('sukses')}}
            </div>

        @endif

        @include('admin/kelas/create')
        @include('admin/kelas/edit')
        @include('admin/kelas/delete')


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
                <th>Kelas</th>
                <th>Wali Kelas</th>
                <th>Aksi</th>
              </tr>
            </thead>
            <tbody>

              @foreach ($kelas as $item)
                <tr>
                    <td>{{$item->nama_kelas}}</td>
                    <td>{{$item->wali_kelas}}</td>
                    <td>
                        <div class="btn-group">
                            <a href="/siswa" class="btn btn-sm btn-primary mr-2">Lihat</a>
                            <span wire:click="edit({{$item->id}})" class="btn btn-sm btn-warning mr-2">Edit</span>
                            <span wire:click="delete({{$item->id}})" class="btn btn-sm btn-danger">Delete</span>
                        </div>
                    </td>
                </tr>
              @endforeach






            </tbody>



          </table>

          <div class="card-footer clearfix">
            {{$kelas->links()}}
          </div>

            </div>




        </div>
        <!-- /.card-body -->
        <div class="card-footer clearfix">

        </div>
        <tfoot>

        </tfoot>
      </div>
      <!-- /.card -->
    </div>
  </div>
