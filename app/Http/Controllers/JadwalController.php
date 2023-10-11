<?php

namespace App\Http\Controllers;

use App\Models\Jadwal;
use App\Models\Kurikulum;
use App\Models\Pelajaran;
use Illuminate\Http\Request;


class JadwalController extends Controller
{
  /**
   * Display a listing of the resource.
   *
   * @return \Illuminate\Http\Response
   */
  public function index()
  {
    return view('jadwal.index', ['jadwal' => Jadwal::get(), 'kurikulum' => Kurikulum::get()]);
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
    // $jadwal = Jadwal::create($request->all());
    // dd($jadwal);
    //dimarih? iya malah datanya ilang dsubmit kenapa ya bang buat pdf juga jam nya ga sesuai sama yang diinput bang saat mau didownload PDF 
    $input = $request->all();
    return redirect()->back();
  }

  /**
   * Display the specified resource.
   *
   * @param  \App\Models\Jadwal  $jadwal
   * @return \Illuminate\Http\Response
   */
  public function show(Jadwal $jadwal)
  {
    //
  }

  /**
   * Show the form for editing the specified resource.
   *
   * @param  \App\Models\Jadwal  $jadwal
   * @return \Illuminate\Http\Response
   */
  public function edit($id)
  {
    $jadwal = Jadwal::find($id);
    $json = [];

    if ($jadwal->jadwal !== null) {
      $json = json_decode($jadwal->jadwal, true); // Ubah menjadi array asosiatif
    }
    $pelajaran = Pelajaran::where('status', true)->get();

    return view('jadwal.form', compact('jadwal', 'pelajaran', 'json', 'id'));
  }


  /**
   * Update the specified resource in storage.
   *
   * @param  \Illuminate\Http\Request  $request
   * @param  \App\Models\Jadwal  $jadwal
   * @return \Illuminate\Http\Response
   */
  public function update(Request $request, $id)
  {
    if ($request->has('act') && $request->act === 'jadwal') {
      $json = [];

      // Check if the necessary form fields are present in the request
      if (
        $request->has('jam_awal') && $request->has('jam_akhir') &&
        $request->has('senin') && $request->has('selasa') &&
        $request->has('rabu') && $request->has('kamis') &&
        $request->has('jumat') && $request->has('sabtu')
      ) {
        $count = count($request->jam_awal); // Jumlah elemen dalam array

        for ($i = 0; $i < $count; $i++) {
          // Periksa apakah indeks ada dalam array sebelum mengaksesnya
          $jam_awal = $request->jam_awal[$i] ?? null;
          $jam_akhir = $request->jam_akhir[$i] ?? null;
          $senin = $request->senin[$i] ?? null;
          $selasa = $request->selasa[$i] ?? null;
          $rabu = $request->rabu[$i] ?? null;
          $kamis = $request->kamis[$i] ?? null;
          $jumat = $request->jumat[$i] ?? null;
          $sabtu = $request->sabtu[$i] ?? null;

          if ($jam_awal !== null || $jam_akhir !== null || $senin !== null || $selasa !== null || $rabu !== null || $kamis !== null || $jumat !== null || $sabtu !== null) {
            $json[] = [
              'jam_awal' => $jam_awal,
              'jam_akhir' => $jam_akhir,
              'senin' => $senin,
              'selasa' => $selasa,
              'rabu' => $rabu,
              'kamis' => $kamis,
              'jumat' => $jumat,
              'sabtu' => $sabtu,
            ];
          }
        }
      }

      Jadwal::find($id)->update(['jadwal' => json_encode($json)]);
    } else {
      // Handle other fields or attributes as needed
      Jadwal::find($id)->update($request->except('_token', 'act', 'jam_awal', 'jam_akhir', 'senin', 'selasa', 'rabu', 'kamis', 'jumat', 'sabtu'));
    }

    return redirect(route('jadwal'));
  }



  /**
   * Remove the specified resource from storage.
   *
   * @param  \App\Models\Jadwal  $jadwal
   * @return \Illuminate\Http\Response
   */
  public function destroy($id)
  {
    Jadwal::find($id)->delete();

    return redirect()->back();
  }
}
