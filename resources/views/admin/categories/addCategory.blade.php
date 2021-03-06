@extends('layouts.master')

@section('title', 'Tambah Kategori')

@section('content')
  <div class="row">
    <div class="col-md-6 col-sm-6 col-xs-12">
      <div class="x_panel">
        <div class="x_title">
          <h2>Tambah Kategori</h2>
          <div class="clearfix"></div>
        </div>
        <div class="x_content">
          <form action="/admin/categories" method="post" class="form-horizontal form-label-left">
            <div class="form-group">
              <label class="control-label col-md-3 col-sm-3 col-xs-12" for="categoryName">Nama Kategori<span class="required">*</span>
              </label>
              <div class="col-md-6 col-sm-6 col-xs-12">
                <input type="text" name="categoryName" value="{{ old('categoryName') }}" class="form-control col-md-7 col-xs-12 {{ $errors->has('categoryName') ? 'has-errors':''}}">
                <small>{{ $errors->first('categoryName') }}</small>
              </div>
            </div>
            <div class="form-group">
              <button type="submit" class="btn btn-primary">Simpan</button>
              <a href=" {{ URL::previous() }}" class="btn btn-primary">Kembali</a>
            </div>
            {{ csrf_field() }}
            </form>
        </div>
      </div>
    </div>
  </div>
@endsection
