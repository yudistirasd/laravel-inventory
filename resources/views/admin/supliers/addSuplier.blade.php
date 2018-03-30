@extends('layouts.master')

@section('title', 'Tambah Suplier')

@section('content')
  <div class="row">
    <div class="col-md-6 col-sm-6 col-xs-12">
      <div class="x_panel">
        <div class="x_title">
          <h2>Suplier <small>Data perusahaan penyuplai barang</small></h2>
          <div class="clearfix"></div>
        </div>
        <div class="x_content">
          <form id="form-addSuplier" action="/admin/supliers" method="post" class="form-horizontal form-label-left">
            <div class="form-group">
              <label class="control-label col-md-3 col-sm-3 col-xs-12" for="name">Nama Suplier <span class="required">*</span>
              </label>
              <div class="col-md-6 col-sm-6 col-xs-12">
                <input type="text" name="suplierName" value="{{ old('suplierName') }}" class="form-control col-md-7 col-xs-12 {{ $errors->has('suplierName') ? 'has-errors':''}}">
                <small>{{ $errors->first('suplierName') }}</small>
              </div>
            </div>
            <div class="form-group">
              <label class="control-label col-md-3 col-sm-3 col-xs-12" for="status">Status Suplier <span class="required">*</span>
              </label>
              <div class="col-md-6 col-sm-6 col-xs-12">
                <select class="form-control col-md-7 col-xs-12 {{ $errors->has('status') ? 'has-errors':''}}" name="status" style="padding-left: 7px;">
                  <option value="" {{ count($errors)>0 ? '':'selected' }} >-- Pilih --</option>
                  @for ($i=1; $i <= 2; $i++)
                    <option value="{{ $i }}" {{ Request::old('status') == 1 && $i == 1 ? "selected":"" }}>{{ $i == 1 || Request::old('status') == 1 && $i == 1 ? "Aktif":"Non-aktif"}}</option>
                  @endfor
                </select>
                <small>{{ $errors->first('status') }}</small>
              </div>
            </div>
            <div class="form-group">
              <label class="control-label col-md-3 col-sm-3 col-xs-12" for="last-name">Akun User <span class="required">*</span>
              </label>
              <div class="col-md-6 col-sm-6 col-xs-12">
                <select class="form-control col-md-7 col-xs-12 {{ $errors->has('userAccount') ? 'has-errors':''}}" name="userAccount" style="padding-left: 7px;">
                  <option value="" {{ count($errors)>0 ? '':'selected' }} >-- Pilih --</option>
                  @foreach ($users as $user)
                    <option value="{{ $user->id }}" {{ Request::old('userAccount') == $user->id ? "selected":"" }} > {{ $user->username }}</option>
                  @endforeach
                </select>
                <small>{{ $errors->has('userAccount') ? $errors->first('userAccount') : "Diperlukan agar suplier dapat login ke dalam sistem" }}</small>
              </div>
            </div>
            <div class="form-group">
              <button type="submit" class="btn btn-primary">Simpan</button>
            </div>
            {{ csrf_field() }}
            </form>
        </div>
      </div>
    </div>
  </div>
@endsection
