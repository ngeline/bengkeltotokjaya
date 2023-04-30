@extends('layouts.pemilik')

@section('content')

<div class="page-wrapper">
    <!-- ============================================================== -->
    <!-- Bread crumb and right sidebar toggle -->
    <!-- ============================================================== -->
    <div class="page-breadcrumb">
        <div class="row align-items-center">
            <div class="col-6">
                <nav aria-label="breadcrumb">
                    <ol class="breadcrumb mb-0 d-flex align-items-center">
                        <li class="breadcrumb-item"><a href="index.html" class="link"><i
                                    class="mdi mdi-home-outline fs-4"></i></a></li>
                        <li class="breadcrumb-item active" aria-current="page">Spareparts</li>
                    </ol>
                </nav>
                <h1 class="mb-0 fw-bold">Spareparts</h1>
            </div>

        </div>
    </div>
    <!-- ============================================================== -->
    <!-- End Bread crumb and right sidebar toggle -->
    <!-- ============================================================== -->
    <!-- ============================================================== -->
    <!-- Container fluid  -->
    <!-- ============================================================== -->


    <div class="container-fluid">
        <div class="row">
            <div class="content">
                <div class="card shadow mb-4">
                    <div class="card-header py-3">
                        <div class="col-md-12">
                            <h6 class="m-0 font-weight-bold" style="color: 	#1E1E2D;">Laporan Data Suku Cadang
                            </h6>
                        </div>
                    </div>
                    <div class="card-body">
                        <div class="table-responsive">
                            <table style="color: #708090;" class="table table-bordered table-striped yajra-datatable"
                                id="data_users_side" width="100%" cellspacing="0">
                                <thead>
                                    <tr class="text-center">
                                        <th>No</th>
                                        <th>Merek Mobil</th>
                                        <th>Nama</th>
                                        <th>Harga</th>
                                        <th>Biaya Pemasangan</th>
                                        <th>Stok</th>
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


<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.9.1/jquery.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-validate/1.19.0/jquery.validate.js"></script>
<script src="https://cdn.datatables.net/1.10.21/js/jquery.dataTables.min.js"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/js/bootstrap.min.js"></script>
<script src="https://cdn.datatables.net/1.10.21/js/dataTables.bootstrap4.min.js"></script>

<script type="text/javascript">
    $(function () {

        var table = $('.yajra-datatable').DataTable({
            processing: true,
            serverSide: true,
            autoWidth: false,
            pageLength: 5,
            ajax: "{{ route('laporansparepart.index') }}",
            columns: [{
                    data: 'DT_RowIndex',
                    name: 'DT_RowIndex',
                    sClass: 'text-center'
                },
                {
                    data: 'category.name',
                    name: 'category.name',
                    sClass: 'text-center'
                },
                {
                    data: 'nameS',
                    name: 'nameS',
                    sClass: 'text-center'
                },
                {
                    data: 'price',
                    name: 'price',
                    sClass: 'text-center'
                },
                {
                    data: 'biayaPemasangan',
                    name: 'biayaPemasangan',
                    sClass: 'text-center'
                },
                {
                    data: 'stock',
                    name: 'stock',
                    sClass: 'text-center'
                },
            ]
        });
        // Create article Ajax request.
        $('#SubmitCreateArticleForm').click(function (e) {
            e.preventDefault();
            $.ajaxSetup({
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                }
            });
            $.ajax({
                url: "{{ route('spareparts.store') }}",
                method: 'POST',
                data: {
                    category_id: $('#category_id').val(),
                    nameS: $('#nameS').val(),
                    price: $('#price').val(),
                    biayaPemasangan: $('#biayaPemasangan').val(),
                    stock: $('#stock').val(),
                },
                success: function (result) {
                    if (result.errors) {
                        $('.alert-danger').html('');
                        $.each(result.errors, function (key, value) {
                            $('.alert-danger').show();
                            $('.alert-danger').append('<strong><li>' +
                                value + '</li></strong>');
                        });
                    } else {
                        $('.alert-danger').hide();
                        $('.alert-success').show();
                        $('.yajra-datatable').DataTable().ajax.reload();
                        setInterval(function () {
                            $('.alert-success').hide();
                            $('#CreateArticleModal').modal('hide');
                            location.reload();
                        }, 2000);
                    }
                }
            });
        });

        // Get single article in EditModel
        $('.modelClose').on('click', function () {
            $('#EditArticleModal').hide();
        });
        var id;
        $('body').on('click', '#getEditArticleData', function (e) {
            // e.preventDefault();
            $('.alert-danger').html('');
            $('.alert-danger').hide();
            id = $(this).data('id');
            $.ajax({
                url: "spareparts/" + id + "/edit",
                method: 'GET',
                // data: {
                //     id: id,
                // },
                success: function (result) {
                    console.log(result);
                    $('#EditArticleModalBody').html(result.html);
                    $('#EditArticleModal').show();
                }
            });
        });

        // Update article Ajax request.
        $('#SubmitEditArticleForm').click(function (e) {
            e.preventDefault();
            $.ajaxSetup({
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                }
            });
            $.ajax({
                url: "spareparts/" + id,
                method: 'PUT',
                data: {
                    nameS: $('#editTitle').val(),
                    price: $('#editPrice').val(),
                    biayaPemasangan: $('#editPemasangan').val(),
                    stock: $('#editStock').val(),
                },
                success: function (result) {
                    if (result.errors) {
                        $('.alert-danger').html('');
                        $.each(result.errors, function (key, value) {
                            $('.alert-danger').show();
                            $('.alert-danger').append('<strong><li>' +
                                value + '</li></strong>');
                        });
                    } else {
                        $('.alert-danger').hide();
                        $('.alert-success').show();
                        $('.yajra-datatable').DataTable().ajax.reload();
                        setInterval(function () {
                            $('.alert-success').hide();
                            $('#EditArticleModal').hide();
                        }, 2000);
                    }
                }
            });
        });

        // Delete article Ajax request.
        var deleteID;
        $('body').on('click', '#getDeleteId', function () {
            deleteID = $(this).data('id');
        })
        $('#SubmitDeleteArticleForm').click(function (e) {
            e.preventDefault();
            var id = deleteID;
            $.ajaxSetup({
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                }
            });
            $.ajax({
                url: "spareparts/" + id,
                method: 'DELETE',
                success: function (result) {
                    setInterval(function () {
                        $('.yajra-datatable').DataTable().ajax.reload();
                        $('#DeleteArticleModal').hide();
                    }, 1000);
                }
            });
        });

    });

</script>
@endsection
