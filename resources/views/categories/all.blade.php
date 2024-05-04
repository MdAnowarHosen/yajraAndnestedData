@extends('layouts.frontLayout')
@section('content')

    <div>
        <!-- Content Header (Page header) -->
    <section class="content-header">
        <div class="container-fluid">
          <div class="row mb-2">
            <div class="col-sm-6">
              <h1>DataTables</h1>
            </div>
            <div class="col-sm-6">
              <ol class="breadcrumb float-sm-right">
                <li class="breadcrumb-item"><a href="#">Home</a></li>
                <li class="breadcrumb-item active">Categories</li>
              </ol>
            </div>
          </div>
        </div><!-- /.container-fluid -->
      </section>

      <!-- Main content -->
      <section class="content">
        <div class="container-fluid">
                <div class="row">
                    <div class="col-12">
                      <div class="card">
                        <div class="card-header">
                          <h3 class="card-title">Categories</h3>
                          <div  class="float-right">
                            <a class=" btn btn-sm btn-primary" href="{{ route('categories.all') }}">Tree View</a>
                            <a class=" btn btn-sm btn-primary" href="{{ route('categories.create') }}">Create Category</a>
                          </div>
                        </div>
                        <!-- /.card-header -->
                        <div class="card-body">
                          <table id="example1" class="table table-bordered table-striped">
                            <thead>
                            <tr>
                              <th>ID</th>
                              <th>Name</th>
                              <th>Slug</th>
                              <th>Action</th>
                            </tr>
                            </thead>
                            <tbody>
                                @foreach ($data as $key => $row)
                                <tr>
                                    <td>{{ $key + 1 }}</td>
                                    <td>{{ $row->name }}</td>
                                    <td>{{ $row->slug }}</td>
                                    <td>



    <small>{{ $row->ancestors->count() ? implode(' > ', $row->ancestors->pluck('name')->toArray()) : 'Top Level' }}</small><br>
    {{ $row->name }}


                                    </td>
                                </tr>
                                @endforeach
                            </tbody>
                          </table>
                        </div>
                         {{-- {{ $dataTable->table() }} --}}
                        <!-- /.card-body -->
                      </div>
                      <!-- /.card -->
                    </div>
                    <!-- /.col -->
                  </div>
                  <!-- /.row -->
        </div>
        <!-- /.container-fluid -->
      </section>
      <!-- /.content -->
    </div>


@endsection

@push('scripts')
<script>
    $(function () {
      $("#example1").DataTable({
        // processing:true,
        // serverSide:true,
        // ajax:'{!! route('categories.get.categories') !!}',
        // columns: [
        //     { data: 'id', name: 'id' },
        //     { data: 'name', name: 'name' },
        //     { data: 'slug', name: 'slug' },
        //     { data: 'action', name: 'action' },
        // ],

        "responsive": true, "lengthChange": false, "autoWidth": false,
        "buttons": ["copy", "csv", "excel", "pdf", "print", "colvis"],

      }).buttons().container().appendTo('#example1_wrapper .col-md-6:eq(0)');
      $('#example2').DataTable({
        "paging": true,
        "lengthChange": false,
        "searching": false,
        "ordering": true,
        "info": true,
        "autoWidth": false,
        "responsive": true,
      });
    });
  </script>

  {{-- {{ $dataTable->scripts(attributes: ['type' => 'module']) }} --}}

@endpush

