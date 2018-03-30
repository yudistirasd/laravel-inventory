@extends('layouts.master')

@section('title', 'Kategori Barang')

@section('content')
  <div class="row">
    <div class="col-md-12 col-sm-12 col-xs-12">
      <div class="x_panel">
        <div class="x_title">
          <h2>Kategori <small>Data barang akan di kelompokkan berdasarkan kategori yang sudah di tambahkan pada halaman ini</small></h2>
          <div class="clearfix"></div>
        </div>
        <div class="x_content">
          <table class="table table-striped">
            <thead>
              <tr>
                <th>#</th>
                <th>Kategori Barang</th>
                <th>Aksi</th>
              </tr>
            </thead>
            <tbody>
              @foreach ($categories as $index => $category)
                <tr>
                  <td>{{ $index +1 }}</td>
                  <td>{{ $category->name }}</td>
                  <td>
                    <form class="delete-form" action="/admin/categories/{{ $category->id }}" method="post">
                      <a href="/admin/categories/{{ $category->id }}/edit"><i class="fa fa-edit"></i> Edit</a> |
                      <a href="javascript:;" class="btn-delete"><i class="fa fa-trash"></i> Hapus</a>
                      {{ csrf_field() }}
                      <input type="hidden" name="_method" value="DELETE">
                    </form>
                  </td>
                </tr>
              @endforeach
            </tbody>
          </table>
        </div>
        <div class="btn-add">
          <a href="/admin/categories/create" class="btn btn-primary">Tambah Kategori</a>
        </div>
      </div>
    </div>
  </div>
@endsection

@section('script')
  @if (Session::has('sweet_alert.alert'))
      <script>
        swal( '{!! Session::get('sweet_alert.title') !!}', '{!! Session::get('sweet_alert.text') !!}', '{!! Session::get('sweet_alert.type') !!}' )
      </script>
  @endif
@endsection
