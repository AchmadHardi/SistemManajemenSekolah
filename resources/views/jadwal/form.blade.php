@push('script')
    <script>
        function hapus(e) {
            $(e).closest('tr').remove();
            if ($('tbody tr').length === 1) {
                $('.act').hide();
            }
        }

        function updateSelectNames() {
            $('tbody tr').each(function(index) {
                const newIndex = `_${index}`;
                $(this).find('input[name^="jam_awal"]').attr('name', `jam_awal${newIndex}`);
                $(this).find('input[name^="jam_akhir"]').attr('name', `jam_akhir${newIndex}`);
                $(this).find('select[name^="senin"]').attr('name', `senin${newIndex}`);
                $(this).find('select[name^="selasa"]').attr('name', `selasa${newIndex}`);
                $(this).find('select[name^="rabu"]').attr('name', `rabu${newIndex}`);
                $(this).find('select[name^="kamis"]').attr('name', `kamis${newIndex}`);
                $(this).find('select[name^="jumat"]').attr('name', `jumat${newIndex}`);
                $(this).find('select[name^="sabtu"]').attr('name', `sabtu${newIndex}`);
            });
        }

        $(document).on('click', '.btn-hapus', function() {
            hapus(this);
            updateSelectNames(); // Call this after removing a row
        });

        $('.btn').click(function() {
            // // if ($(this).hasClass('btn-tambah')) {
            //     const i = $('tbody tr').length;
            //     const lastRow = $('tbody tr:last');

            //     // Clone the last row, append to the table, and clear input values
            //     const newRow = lastRow.clone();
            //     newRow.find('input[type="time"]').val('');
            //     newRow.find('select').val('');

            //     // Add the new row to the table
            //     $('tbody').append(newRow);
            //     console.log(newRow)
            //     if ($('tbody tr').length > 1) {
            //         $('.act').show();
            //     }

            //     updateSelectNames(); // Call this after adding a row
            // // }
            const newRow = ''
            +'<tr>'
            +'<td class="col-1">'
            +'<input type="time" name="jam_awal[]" class="form-control form-control-sm">'
            +'</td>'
            +'<td class="col-1">'
            +'<input type="time" name="jam_akhir[]" class="form-control form-control-sm">'
            +'</td>'
            +'<td>'
            +'<select name="senin[]" id="senin_0" class="form-select form-select-sm">'
            +'<option value="" selected disabled hidden></option>'
            @foreach ($pelajaran as $item)
            +'<option value="{{ $item->mapel }}">{{ $item->mapel }}</option>'
            @endforeach
            +'</select>'
            +'</td>'
            +'<td>'
            +'<select name="selasa[]" id="selasa_0" class="form-select form-select-sm">'
            +'<option value="" selected disabled hidden></option>'
            @foreach ($pelajaran as $item)
            +'<option value="{{ $item->mapel }}">{{ $item->mapel }}</option>'
            @endforeach
            +'</select>'
            +'</td>'
            +'<td>'
            +'<select name="rabu[]" id="rabu_0" class="form-select form-select-sm">'
            +'<option value="" selected disabled hidden></option>'
            @foreach ($pelajaran as $item)
            +'<option value="{{ $item->mapel }}">{{ $item->mapel }}</option>'
            @endforeach
            +'</select>'
            +'</td>'
            +'<td>'
            +'<select name="kamis[]" id="kamis_0" class="form-select form-select-sm">'
            +'<option value="" selected disabled hidden></option>'
            @foreach ($pelajaran as $item)
            +'<option value="{{ $item->mapel }}">{{ $item->mapel }}</option>'
            @endforeach
            +'</select>'
            +'</td>'
            +'<td>'
            +'<select name="jumat[]" id="jumat_0" class="form-select form-select-sm">'
            +'<option value="" selected disabled hidden></option>'
            @foreach ($pelajaran as $item)
            +'<option value="{{ $item->mapel }}">{{ $item->mapel }}</option>'
            @endforeach
            +'</select>'
            +'</td>'
            +'<td>'
            +'<select name="sabtu[]" id="sabtu_0" class="form-select form-select-sm">'
            +'<option value="" selected disabled hidden></option>'
            @foreach ($pelajaran as $item)
            +'<option value="{{ $item->mapel }}">{{ $item->mapel }}</option>'
            @endforeach
            +'</select>'
            +'</td>'
            +'<td class="act">'
            +'<button type="button" onclick="hapus(this)" class="btn btn-sm btn-danger btn-hapus">'
            +'<i class="bi bi-dash-circle"></i>'
            +'</button>'
            +'</td>'
            +'</tr>'
            ;
            $('tbody').append(newRow);

        });

        // Call updateSelectNames to initialize the select field names when the page loads
        updateSelectNames();
    </script>
