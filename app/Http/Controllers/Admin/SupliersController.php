<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Database\QueryException as QueryException;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Suplier;
use App\Models\User;
use Alert;
use DB;


class SupliersController extends Controller
{
    public function index()
    {
        $supliers = Suplier::all();
        return view('admin.supliers.supliers', ['supliers' => $supliers]);
    }

    public function create()
    {
        $users =  DB::table('users')->where('role', 3)->whereNotExists(function ($query) {
                      $query->select(DB::raw(1))
                      ->from('supliers')
                      ->whereRaw('users.id = supliers.user_id');
                    })->get();
        return view('admin.supliers.addSuplier', ['users' => $users]);
    }

    public function store(Request $request)
    {
        $this->validate($request, [
          'suplierName' => 'required|min:9',
          'status'      => 'required',
          'userAccount'        => 'required'
        ]);

        $suplier          = new Suplier;
        $suplier->name    = $request->suplierName;
        $suplier->status  = $request->status;
        $suplier->user_id = $request->userAccount;
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
      $users =  DB::table('users')->where('role', 3)->whereNotExists(function ($query) {
                    $query->select(DB::raw(1))
                    ->from('supliers')
                    ->whereRaw('users.id = supliers.user_id');
                  })->get();
      return view('admin.supliers.editSuplier', ['suplier' => Suplier::find($id), 'users'  => $users]);
    }

    public function update(Request $request, $id)
    {

        $suplier          = Suplier::find($id);
        $suplier->name    = $request->suplierName;
        $suplier->status  = $request->status;
        $suplier->user_id = $request->userAccount;
        $suplier->save();

        Alert::success('Data berhasil dirubah', 'Success');

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
