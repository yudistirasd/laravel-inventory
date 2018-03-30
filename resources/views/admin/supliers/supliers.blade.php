@extends('layouts.master')

@section('title', 'Suplier')

@section('content')
  <div class="row">
    <div class="col-md-12 col-sm-12 col-xs-12">
      <div class="x_panel">
        <div class="x_title">
          <h2>Suplier <small>Data perusahaan penyuplai barang</small></h2>
          <div class="clearfix"></div>
        </div>
        <div class="x_content">
          <table class="table table-striped">
            <thead>
              <tr>
                <th>#</th>
                <th>Suplier</th>
                <th>Akun Login</th>
                <th>Status Suplier</th>
                <th>Aksi</th>
              </tr>
            </thead>
            <tbody>
              @foreach ($supliers as $index => $suplier)
                <tr>
                  <td>{{ $index +1 }}</td>
                  <td>{{ $suplier->name }}</td>
                  <td>{{ $suplier->user->username }}</td>
                  <td>{{ $suplier->status == 1 ? 'Aktif' : 'Tidak Aktif' }}</td>
                  <td>
                    <form class="delete-form" action="/admin/supliers/{{ $suplier->id }}" method="post">
                      <a href="/admin/supliers/{{ $suplier->id }}/edit"><i class="fa fa-edit"></i> Edit</a> |
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
          <a href="/admin/supliers/create" class="btn btn-primary">Tambah Suplier</a>
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
