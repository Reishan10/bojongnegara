@extends('layouts.backend_main')
@section('title', 'Pengguna')
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
                        <a href="{{ route('pengguna.create') }}" class="btn btn-primary me-1"> <i
                                class="fas fa-plus"></i></a>
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
                                            <th>No Telepon</th>
                                            <th>Jenis Kelamin</th>
                                            <th>Tipe</th>
                                            <th>Status</th>
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
                ajax: "{{ url('pengguna') }}",
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
                        data: 'no_telepon',
                        name: 'no_telepon'
                    },
                    {
                        data: 'gender',
                        name: 'gender'
                    },
                    {
                        data: 'type',
                        name: 'type'
                    },
                    {
                        data: 'active_status',
                        name: 'active_status',
                        orderable: false,
                        searchable: false
                    },
                    {
                        data: 'aksi',
                        name: 'aksi',
                        orderable: false,
                        searchable: false
                    }
                ]
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
                            url: "{{ url('pengguna') }}/" + id,
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
                                url: "{{ route('delete-multiple-pengguna') }}",
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
