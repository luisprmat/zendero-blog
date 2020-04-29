@extends('adminlte::page')

@section('title', 'Dashboard')

@section('content_header')
    <h1>POSTS</h1>
@stop

@section('content')
<div class="card">
    <div class="card-header">
      <h3 class="card-title">Todas las publicaciones</h3>
    </div>
    <!-- /.card-header -->
    <div class="card-body">
        <table id="posts-table" class="table table-bordered table-striped">
            <thead>
                <tr>
                    <th>ID</th>
                    <th>Título</th>
                    <th>Extracto</th>
                    <th>Acciones</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($posts as $post)
                    <tr>
                        <td>{{ $post->id }}</td>
                        <td>{{ $post->title }}</td>
                        <td>{{ $post->excerpt }}</td>
                        <td>
                            <a href="#" class="btn btn-info btn-xs"><i class="fas fa-pencil-alt fa-fw"></i></a>
                            <a href="#" class="btn btn-danger btn-xs"><i class="fas fa-times fa-fw"></i></a>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>
    <!-- /.card-body -->
  </div>
@stop

@section('load_js')
    <script>
        $(function () {
            $('#posts-table').DataTable({
                "paging": true,
                "lengthChange": false,
                "searching": false,
                "ordering": true,
                "info": true,
                "autoWidth": false,
                "responsive": true,
                "language" : {
                    "url": "/dataTables.spanish.lang"
                }
            });
        });
    </script>
@endsection

{{-- @section('css')
    <link rel="stylesheet" href="/css/admin_custom.css">
@stop --}}

{{-- @section('js')
    <script>

    </script>
@stop --}}

