@extends('layouts.app_new')

@section('contents')
    <div class="col-12 col-md-8 col-lg-6 offset-md-2 offset-lg-3">

        {{-- @if (Request()->is('siswa/create')) --}}
            {{-- <form action="{{ route('siswa.store') }}" method="post" class="needs-validation" novalidate>
        @csrf
        <div class="card">
          <div class="card-header">
            <h5 class="mb-0">Form Tambah Data Siswa</h5>
          </div>
          <div class="card-body">
            <div class="form-group mb-3">
              <label for="nama" class="form-label">Nama Siswa</label>
              <input type="text" name="nama" id="nama" class="form-control @error('nama') is-invalid @enderror" value="{{ old('nama') }}" required>
              @error('nama')
                <div class="invalid-feedback">
                  {{ $message }}
                </div>
              @enderror
            </div>
            <div class="form-group mb-3">
              <label for="jk" class="form-label">Jenis Kelamin</label>
              <div class="row gx-5">
                <div class="col-auto">
                  <div class="form-check">
                    <input type="radio" name="jk" id="lk" value="Laki-laki" class="form-check-input @error('jk') is-invalid @enderror" @checked(old('jk') === 'Laki-laki') required>
                    <label for="lk" class="form-check-label">Laki-laki</label>
                  </div>
                </div>
                <div class="col-auto">
                  <div class="form-check">
                    <input type="radio" name="jk" id="pr" value="Perempuan" class="form-check-input @error('jk') is-invalid @enderror" @checked(old('jk') === 'Perempuan') required>
                    <label for="pr" class="form-check-label">Perempuan</label>
                  </div>
                </div>
              </div>
              @error('jk')
                <div class="invalid-feedback">
                  {{ $message }}
                </div>
              @enderror
            </div>
            <div class="form-group mb-3">
              <label for="alamat" class="form-label">Alamat</label>
              <textarea name="alamat" id="alamat" class="form-control @error('alamat') is-invalid @enderror" required>{{ old('alamat') }}</textarea>
              @error('alamat')
                <div class="invalid-feedback">
                  {{ $message }}
                </div>
              @enderror
            </div>
          </div>
          <div class="card-footer">
            <a href="{{ route('siswa') }}" class="btn btn-sm btn-danger">Kembali</a>
            <button type="submit" class="btn btn-sm btn-primary float-end">Simpan</button>
          </div>
        </div>
      </form> --}}
        {{-- @else --}}
            <form action="{{ route('kurikulum.save.update', $kurikulum->id) }}" method="post" class="needs-validation"
                novalidate>
                @csrf
                @method('PUT')
                <div class="card">
                    <div class="card-header">
                        <h5 class="mb-0">Form Tambah Kurikulum</h5>
                    </div>
                    <div class="card-body">
                        <div class="form-group mb-3">
                            <label for="semester" class="form-label">Semester</label>
                            <input type="number" pattern="[0-9]+" name="semester" id="semester"
                                class="form-control @error('semester') is-invalid @enderror"
                                value="{{ old('semester', $kurikulum->semester) }}" required>
                            @error('semester')
                                <div class="invalid-feedback">
                                    {{ $message }}
                                </div>
                            @enderror
                        </div>
                        <div class="form-group mb-3">
                            <label for="tahun" class="form-label">Tahun</label>
                            <input type="text" pattern="[0-9]+" maxlength="4" name="tahun" id="tahun"
                                class="form-control @error('tahun') is-invalid @enderror"
                                value="{{ old('tahun', $kurikulum->tahun) }}" required>
                            @error('tahun')
                                <div class="invalid-feedback">
                                    {{ $message }}
                                </div>
                            @enderror
                        </div>
                    </div>
                    <div class="card-footer">
                        <button type="submit" class="btn btn-sm btn-primary float-end">Simpan</button>
                    </div>
                </div>
            </form>
        {{-- @endif --}}
    </div>
@endsection
