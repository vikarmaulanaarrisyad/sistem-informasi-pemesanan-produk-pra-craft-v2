@extends('layouts.app')

@section('title', 'Daftar Transaksi')

@section('breadcrumb')
    @parent
    <li class="breadcrumb-item active">Daftar Transaksi</li>
@endsection

@section('content')
    <div class="row">
        <div class="col-md-12">
            <x-card>
                <x-slot name="header">
                    <div class="btn-group">
                        <a target="_blank" href="{{ route('products.export.pdf') }}" class="btn btn-danger"><i
                                class="fas fa-file-pdf"></i> Export
                            PDF</a>
                        <a target="_blank" href="{{ route('products.export.excel') }}" class="btn btn-success"><i
                                class="fas fa-file-excel"></i> Export
                            Excel</a>
                    </div>
                </x-slot>
                {{--
                <div class="d-flex justify-content-between">
                    <div class="form-group">
                        <label for="category1">Filter Kategori</label>
                        <select name="category1" id="category1" class="custom-select">
                            <option value="" selected>Semua</option>
                            @foreach ($categories as $key => $item)
                                <option value="{{ $key }}">{{ $item }}</option>
                            @endforeach
                            </option>
                        </select>
                    </div>

                    <div class="d-flex ">
                        <div class="form-group">
                            <label for="price_from">Harga Dari:</label>
                            <input onkeyup="format_uang(this)" type="number" id="price_from" name="price_from"
                                class="form-control" value="{{ request('price_from') }}">
                        </div>
                        <div class="form-group mx-1">
                            <label for="price_to">Harga Sampai:</label>
                            <input onkeyup="format_uang(this)" type="number" id="price_to" name="price_to"
                                class="form-control" value="{{ request('price_to') }}">
                        </div>
                        <div class="form-group">
                            <label for="stock_from">Stok Dari:</label>
                            <input type="number" id="stock_from" name="stock_from" class="form-control"
                                value="{{ request('stock_from') }}">
                        </div>
                        <div class="form-group mx-1">
                            <label for="stock_to">Stok Sampai:</label>
                            <input type="number" id="stock_to" name="stock_to" class="form-control"
                                value="{{ request('stock_to') }}">
                        </div>
                    </div>
                </div> --}}

                <x-table>
                    <x-slot name="thead">
                        <th>No</th>
                        <th>Invoice Number</th>
                        <th>Nama</th>
                        <th>Status</th>
                        <th>Aksi</th>
                    </x-slot>
                </x-table>

            </x-card>
        </div>
    </div>
    {{-- @include('products.products_form') --}}
@endsection
@include('layouts.includes.datatable')
@include('layouts.includes.select2')

