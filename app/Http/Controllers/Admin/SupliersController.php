<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Database\QueryException as QueryException;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Suplier;
use Alert;


class SupliersController extends Controller
{
    public function index()
    {
        $supliers = Suplier::all();
        return view('admin.supliers.supliers', ['supliers' => $supliers]);
    }

    public function create(){
        return view('admin.supliers.addSuplier');
    }

    public function store(Request $request)
    {
        $this->validate($request, [
          'suplierName' => 'required|min:15',
          'status'      => 'required'
        ]);

        $suplier          = new Suplier;
        $suplier->name    = $request->suplierName;
        $suplier->status  = $request->status;
        $suplier->save();

        Alert::success('Data berhasil ditambahkan', 'Success');

        return redirect('/admin/supliers');
    }

    public function show($id)
    {
        //
    }

    public function edit($id)
    {
        return view('admin.supliers.editSuplier', ['suplier' => Suplier::find($id)]);
    }

    public function update(Request $request, $id)
    {
        $suplier          = Suplier::find($id);
        $suplier->name    = $request->suplierName;
        $suplier->status  = $request->status;
        $suplier->save();

        Alert::success('Data berhasil diupdate', 'Success');

        return redirect('/admin/supliers');
    }

    public function destroy($id)
    {
      try {
        Suplier::destroy($id);
        Alert::success('', 'Data berhasil dihapus !');
      } catch (QueryException $e){
        if($e->errorInfo[0] == 23000 && $e->errorInfo[1] == 1451)
          Alert::error('Mohon hapus data barang yang berkaitan dengan '. Suplier::find($id)->name . ' terlebih dahulu', 'Data gagal dihapus !');
      }
      return redirect('/admin/supliers');
    }
}
