<?php

namespace App\Http\Controllers;

use App\Exports\ExportSiswa;
use App\Models\Siswa;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Str;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Validator;
use Illuminate\Validation\Rule;
use App\Http\Requests\StoreSiswaRequest;
use App\Http\Requests\UpdateSiswaRequest;
use App\Exports\SiswaExport;
use App\Imports\SiswaImport;
use Maatwebsite\Excel\Facades\Excel;

class SiswaController extends Controller
{
  /**
   * Display a listing of the resource.
   *
   * @return \Illuminate\Http\Response
   */
  public function index()
  {
    $siswa = Siswa::when(request('search'), function ($query) {
      $query->where('nama', 'LIKE', '%' . request('search') . '%')
        ->orWhere('alamat', 'LIKE', '%' . request('search') . '%')
        ->orWhere('nis', 'LIKE', '%' . request('search') . '%');
    })->orderBy('created_at', 'desc')->paginate(8);

    return view('siswa.index', ['siswa' => $siswa]);
  }


  public function trash()
  {
    // mengampil data guru yang sudah dihapus
    $trashedSiswa = Siswa::onlyTrashed()->get();
    return view('siswa.trash', ['trashedSiswa' => $trashedSiswa]);
  }

  public function restore($id)
  {
    // Temukan data siswa yang telah dihapus
    $siswa = Siswa::onlyTrashed()->findOrFail($id);

    // Lakukan restore
    $siswa->restore();

    return redirect()->route('siswa')->with([
      'message' => 'Siswa berhasil dipulihkan',
      'alert-info' => 'success',
    ]);
  }

  /**
   * Show the form for creating a new resource.
   *
   * @return \Illuminate\Http\Response
   */
  public function create()
  {
    return view('siswa.form');
  }

  /**
   * Store a newly created resource in storage.
   *
   * @param  \Illuminate\Http\Request  $request
   * @return \Illuminate\Http\Response
   */
  public function store(Request $request)
  {

    /*  dd($request->all());
     */


    Validator::make($request->all(), [
      'nis'    => ['required', Rule::unique('siswa'), 'regex:/^[0-9]+$/'],
      'nama'   => 'required',
      'jk'     => 'required',
      'alamat' => 'required'
    ], [
      'required'   => 'Bagian :attribute tidak boleh kosong.',
      'nis.unique' => 'Bagian :attribute harus bersifat unik.',
      'nis.regex'  => 'Bagian :attribute harus berupa angka'
    ], [
      'nis'    => 'NIS',
      'nama'   => 'Nama Siswa',
      'jk'     => 'Jenis kelamin',
      'alamat' => 'Alamat'
    ])->validate();

    $gambarName = null;


    //pengecheckan jika ada gambar
    if ($request->hasFile('gambar')) {
      //lakukan ubah nama gambarnya berdasarkan slug dari namanya
      $slug = Str::slug($request->nama, '-');

      //ambil extensi nya, contoh extensi .jpg, .png, etc
      $ext = $request->file('gambar')->getClientOriginalExtension();

      //ini adalah nama hasilnya lalau gabungkan nama tsb
      $gambarName = $slug . '.' . $ext;

      //setelah itu disini simpan gambarnya di storage assets car
      $request->file('gambar')->storeAs('assets/car', $gambarName, 'public');
    }

    //biasanya penggunaan data seperti saja agar dapat lebih mudah customize nya
    $data = [
      'nis' => $request->nis,
      'nama'   => $request->nama,
      'alamat' => $request->alamat,
      'jk'  => $request->jk,
      'gambar' => $gambarName,
    ];

    Siswa::create($data);

    return redirect()->route('siswa')->with([
      'message' => 'Tambah siswa berhasil',
      'alert-info' => 'success'
    ]);
  }

  /**
   * Display the specified resource.
   *
   * @param  int  $id
   * @return \Illuminate\Http\Response
   */
  public function show($id)
  {
    //
  }

  /**
   * Show the form for editing the specified resource.
   *
   * @param  int  $id
   * @return \Illuminate\Http\Response
   */
  public function edit($id)
  {
    $siswa = Siswa::find($id);
    // dd($siswa->toArray());

    return view('siswa.form', compact('siswa'));
  }

