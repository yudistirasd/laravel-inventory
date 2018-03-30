@extends('layouts.master')

@section('title', 'Edit Data Suplier')

@section('content')
  <div class="row">
    <div class="col-md-6 col-sm-6 col-xs-12">
      <div class="x_panel">
        <div class="x_title">
          <h2>Suplier <small>Data perusahaan penyuplai barang</small></h2>
          <div class="clearfix"></div>
        </div>
        <div class="x_content">
          <form id="form-addSuplier" action="/admin/supliers/{{ $suplier->id }}" method="post" class="form-horizontal form-label-left">
            <input type="hidden" name="_method" value="PUT">
            <div class="form-group">
              <label class="control-label col-md-3 col-sm-3 col-xs-12" for="name">Nama Suplier <span class="required">*</span>
              </label>
              <div class="col-md-6 col-sm-6 col-xs-12">
                <input type="text" name="suplierName" value="{{ $suplier->name }}" class="form-control col-md-7 col-xs-12 {{ $errors->has('suplierName') ? 'has-errors':''}}">
                <small>{{ $errors->first('suplierName') }}</small>
              </div>
            </div>
            <div class="form-group">
              <label class="control-label col-md-3 col-sm-3 col-xs-12" for="last-name">Status Suplier <span class="required">*</span>
              </label>
              <div class="col-md-6 col-sm-6 col-xs-12">
                <select class="form-control col-md-7 col-xs-12 {{ $errors->has('status') ? 'has-errors':''}}" name="status" style="padding-left: 7px;">
                  <option value="" {{ count($errors)>0 ? '':'selected' }} >-- Pilih --</option>
                  <option value="1" {{ $suplier->status == 1 ? 'selected' : '' }}> Aktif </option>
                  <option value="2" {{ $suplier->status != 1 ? 'selected' : '' }}> Non-aktif </option>
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
                  <option value="{{ $suplier->user->id }}" selected >{{ $suplier->user->username }}</option>
                  @foreach ($users as $user)
                    <option value="{{ $user->id }}"> {{ $user->username }}</option>
                  @endforeach
                </select>
                <small>{{ $errors->has('userAccount') ? $errors->first('userAccount') : "Diperlukan agar suplier dapat login ke dalam sistem" }}</small>
              </div>
            </div>
            <div class="form-group">
              <button type="submit" class="btn btn-primary">Ubah</button>
              <a href=" {{ URL::previous() }}" class="btn btn-primary">Kembali</a>
            </div>
            {{ csrf_field() }}
            </form>
        </div>
      </div>
    </div>
  </div>
@endsection
