@extends('layouts.backend_main')
@section('title', 'Tambah Pengguna')
@section('content')
    <div class="page-wrapper">
        <div class="content container-fluid">
            <div class="page-header">
                <div class="row align-items-center">
                    <div class="col">
                        <h3 class="page-title">@yield('title')</h3>
                        <ul class="breadcrumb">
                            <li class="breadcrumb-item"><a href="{{ route('dashboard.index') }}">Dashboard</a></li>
                            <li class="breadcrumb-item"><a href="{{ route('pengguna.index') }}">Pengguna</a></li>
                            <li class="breadcrumb-item active">@yield('title')</li>
                        </ul>
                    </div>
                    <div class="col-auto">
                        <a href="{{ route('pengguna.index') }}" class="btn btn-secondary btn-blog mb-3"><i
                                class="fa-solid fa-rotate-left"></i>
                            Kembali</a>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-md-12">
                    <div class="card">
                        <div class="card-body">
                            <form id="form">
                                <div class="row form-group">
                                    <label for="name" class="col-sm-2 col-form-label input-label">Nama</label>
                                    <input type="hidden" name="id" value="{{ $user->id }}">
                                    <div class="col-sm-10">
                                        <input type="text" class="form-control" id="name" name="name"
                                            value="{{ $user->name }}">
                                        <small class="text-danger errorName"></small>
                                    </div>
                                </div>
                                <div class="row form-group">
                                    <label for="email" class="col-sm-2 col-form-label input-label">Email</label>
                                    <div class="col-sm-10">
                                        <input type="email" class="form-control" id="email" name="email"
                                            value="{{ $user->email }}">
                                        <small class="text-danger errorEmail"></small>
                                    </div>
                                </div>
                                <div class="row form-group">
                                    <label for="no_telepon" class="col-sm-2 col-form-label input-label">No Telepon</label>
                                    <div class="col-sm-10">
                                        <input type="number" class="form-control" id="no_telepon" name="no_telepon"
                                            value="{{ $user->no_telepon }}">
                                        <small class="text-danger errorNoTelepon"></small>
                                    </div>
                                </div>
                                <div class="row form-group">
                                    <label for="gender" class="col-sm-2 col-form-label input-label">Jenis Kelamin</label>
                                    <div class="col-sm-10">
                                        <select name="gender" id="gender" class="form-control">
                                            <option value="">-- Pilih jenis kelamin --</option>
                                            <option value="Laki-laki" {{ $user->gender == 'Laki-laki' ? 'selected' : '' }}>
                                                Laki-laki</option>
                                            <option value="Perempuan" {{ $user->gender == 'Perempuan' ? 'selected' : '' }}>
                                                Perempuan</option>
                                        </select>
                                        <small class="text-danger errorGender"></small>
                                    </div>
                                </div>
                                <div class="row form-group">
                                    <label for="address" class="col-sm-2 col-form-label input-label">Alamat</label>
                                    <div class="col-sm-10">
                                        <textarea name="address" id="address" rows="3" class="form-control">{{ $user->address }}</textarea>
                                        <small class="text-danger errorAddress"></small>
                                    </div>
                                </div>
                                <div class="row form-group">
                                    <label for="type" class="col-sm-2 col-form-label input-label">Tipe</label>
                                    <div class="col-sm-10">
                                        <select name="type" id="type" class="form-control">
                                            <option value="">-- Pilih tipe --</option>
                                            <option value="0" {{ $user->type == 'Administrator' ? 'selected' : '' }}>
                                                Administrator</option>
                                            <option value="1" {{ $user->type == 'Perangkat' ? 'selected' : '' }}>
                                                Perangkat</option>
                                        </select>
                                        <small class="text-danger errorType"></small>
                                    </div>
                                </div>
                                <div class="row form-group">
                                    <label for="status" class="col-sm-2 col-form-label input-label">Status</label>
                                    <div class="col-sm-10">
                                        <div class="form-check form-switch">
                                            <input class="form-check-input" type="checkbox" role="switch" id="status"
                                                name="status" {{ $user->active_status == '0' ? 'checked' : '' }}>
                                            <label class="form-check-label" for="status" id="status-label">
                                                {{ $user->active_status == '0' ? 'Aktif' : 'Tidak aktif' }}</label>
                                        </div>
                                    </div>
                                </div>

                                <div class="text-end mt-4">
                                    <button type="submit" class="btn btn-primary" id="simpan">Simpan</button>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <script>
        const statusCheckbox = document.getElementById('status');
        const statusLabel = document.getElementById('status-label');

        // Fungsi untuk mengubah teks label berdasarkan status checkbox
        function toggleLabel() {
            if (statusCheckbox.checked) {
                statusLabel.textContent = 'Aktif';
            } else {
                statusLabel.textContent = 'Tidak aktif';
            }
        }

        // Panggil fungsi toggleLabel saat halaman dimuat dan saat status checkbox berubah
        window.addEventListener('DOMContentLoaded', toggleLabel);
        statusCheckbox.addEventListener('change', toggleLabel);

        $(document).ready(function() {
            $.ajaxSetup({
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                }
            });

            $('#form').submit(function(e) {
                e.preventDefault();

                const statusValue = statusCheckbox.checked ? 0 : 1;

                $.ajax({
                    data: $(this).serialize() + "&status=" + statusValue,
                    url: "{{ url('pengguna/"+id+"') }}",
                    type: "POST",
                    dataType: 'json',
                    beforeSend: function() {
                        $('#simpan').attr('disable', 'disabled');
                        $('#simpan').text('Proses...');
                    },
                    complete: function() {
                        $('#simpan').removeAttr('disable');
                        $('#simpan').html('Simpan');
                    },
                    success: function(response) {
                        if (response.errors) {
                            if (response.errors.name) {
                                $('#name').addClass('is-invalid');
                                $('.errorName').html(response.errors.name);
                            } else {
                                $('#name').removeClass('is-invalid');
                                $('.errorName').html('');
                            }
                            if (response.errors.email) {
                                $('#email').addClass('is-invalid');
                                $('.errorEmail').html(response.errors.email);
                            } else {
                                $('#email').removeClass('is-invalid');
                                $('.errorEmail').html('');
                            }

                            if (response.errors.no_telepon) {
                                $('#no_telepon').addClass('is-invalid');
                                $('.errorNoTelepon').html(response.errors.no_telepon);
                            } else {
                                $('#no_telepon').removeClass('is-invalid');
                                $('.errorNoTelepon').html('');
                            }

                            if (response.errors.gender) {
                                $('#gender').addClass('is-invalid');
                                $('.errorGender').html(response.errors.gender);
                            } else {
                                $('#gender').removeClass('is-invalid');
                                $('.errorGender').html('');
                            }

                            if (response.errors.address) {
                                $('#address').addClass('is-invalid');
                                $('.errorAddress').html(response.errors.address);
                            } else {
                                $('#address').removeClass('is-invalid');
                                $('.errorAddress').html('');
                            }

                            if (response.errors.type) {
                                $('#type').addClass('is-invalid');
                                $('.errorType').html(response.errors.type);
                            } else {
                                $('#type').removeClass('is-invalid');
                                $('.errorType').html('');
                            }
                        } else {
                            Swal.fire({
                                icon: 'success',
                                title: 'Sukses',
                                text: 'Data berhasil disimpan',
                            }).then(function() {
                                top.location.href = "{{ route('pengguna.index') }}";
                            });
                        }
                    },
                    error: function(xhr, ajaxOptions, thrownError) {
                        console.error(xhr.status + "\n" + xhr.responseText + "\n" +
                            thrownError);
                    }
                });
            });
        });
    </script>
@endsection
