@extends('layouts.backend_main')
@section('title', 'Tag')
@section('content')
    <div class="page-wrapper">
        <div class="content container-fluid">

            <div class="page-header">
                <div class="row align-items-center">
                    <div class="col">
                        <h3 class="page-title">@yield('title')</h3>
                        <ul class="breadcrumb">
                            <li class="breadcrumb-item"><a href="{{ route('dashboard.index') }}">Dashboard</a></li>
                            <li class="breadcrumb-item active">@yield('title')</li>
                        </ul>
                    </div>
                    <div class="col-auto">
                        <button type="button" class="btn btn-danger me-1" id="btnHapusBanyak">
                            <i class="fas fa-trash"></i>
                        </button>
                        <button type="button" class="btn btn-primary me-1" id="btnTambah">
                            <i class="fas fa-plus"></i>
                        </button>
                    </div>
                </div>
            </div>

            <div class="row">
                <div class="col-sm-12">
                    <div class="card card-table">
                        <div class="card-body">
                            <div class="table-responsive">
                                <table class="table table-stripped table-hover" id="datatable">
                                    <thead class="thead-light">
                                        <tr>
                                            <th width="1%"></th>
                                            <th>#</th>
                                            <th>Nama</th>
                                            <th width="20%">Aksi</th>
                                        </tr>
                                    </thead>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- tag modal -->
    <div id="tagModal" class="modal fade" tabindex="-1" role="dialog" aria-labelledby="tagModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <form id="tagForm">
                    @csrf
                    <div class="modal-header">
                        <h4 class="modal-title" id="tagModalLabel"></h4>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-hidden="true"></button>
                    </div>
                    <div class="modal-body">
                        <div class="mb-3">
                            <input type="hidden" name="id" id="id">
                            <label for="name" class="form-label">Tag</label>
                            <input type="text" id="name" name="name" class="form-control">
                            <div class="invalid-feedback errorName"></div>
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-light" data-bs-dismiss="modal">Tutup</button>
                        <button type="submit" class="btn btn-primary" id="simpan">Simpan</button>
                    </div>
                </form>
            </div><!-- /.modal-content -->
        </div><!-- /.modal-dialog -->
    </div><!-- /.modal -->

    <script>
        $(document).ready(function() {
            $.ajaxSetup({
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                }
            });

            var table = $('#datatable').DataTable({
                processing: true,
                serverSide: true,
                ajax: "{{ url('tag') }}",
                columns: [{
                        data: 'comboBox',
                        orderable: false,
                        searchable: false
                    }, {
                        data: 'DT_RowIndex',
                        name: 'DT_RowIndex',
                        orderable: false,
                        searchable: false
                    },
                    {
                        data: 'name',
                        name: 'name'
                    },
                    {
                        data: 'aksi',
                        name: 'aksi'
                    }
                ]
            });

            // Tambah Data
            $('#btnTambah').click(function() {
                $('#id').val('');
                $('#tagModalLabel').html("Tambah Tag");
                $('#tagModal').modal('show');
                $('#tagForm').trigger("reset");
                $('#name').removeClass('is-invalid');
                $('.errorName').html('');
            });

            // Edit Data
            $('body').on('click', '#btnEdit', function() {
                var id = $(this).data('id');
                $.ajax({
                    type: "GET",
                    url: "tag/" + id + "/edit",
                    dataType: "json",
                    success: function(response) {
                        $('#tagModalLabel').html("Edit Tag");
                        $('#simpan').val("edit-tag");
                        $('#tagModal').modal('show');
                        $('#name').removeClass('is-invalid');
                        $('.errorName').html('');
                        $('#id').val(response.id);
                        $('#name').val(response.name);
                    }
                });
            });

            $('#tagForm').submit(function(e) {
                e.preventDefault();
                $.ajax({
                    data: $(this).serialize(),
                    url: "{{ route('tag.store') }}",
                    type: "POST",
                    dataType: 'json',
                    beforeSend: function() {
                        $('#simpan').attr('disabled', 'disabled');
                        $('#simpan').text('Proses...');
                    },
                    complete: function() {
                        $('#simpan').removeAttr('disabled');
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
                        } else {
                            Swal.fire({
                                icon: 'success',
                                title: 'Sukses',
                                text: 'Data berhasil disimpan',
                            });
                            $('#tagModal').modal('hide');
                            $('#tagForm').trigger("reset");
                            table.ajax.reload();
                        }
                    },
                    error: function(xhr, ajaxOptions, thrownError) {
                        console.error(xhr.status + "\n" + xhr.responseText + "\n" +
                            thrownError);
                    }
                });
            });

            // Hapus Data
            $('body').on('click', '#btnHapus', function() {
                var id = $(this).data('id');
                Swal.fire({
                    title: 'Hapus',
                    text: "Apakah anda yakin?",
                    icon: 'warning',
                    showCancelButton: true,
                    confirmButtonColor: '#3085d6',
                    cancelButtonColor: '#d33',
                    confirmButtonText: 'Ya, Hapus!',
                    cancelButtonText: 'Batal',
                }).then((result) => {
                    if (result.isConfirmed) {
                        $.ajax({
                            type: "DELETE",
                            url: "{{ url('tag') }}/" + id,
                            data: {
                                id: id
                            },
                            dataType: 'json',
                            success: function(response) {
                                if (response.success) {
                                    Swal.fire({
                                        icon: 'success',
                                        title: 'Sukses',
                                        text: response.success,
                                    });
                                    table.ajax.reload();
                                } else {
                                    Swal.fire({
                                        icon: 'error',
                                        title: 'Oops...',
                                        text: response.error,
                                    });
                                }
                            },
                            error: function(xhr, ajaxOptions, thrownError) {
                                console.error(xhr.status + "\n" + xhr.responseText +
                                    "\n" + thrownError);
                            }
                        });
                    }
                });
            });

            // Hapus Banyak Data
            $('#btnHapusBanyak').on('click', function(e) {
                let idArr = [];
                $("#checkbox:checked").each(function() {
                    idArr.push($(this).attr('data-id'));
                });
                if (idArr.length <= 0) {
                    Swal.fire({
                        icon: 'error',
                        title: 'Oops...',
                        text: 'Silakan pilih data terlebih dahulu untuk dihapus!',
                    })
                } else {
                    Swal.fire({
                        title: 'Hapus',
                        text: "Apakah anda yakin?",
                        icon: 'warning',
                        showCancelButton: true,
                        confirmButtonColor: '#3085d6',
                        cancelButtonColor: '#d33',
                        confirmButtonText: 'Ya, Hapus!',
                        cancelButtonText: 'Batal',
                    }).then((result) => {
                        let strId = idArr.join(",");
                        if (result.isConfirmed) {
                            $.ajax({
                                url: "{{ route('delete-multiple-tag') }}",
                                type: 'POST',
                                data: 'id=' + strId,
                                success: function(response) {
                                    console.log(response);
                                    if (response.success) {
                                        Swal.fire({
                                            icon: 'success',
                                            title: 'Sukses',
                                            text: response.success,
                                        });
                                        $('#datatable').DataTable().ajax.reload();
                                        $("#check_all").prop('checked', false);
                                        $(".checkbox").prop('checked', false);
                                    }
                                },
                                error: function(xhr, ajaxOptions, thrownError) {
                                    alert(xhr.status + "\n" + xhr.responseText + "\n" +
                                        thrownError);
                                }
                            })
                        }
                    })
                }
            });
        });
    </script>
@endsection
