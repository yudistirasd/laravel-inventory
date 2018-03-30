<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Database\QueryException as QueryException;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Categories;
use Alert;

class CategoriesController extends Controller
{

    public function index()
    {
        return view('admin.categories.categories', ['categories' => Categories::all() ]);
    }

    public function create()
    {
        return view('admin.categories.addCategory');
    }

    public function store(Request $request)
    {
        $this->validate($request, [
          'categoryName' => 'required|min:4',
        ]);

        // untuk memproteksi data double
        $category   = Categories::updateOrCreate([
          'name'  => $request->categoryName
        ]);

        if ($category)
          Alert::success('Data berhasil ditambahkan', 'Success');

        return redirect('/admin/categories');
    }

    public function edit($id)
    {
        return view('admin.categories.editCategory', ['category' => Categories::find($id)]);
    }

    public function update(Request $request, $id)
    {
      $category           = Categories::find($id);
      $category->name     = $request->categoryName;
      $category->save();

      Alert::success('Data berhasil dirubah', 'Success');

      return redirect('/admin/categories');
    }

    public function destroy($id)
    {
        try {
          Categories::destroy($id);
          Alert::success('', 'Data berhasil dihapus !');
        } catch (QueryException $e){
          if($e->errorInfo[0] == 23000 && $e->errorInfo[1] == 1451)
            Alert::error('Mohon hapus data barang yang berkaitan dengan <b> '. Categories::find($id)->name . ' </b> terlebih dahulu', 'Data gagal dihapus !');
        }

        return redirect('/admin/categories');
    }
}