  /**
   * Update the specified resource in storage.
   *
   * @param  \Illuminate\Http\Request  $request
   * @param  int  $id
   * @return \Illuminate\Http\Response
   */
  // UPDATE ASLI
  // public function update(UpdateSiswaRequest $request, $id)
  // {
  //   Validator::make($request->all(), [
  //     'nis'    => ['required', Rule::unique('siswa')->ignore($id), 'regex:/^[0-9]+$/'],
  //     'nama'   => 'required',
  //     'jk'     => 'required',
  //     'alamat' => 'required'
  //   ], [
  //     'required'   => 'Bagian :attribute tidak boleh kosong.',
  //     'nis.unique' => 'Bagian :attribute harus bersifat unik.',
  //     'nis.regex'  => 'Bagian :attribute harus berupa angka'
  //   ], [
  //     'nis'    => 'NIS',
  //     'nama'   => 'Nama Siswa',
  //     'jk'     => 'Jenis kelamin',
  //     'alamat' => 'Alamat'

  //   ])->validate();

  //   $siswa = Siswa::find($id);
  //   $siswa->update([
  //     'nama'  => $request->input('nama'),
  //     'jk'  => $request->input('jk'),
  //     'alamat'  => $request->input('alamat'),
  //   ]);

  //   $slug = Str::slug($request->nama, '-');

  //   $ext = $request->file('gambar')->getClientOriginalExtension();

  //   //ini adalah nama hasilnya lalau gabungkan nama tsb
  //   $gambarName = $slug . '.' . $ext;

  //   //setelah itu disini simpan gambarnya di storage assets car
  //   $request->file('gambar')->storeAs('assets/car', $gambarName, 'public');
  //   if ($request->hasFile('gambar')) {
  //     // Delete the old image if it exists
  //     if ($siswa->gambar) {
  //       Storage::disk('public')->delete('assets/car/' . $siswa->gambar);
  //     }

  //     // Store the new image
  //     $gambarName = $request->file('gambar')->store('assets/car', 'public');
  //     $siswa->update(['gambar' => $gambarName]);
  //   }

  //   if ($siswa) {
  //     return redirect()->route('siswa')->with([
  //       'message' => 'Siswa berhasil diubah',
  //       'alert-info' => 'info'
  //     ]);
  //   } else {
  //     return redirect()->back()->with([
  //       'message' => 'Siswa Gagal diubah',
  //       'alert-info' => 'danger'
  //     ]);
  //   }
  //   // dd($siswa);

  //   // // Siswa::find($id)->update($request->except('_token'));

  //   // return redirect()->route('siswa')->with([
  //   //   'message' => 'Siswa berhasil diubah',
  //   //   'alert-info' => 'info'
  //   // ]);
  // }

  public function update(UpdateSiswaRequest $request, $id)
  {
    Validator::make($request->all(), [
      'nis'    => ['required', Rule::unique('siswa')->ignore($id), 'regex:/^[0-9]+$/'],
      'nama'   => 'required',
      'jk'     => 'required',
      'alamat' => 'required'
    ], [
      'required'   => 'Bagian :attribute tidak boleh kosong.',
      'nis.unique' => 'Bagian :attribute harus bersifat unik.',
      'nis.regex'  => 'Bagian :attribute harus berupa angka'
    ], [
      'nis'    => 'NIS',
      'nama'   => 'Nama Siswa',
      'jk'     => 'Jenis kelamin',
      'alamat' => 'Alamat'

    ])->validate();

    $siswa = Siswa::find($id);

    if ($request->file('gambar') == "") {
      $siswa->update([
        'nama'  => $request->input('nama'),
        'jk'  => $request->input('jk'),
        'alamat'  => $request->input('alamat'),
      ]);
    } else {
      Storage::disk('local')->delete('public/assets/car' . $siswa->image);

      //upload new image
      $image = $request->file('gambar');
      $image->storeAs('public/assets/car', $image->hashName());

      $siswa = Siswa::find($id);
      $siswa->update([
        'gambar'       => $image->hashName(),
        'nama'  => $request->input('nama'),
        'jk'  => $request->input('jk'),
        'alamat'  => $request->input('alamat'),
      ]);
    }

    // dd($siswa);

    if ($siswa) {
      return redirect()->route('siswa')->with([
        'message' => 'Siswa berhasil diubah',
        'alert-info' => 'success'
      ]);
    } else {
      return redirect()->back()->with([
        'message' => 'Siswa Gagal diubah',
        'alert-info' => 'danger'
      ]);
    }
  }

