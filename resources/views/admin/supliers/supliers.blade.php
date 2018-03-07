@extends('layouts.master')

@section('title', 'Suplier')

@section('content')
  <div class="row">
    <div class="col-md-6 col-sm-6 col-xs-12">
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
                <th>Status Suplier</th>
                <th>Aksi</th>
              </tr>
            </thead>
            <tbody>
              @foreach ($supliers as $index => $suplier)
                <tr>
                  <td>{{ $index +1 }}</td>
                  <td>{{ $suplier->name }}</td>
                  <td>{{ $suplier->status == 1 ? 'Aktif' : 'Tidak Aktif' }}</td>
                  <td><a href="/admin/supliers/{{ $suplier->id }}/edit"><i class="fa fa-edit"></i> Edit</a> | <a href="" class="btn-delete" data-id="{{ $suplier->id }}" data-token="{{ csrf_token() }}"><i class="fa fa-trash"></i> Hapus</a></td>
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

  <script>
    $('.btn-delete').on('click', function (e) {
      e.preventDefault();
      var id = $(this).data('id');
      var token = $(this).data('token');
      swal({
        title: 'Apakah anda yakin?',
        text: "Data akan dihapus secara permanen!",
        type: 'warning',
        showCancelButton: true,
        confirmButtonColor: '#3085d6',
        cancelButtonColor: '#d33',
        confirmButtonText: 'Ya, hapus!',
        cancelButtonText: 'Tidak, batalkan',
        showLoaderOnConfirm: true,

        preConfirm: function() {
          return new Promise(function(resolve) {
             $.ajax({
              url: '/admin/supliers/'+id,
              type: 'POST',
              data: {
                id      : id,
                _method : 'DELETE',
                _token  : token
              }
             })
             .done(function(){
               location.reload();
             })
             .fail(function(){
              swal('Oops...', 'Something went wrong with ajax !', 'error');
             });
          });
          },
        allowOutsideClick: false
      });
    });
  </script>
@endsection
