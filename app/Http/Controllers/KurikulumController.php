<?php

namespace App\Http\Controllers;

use App\Models\Kurikulum;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use Illuminate\Validation\Rule;

class KurikulumController extends Controller
{
  /**
   * Display a listing of the resource.
   *
   * @return \Illuminate\Http\Response
   */
  public function index()
  {
    return view('kurikulum.index', ['kurikulum' => Kurikulum::get()]);
  }

  /**
   * Show the form for creating a new resource.
   *
   * @return \Illuminate\Http\Response
   */
  public function create()
  {
    //
  }

  /**
   * Store a newly created resource in storage.
   *
   * @param  \Illuminate\Http\Request  $request
   * @return \Illuminate\Http\Response
   */
  public function store(Request $request)
  {
    Validator::make($request->all(), [
      'semester' => ['required', 'regex:/^[0-9]+$/'],
      'tahun'    => ['required', 'regex:/^[0-9]+$/']
    ], [
      'required'       => 'Bidang :attribute tidak boleh kosong.',
      'semester.regex' => 'Bidang :attribute harus berupa angka.',
      'tahun.regex'    => 'Bidang :attribute harus berupa angka.'
    ])->validate();

    Kurikulum::create($request->all());

    return redirect()->back();
  }

  /**
   * Display the specified resource.
   *
   * @param  \App\Models\Kurikulum  $kurikulum
   * @return \Illuminate\Http\Response
   */
  public function show(Kurikulum $kurikulum)
  {
    //
  }

  /**
   * Show the form for editing the specified resource.
   *
   * @param  \App\Models\Kurikulum  $kurikulum
   * @return \Illuminate\Http\Response
   */
  public function edit($id)
  {
    $kurikulum = Kurikulum::find($id);

    return view('kurikulum.form', compact('kurikulum'));

  }

  /**
   * Update the specified resource in storage.
   *
   * @param  \Illuminate\Http\Request  $request
   * @param  \App\Models\Kurikulum  $kurikulum
   * @return \Illuminate\Http\Response
   */
  public function update(Request $request, $id)
  {
    Validator::make($request->all(), [
      'semester' => ['required', 'regex:/^[0-9]+$/'],
      'tahun'    => ['required', 'regex:/^[0-9]+$/']
    ], [
      'required'       => 'Bidang :attribute tidak boleh kosong.',
      'semester.regex' => 'Bidang :attribute harus berupa angka.',
      'tahun.regex'    => 'Bidang :attribute harus berupa angka.'
    ])->validate();

    // Kurikulum::find($id)->update($request->except('_token', 'kd_kurikulum'));
    $kurikulum = Kurikulum::find($id);
    $kurikulum->update([
      'semester'  => $request->input('semester'),
      'tahun'  => $request->input('tahun'),
      
    ]);
    // dd($kurikulum);
    if($kurikulum)
    {
      return redirect()->route('kurikulum')->with([
        'message' => 'Kurikulum berhasil diubah',
        'alert-info' => 'info'
      ]);
    } else {
      return redirect()->back()->with([
        'message' => 'Kurikulum Gagal diubah',
        'alert-info' => 'danger'
      ]);
    }

    return redirect()->route('kurikulum');
  }

  /**
   * Remove the specified resource from storage.
   *
   * @param  \App\Models\Kurikulum  $kurikulum
   * @return \Illuminate\Http\Response
   */
  public function destroy($id)
  {
    Kurikulum::find($id)->delete();

    return redirect()->back();
  }
}