@endpush





@extends('layouts.app_new')
@section('contents')
    <div class="col-12">
        <form action="{{ route('jadwal.save.update', $jadwal->id) }}" method="post" class="needs-validation" novalidate>
            @csrf
            <input type="hidden" name="id" value="{{$id}}">
            <input type="hidden" name="act" value="jadwal">
            <div class="card">
                <div class="card-header">
                    <h5>Form Tambah Jadwal Mata Pelajaran</h5>
                </div>
                <div class="card-body">
                    <div class="form-group mb-3 col-12 col-md-4">
                        <label for="kd_jadwal" class="form-label">Kode Jadwal</label>
                        <input type="text" name="kd_jadwal" id="kd_jadwal" class="form-control"
                            value="{{ $jadwal->kd_jadwal }}" readonly>
                    </div>

                    <div class="form-group mb-3 col-12 col-md-4">
                        <label for="kd_kurikulum" class="form-label">Kode Kurikulum</label>
                        <input type="text" name="kd_kurikulum" id="kd_kurikulum" class="form-control"
                            value="{{ $jadwal->kurikulum->kd_kurikulum }}" readonly>
                    </div>

                    <div class="table-responsive">
                        <table class="table table-striped-columns">
                            <thead>
                                <tr>
                                    <th>Jam Awal</th>
                                    <th>Jam Akhir</th>
                                    <th>Senin</th>
                                    <th>Selasa</th>
                                    <th>Rabu</th>
                                    <th>Kamis</th>
                                    <th>Jumat</th>
                                    <th>Sabtu</th>
                                    <th style="width: 1px" class="act">#</th>
                                </tr>
                            </thead>
                            <tbody>
                                @if ($jadwal->jadwal)
                                    @php
                                        $data_jadwal = json_decode($jadwal->jadwal, true);
                                    @endphp
                                    @foreach ($data_jadwal as $i => $jadwal)
                                        <tr>
                                            <td class="col-1">
                                                <input type="time" name="jam_awal[]" class="form-control form-control-sm"
                                                    value="{{ $jadwal['jam_awal'] ?? '' }}">
                                            </td>

                                            <td class="col-1">
                                                <input type="time" name="jam_akhir[]" class="form-control form-control-sm"
                                                    value="{{ $jadwal['jam_akhir'] ?? '' }}">
                                            </td>
                                            <td>
                                                <select name="senin[]" id="senin_{{ $i }}"
                                                    class="form-select form-select-sm">
                                                    <option value="" selected disabled hidden></option>
                                                    @foreach ($pelajaran as $item)
                                                        <option value="{{ $item->mapel }}"
                                                            {{ isset($jadwal['senin']) && $item->mapel === $jadwal['senin'] ? 'selected' : '' }}>
                                                            {{ $item->mapel }}
                                                        </option>
                                                    @endforeach
                                                </select>
                                            </td>
                                            <td>
                                                <select name="selasa[]" id="selasa_{{ $i }}"
                                                    class="form-select form-select-sm">
                                                    <option value="" selected disabled hidden></option>
                                                    @foreach ($pelajaran as $item)
                                                        <option value="{{ $item->mapel }}"
                                                            {{ $item->mapel === $jadwal['selasa'] ? 'selected' : '' }}>
                                                            {{ $item->mapel }}
                                                        </option>
                                                    @endforeach
                                                </select>
                                            </td>
                                            <td>
                                                <select name="rabu[]" id="rabu_{{ $i }}"
                                                    class="form-select form-select-sm">
                                                    <option value="" selected disabled hidden></option>
                                                    @foreach ($pelajaran as $item)
                                                        <option value="{{ $item->mapel }}"
                                                            {{ $item->mapel === $jadwal['rabu'] ? 'selected' : '' }}>
                                                            {{ $item->mapel }}
                                                        </option>
                                                    @endforeach
                                                </select>
                                            </td>
                                            <td>
                                                <select name="kamis[]" id="kamis_{{ $i }}"
                                                    class="form-select form-select-sm">
                                                    <option value="" selected disabled hidden></option>
                                                    @foreach ($pelajaran as $item)
                                                        <option value="{{ $item->mapel }}"
                                                            {{ $item->mapel === $jadwal['kamis'] ? 'selected' : '' }}>
                                                            {{ $item->mapel }}
                                                        </option>
                                                    @endforeach
                                                </select>
                                            </td>
                                            <td>
                                                <select name="jumat[]" id="jumat_{{ $i }}"
                                                    class="form-select form-select-sm">
                                                    <option value="" selected disabled hidden></option>
                                                    @foreach ($pelajaran as $item)
                                                        <option value="{{ $item->mapel }}"
                                                            {{ $item->mapel === $jadwal['jumat'] ? 'selected' : '' }}>
                                                            {{ $item->mapel }}
                                                        </option>
                                                    @endforeach
                                                </select>
                                            </td>
                                            <td>
                                                <select name="sabtu[]" id="sabtu_{{ $i }}"
                                                    class="form-select form-select-sm">
                                                    <option value="" selected disabled hidden></option>
                                                    @foreach ($pelajaran as $item)
                                                        <option value="{{ $item->mapel }}"
                                                            {{ $item->mapel === $jadwal['sabtu'] ? 'selected' : '' }}>
                                                            {{ $item->mapel }}
                                                        </option>
                                                    @endforeach
                                                </select>
                                            </td>
                                            <td class="act">
                                                <button type="button" onclick="hapus(this)"
                                                    class="btn btn-sm btn-danger btn-hapus">
                                                    <i class="bi bi-dash-circle"></i>
                                                </button>
                                            </td>

                                        </tr>
                                    @endforeach
                                @else
                                    <tr>
                                        <td class="col-1">
                                            <input type="time" name="jam_awal[]" class="form-control form-control-sm">
                                        </td>
                                        <td class="col-1">
                                            <input type="time" name="jam_akhir[]" class="form-control form-control-sm">
                                        </td>
                                        <td>
                                            <select name="senin[]" id="senin_0" class="form-select form-select-sm">
                                                <option value="" selected disabled hidden></option>
                                                @foreach ($pelajaran as $item)
                                                    <option value="{{ $item->mapel }}">{{ $item->mapel }}</option>
                                                @endforeach
                                            </select>
                                        </td>
                                        <td>
                                            <select name="selasa[]" id="selasa_0" class="form-select form-select-sm">
                                                <option value="" selected disabled hidden></option>
                                                @foreach ($pelajaran as $item)
                                                    <option value="{{ $item->mapel }}">{{ $item->mapel }}</option>
                                                @endforeach
                                            </select>
                                        </td>
                                        <td>
                                            <select name="rabu[]" id="rabu_0" class="form-select form-select-sm">
                                                <option value="" selected disabled hidden></option>
                                                @foreach ($pelajaran as $item)
                                                    <option value="{{ $item->mapel }}">{{ $item->mapel }}</option>
                                                @endforeach
                                            </select>
                                        </td>
                                        <td>
                                            <select name="kamis[]" id="kamis_0" class="form-select form-select-sm">
                                                <option value="" selected disabled hidden></option>
                                                @foreach ($pelajaran as $item)
                                                    <option value="{{ $item->mapel }}">{{ $item->mapel }}</option>
                                                @endforeach
                                            </select>
                                        </td>
                                        <td>
                                            <select name="jumat[]" id="jumat_0" class="form-select form-select-sm">
                                                <option value="" selected disabled hidden></option>
                                                @foreach ($pelajaran as $item)
                                                    <option value="{{ $item->mapel }}">{{ $item->mapel }}</option>
                                                @endforeach
                                            </select>
                                        </td>
                                        <td>
                                            <select name="sabtu[]" id="sabtu_0" class="form-select form-select-sm">
                                                <option value="" selected disabled hidden></option>
                                                @foreach ($pelajaran as $item)
                                                    <option value="{{ $item->mapel }}">{{ $item->mapel }}</option>
                                                @endforeach
                                            </select>
                                        </td>
                                        <td class="act">
                                            <button type="button" onclick="hapus(this)"
                                                class="btn btn-sm btn-danger btn-hapus">
                                                <i class="bi bi-dash-circle"></i>
                                            </button>
                                        </td>

                                    </tr>
                                @endif
                            </tbody>
                        </table>
                    </div>
                    <button type="button" class="btn btn-sm btn-success btn-tambah"><i
                            class="bi bi-plus-circle"></i></button>
                </div>
                <div class="card-footer">
                    <a href="{{ route('jadwal') }}" class="btn btn-danger">Kembali</a>
                    <button type="submit" class="btn btn-primary float-end">Simpan</button>
                </div>
            </div>
        </form>
    </div>
@endsection