@push('scripts')
    <script>
        let modal = '#modal-form';
        let button = '#submitBtn';
        let table;

        $(function() {
            $('#spinner-border').hide();
        });

        table = $('.table').DataTable({
            processing: true,
            autoWidth: false,
            ajax: {
                url: '{{ route('orders.data') }}',
            },
            columns: [{
                    data: 'DT_RowIndex',
                    searchable: false,
                    sortable: false
                },
                {
                    data: 'user'
                },
                {
                    data: 'invoice_number'
                },
                {
                    data: 'status',
                },
                {
                    data: 'aksi',
                    sortable: false,
                    searchable: false
                },
            ]
        });

        $('[name=category1]').on('change', function() {
            table.ajax.reload();
        })
        $('[name=price_from]').on('change', function() {
            table.ajax.reload();
        })
        $('[name=price_to]').on('change', function() {
            table.ajax.reload();
        })
        $('[name=stock_from]').on('change', function() {
            table.ajax.reload();
        })
        $('[name=stock_to]').on('change', function() {
            table.ajax.reload();
        })

        function addForm(url, title = 'Tambah Daftar Produk') {
            $(modal).modal('show');
            $(`${modal} .modal-title`).text(title);
            $(`${modal} form`).attr('action', url);
            $(`${modal} [name=_method]`).val('POST');
            $('#spinner-border').hide();
            $(button).prop('disabled', false);
            resetForm(`${modal} form`);

            $("#categories").val("").trigger("change");

        }

        function editForm(url, title = 'Edit Daftar Kategori') {
            $.get(url)
                .done(response => {
                    $(modal).modal('show');
                    $(`${modal} .modal-title`).text(title);
                    $(`${modal} form`).attr('action', url);
                    $(`${modal} [name=_method]`).val('PUT');
                    resetForm(`${modal} form`);
                    loopForm(response.data);
                    $('#spinner-border').hide();
                    $(button).prop('disabled', false);
                    $('[name=price]').val(format_uang(response.data.price));

                    let selectedCategories = [];
                    response.data.categories.forEach(item => {
                        selectedCategories.push(item.id);
                    });
                    $('#categories')
                        .val(selectedCategories)
                        .trigger('change');
                })
                .fail(errors => {
                    Swall.fire({
                        icon: 'error',
                        title: 'Opps! Gagal',
                        text: errors.responseJSON.message,
                        showConfirmButton: true,
                    });
                    $('#spinner-border').hide();
                    $(button).prop('disabled', false);
                });
        }

        function submitForm(originalForm) {
            $(button).prop('disabled', true);
            $('#spinner-border').show();
            $.post({
                    url: $(originalForm).attr('action'),
                    data: new FormData(originalForm),
                    dataType: 'JSON',
                    contentType: false,
                    cache: false,
                    processData: false
                })
                .done(response => {
                    $(modal).modal('hide');
                    if (response.status = 200) {
                        Swal.fire({
                            icon: 'success',
                            title: 'Berhasil',
                            text: response.message,
                            showConfirmButton: false,
                            timer: 3000
                        })
                    }
                    $(button).prop('disabled', false);
                    $('#spinner-border').hide();
                    table.ajax.reload();
                })
                .fail(errors => {
                    $('#spinner-border').hide();
                    $(button).prop('disabled', false);
                    Swal.fire({
                        icon: 'error',
                        title: 'Opps! Gagal',
                        text: errors.responseJSON.message,
                        showConfirmButton: true,
                    });
                    if (errors.status == 422) {
                        $('#spinner-border').hide()
                        $(button).prop('disabled', false);
                        loopErrors(errors.responseJSON.errors);
                        return;
                    }
                });
        }

        function deleteData(url, name) {
            const swalWithBootstrapButtons = Swal.mixin({
                customClass: {
                    confirmButton: 'btn btn-success',
                    cancelButton: 'btn btn-danger'
                },
                buttonsStyling: true,
            })
            swalWithBootstrapButtons.fire({
                title: 'Perhatian',
                text: 'Apakah anda yakin ingin menghapus data ' + name +
                    ' ?',
                icon: 'warning',
                showCancelButton: true,
                confirmButtonColor: 'rgb(48, 133, 214)',
                cancelButtonColor: '#aaa',
                confirmButtonText: 'Ya, Hapus!',
                cancelButtonText: 'Cancel',
                reverseButtons: true
            }).then((result) => {
                if (result.isConfirmed) {
                    $.post(url, {
                            '_method': 'delete'
                        })
                        .done(response => {
                            if (response.status = 200) {
                                Swal.fire({
                                    icon: 'success',
                                    title: 'Berhasil',
                                    text: response.message,
                                    showConfirmButton: false,
                                    timer: 2000
                                })
                                table.ajax.reload();
                            }
                        })
                        .fail(errors => {
                            Swal.fire({
                                icon: 'error',
                                title: 'Opps! Gagal!',
                                text: errors.responseJSON.message,
                                showConfirmButton: false,
                                timer: 2000
                            })
                            table.ajax.reload();
                        });
                }
            })
        }

        function updateStatus(url, name) {
            const swalWithBootstrapButtons = Swal.mixin({
                customClass: {
                    confirmButton: 'btn btn-success',
                    cancelButton: 'btn btn-danger'
                },
                buttonsStyling: true,
            })
            swalWithBootstrapButtons.fire({
                title: 'Perhatian',
                text: 'Apakah anda yakin ingin mengubah status data ' + name +
                    ' ?',
                icon: 'warning',
                showCancelButton: true,
                confirmButtonColor: 'rgb(48, 133, 214)',
                cancelButtonColor: '#aaa',
                confirmButtonText: 'Ya, Aktifkan!',
                cancelButtonText: 'Cancel',
                reverseButtons: true
            }).then((result) => {
                if (result.isConfirmed) {
                    $.post(url, {
                            '_method': 'put'
                        })
                        .done(response => {
                            if (response.status = 200) {
                                Swal.fire({
                                    icon: 'success',
                                    title: 'Berhasil',
                                    text: response.message,
                                    showConfirmButton: false,
                                    timer: 2000
                                })
                                table.ajax.reload();
                            }
                        })
                        .fail(errors => {
                            Swal.fire({
                                icon: 'error',
                                title: 'Opps! Gagal!',
                                text: errors.responseJSON.message,
                                showConfirmButton: false,
                                timer: 2000
                            })
                            table.ajax.reload();
                        });
                }
            })
        }
    </script>
@endpush