  /**
   * Remove the specified resource from storage.
   *
   * @param  int  $id
   * @return \Illuminate\Http\Response
   */
  public function destroy($id)
  {
    try {
      $siswa = Siswa::findOrFail($id);

      if ($siswa->gambar) {
        Storage::delete('public/' . $siswa->gambar);
      }

      $siswa->delete();

      return redirect()->back()->with([
        'message' => 'Data berhasil dihapus',
        'alert-info' => 'success' // Set the alert type to 'danger' for successful deletion
      ]);
    } catch (\Exception $e) {
      return redirect()->back()->with([
        'message' => 'Gagal menghapus data: ' . $e->getMessage(),
        'alert-info' => 'danger'
      ]);
    }
  }




  // public function updateImage(Request $request, $id)
  // {
  //   $request->validate([
  //     'gambar' => 'required|image'
  //   ]);

  //   $siswa = Siswa::find($id);
  //   //   if ($request->file('image') == "") {

  //   //     $post = Post::findOrFail($post->id);
  //   //     $post->update([
  //   //         'title'       => $request->input('title'),
  //   //     ]);

  //   // } else {

  //   //     //remove old image
  //   //     Storage::disk('local')->delete('public/posts/'.$post->image);

  //   //     //upload new image
  //   //     $image = $request->file('image');
  //   //     $image->storeAs('public/posts', $image->hashName());

  //   //     $post = Post::findOrFail($post->id);
  //   //     $post->update([
  //   //         'image'       => $image->hashName(),
  //   //     ]);

  //   // }

  //   // if ($siswa) {
  //   if ($request->file('gambar') == "") {
  //     $siswa->update($request->all());
  //   } else {
  //     Storage::disk('local')->delete('public/posts/' . $post->image);

  //     //upload new image
  //     $image = $request->file('gambar');
  //     $image->storeAs('public/assets/car', $image->hashName());

  //     $siswa = Siswa::find($id);
  //     $siswa->update([
  //       'gambar'       => $image->hashName(),
  //     ]);
  //   }

  //   dd($siswa);
  //   // Delete the old image if it exists
  //   // if ($siswa->gambar) {
  //   //     Storage::disk('public')->delete('assets/car/' . $siswa->gambar);
  //   // }

  //   // // Store the new image
  //   // $gambarName = $request->file('gambar')->store('assets/car', 'public');
  //   // $siswa->update(['gambar' => $gambarName]);

  //   // return redirect()->back()->with([
  //   //     'message' => 'Gambar berhasil diubah',
  //   //     'alert-type' => 'info'
  //   // ]);
  //   // } else {
  //   //     return redirect()->back()->with([
  //   //         'message' => 'Siswa tidak ditemukan',
  //   //         'alert-type' => 'danger'
  //   //     ]);
  //   // }
  // }
  //   public function import(Request $request)
  // {
  //     // Import statement
  //     Excel::import(new SiswaImport, $request->file('import_file'));

  //     // Your existing code here...

  //     return redirect()->route('siswa')->with([
  //         'message' => 'Import berhasil',
  //         'alert-info' => 'success'
  //     ]);
  // }

  public function export_excel()
  {
    return Excel::download(new ExportSiswa, 'siswa.xlsx');
  }

  public function import(Request $request)
  {
    $request->validate([
      'import_file' => 'required|file|mimes:xlsx',
    ]);

    // Specify the file type as XLSX explicitly
    Excel::import(new SiswaImport, $request->file('import_file'));

    return redirect()->route('siswa')->with([
      'message' => 'Import berhasil',
      'alert-info' => 'success',
    ]);
  }
}
