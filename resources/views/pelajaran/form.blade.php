@extends('layouts.app_new')

@section('contents')
    <div class="col-12 col-md-8 col-lg-6 offset-md-2 offset-lg-3">

        @if (Request()->is('pelajaran/create'))
            <form action="{{ route('pelajaran.store') }}" method="post" class="needs-validation" novalidate>
                @csrf
                {{-- <div class="card">
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
        </div> --}}
            </form>
        @else
            {{-- @foreach ($pelajaran as $pj) --}}
                <form action="{{ route('pelajaran.save.update', $pelajaran->id) }}" method="post" class="needs-validation"
                    novalidate>
                    @csrf
                    @method('PUT')
                    <div class="card">
                        <div class="card-header">
                            <h5 class="mb-0">Form Tambah Pelajaran</h5>
                        </div>
                        <div class="card-body">
                            <div class="form-group mb-3">
                                <label for="mapel" class="form-label">Mata Pelajaran</label>
                                <input type="text" name="mapel" id="mapel"
                                    class="form-control @error('mapel') is-invalid @enderror" value="{{ old('mapel', $pelajaran->mapel) }}"
                                    required>
                                @error('mapel')
                                    <div class="invalid-feedback">
                                        {{ $message }}
                                    </div>
                                @enderror
                            </div>
                            <div class="form-group mb-3">
                                <label for="id_guru" class="form-label">Guru</label>
                                <select name="id_guru" id="id_guru" class="form-select form-control" required>
                                    @foreach ($guru as $g)
                                      
                                        @if ($pelajaran->id_guru == $g->id)
                                            <option value="{{ $g->id }}" selected>
                                                {{ $g->nama }}</option>
                                        @else
                                            <option value="{{ $g->id }}">{{ $g->nama }}
                                            </option>
                                        @endif
                                    @endforeach
                                </select>
                                {{-- <select name="id_guru" id="id_guru" class="form-select form-control" required>
                <option value="" selected disabled hidden></option>
                @foreach ($guru as $item)
                  <option value="{{ $item->id }}" @selected(old('id_guru') === $item->id)>{{ $item->nama }}</option>
                @endforeach
              </select> --}}
                                @error('id_guru')
                                    <div class="invalid-feedback">
                                        {{ $message }}
                                    </div>
                                @enderror
                            </div>
                            <div class="form-group">
                                <label for="sts" class="form-label">Status</label>
                                <div class="form-check">
                                    <input type="checkbox" name="status" id="status" class="form-check-input"
                                        @checked(old('status', true))>
                                    <label for="status" class="form-check-label">Aktif</label>
                                    @error('mapel')
                                        <div class="invalid-feedback">
                                            {{ $message }}
                                        </div>
                                    @enderror
                                </div>
                            </div>
                        </div>
                        <div class="card-footer">
                            <button type="submit" class="btn btn-sm btn-primary float-end">Simpan</button>
                        </div>
                    </div>
                    {{-- <div class="card">
          <div class="card-header">
            <h5 class="mb-0">Form Ubah Data Siswa</h5>
          </div>
          <div class="card-body">
            <div class="form-group mb-3">
              <label for="nis" class="form-label">NIS</label>
              <input type="text" name="nis" id="nis" pattern="[0-9]+" class="form-control @error('nis') is-invalid @enderror" value="{{ old('nis', $siswa->nis) }}" readonly required>
              @error('nis')
                <div class="invalid-feedback">
                  {{ $message }}
                </div>
              @enderror
            </div>
            <div class="form-group mb-3">
              <label for="nama" class="form-label">Nama Siswa</label>
              <input type="text" name="nama" id="nama" class="form-control @error('nama') is-invalid @enderror" value="{{ old('nama', $siswa->nama) }}" required>
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
                    <input type="radio" name="jk" id="lk" value="Laki-laki" class="form-check-input @error('jk') is-invalid @enderror" @checked(old('jk', $siswa->jk) === 'Laki-laki') required>
                    <label for="lk" class="form-check-label">Laki-laki</label>
                  </div>
                </div>
                <div class="col-auto">
                  <div class="form-check">
                    <input type="radio" name="jk" id="pr" value="Perempuan" class="form-check-input @error('jk') is-invalid @enderror" @checked(old('jk', $siswa->jk) === 'Perempuan') required>
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
              <textarea name="alamat" id="alamat" class="form-control @error('alamat') is-invalid @enderror" required>{{ old('alamat', $siswa->alamat) }}</textarea>
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
        </div> --}}
                </form>
            {{-- @endforeach --}}
        @endif
    </div>
    {{-- </x-app2-layout> --}}
@endsection
