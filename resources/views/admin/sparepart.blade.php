@extends('layouts.admin')

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
                      <li class="breadcrumb-item"><a href="index.html" class="link"><i class="mdi mdi-home-outline fs-4"></i></a></li>
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
            <div class="col-12">
                <div class="card">
                    <div class="card-body">
                        <div class="example">
                            <div class="tab-content rounded-bottom">
                                <div class="tab-pane p-3 active preview" role="tabpanel" id="preview-416">
                                    <button class="btn btn-primary btn-l mb-4" type="button" data-toggle="modal" data-target="#CreateArticleModal">
                                        Tambah Pengguna
                                    </button>
                                    <table id="tabel-data" class="table table-striped table-hover yajra-datatable">
                                        <thead>
                                            <tr class="text-center">
                                                <th>No</th>
                                                <th>Merek Mobil</th>
                                                <th>Nama</th>
                                                <th>Harga</th>
                                                <th>Biaya Pemasangan</th>
                                                <th>Stok</th>
                                                <th>Aksi</th>
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
    </div>
</div>
<!-- Create Article Modal -->
<div class="modal" id="CreateArticleModal">
    <div class="modal-dialog">
        <div class="modal-content">
            <!-- Modal Header -->
            <div class="modal-header">
                <h4 class="modal-title">Tambah Suku Cadang</h4>
                <button type="button" class="close" data-dismiss="modal">&times;</button>
            </div>
            <!-- Modal body -->
            <div class="modal-body">
                <div class="alert alert-danger alert-dismissible fade show" role="alert" style="display: none;">
                    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="alert alert-success alert-dismissible fade show" role="alert" style="display: none;">
                    <strong>Success!</strong>Suku Cadang baru berhasil ditambahkan.
                    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <!-- <div class="form-group">
                    <label for="catgeory_id">Merek Mobil:</label>
                    <select class="custom-select" name="category_id" id="category_id">
                        <option selected>Pilih Merek Mobil</option>
                        @foreach($categories as $category)
                        <option  value="{{ $category->id }}">{{ $category->id }} - {{ $category->name }}</option>
                        @endforeach
                    </select>
                </div> -->
                <div class="form-group">
                    <label for="catgeory_id">Merek Mobil:</label>
                    <select type="text" class="form-control" name="category_id" id="category_id" >
                        <option>Pilih Merek Mobil</option>
                        @foreach($categories as $category)
                        <option  value="{{ $category->id }}">{{ $category->name }}</option>
                        @endforeach
                    </select>
                </div>
                <div class="form-group">
                    <label for="nameS">Nama:</label>
                    <input type="text" class="form-control" name="nameS" id="nameS">
                </div>
                <div class="form-group">
                    <label for="price">Harga:</label>
                    <input type="text" class="form-control" name="price" id="price">
                </div>
                <div class="form-group">
                    <label for="biayaPemasangan">Biaya Pemasangan:</label>
                    <input type="text" class="form-control" name="biayaPemasangan" id="biayaPemasangan">
                </div>
                <div class="form-group">
                    <label for="stock">Stok:</label>
                    <input type="text" class="form-control" name="stock" id="stock">
                </div>
            </div>
            <!-- Modal footer -->
            <div class="modal-footer">
                <button type="button" class="btn btn-success" id="SubmitCreateArticleForm">Tambah</button>
                <button type="button" class="btn btn-danger" data-dismiss="modal">Batal</button>
            </div>
        </div>
    </div>
</div>

<!-- Edit Article Modal -->
<div class="modal" id="EditArticleModal">
    <div class="modal-dialog">
        <div class="modal-content">
            <!-- Modal Header -->
            <div class="modal-header">
                <h4 class="modal-title">Ubah Suku Cadang</h4>
                <button type="button" class="close modelClose" data-dismiss="modal">&times;</button>
            </div>
            <!-- Modal body -->
            <div class="modal-body">
                <div class="alert alert-danger alert-dismissible fade show" role="alert" style="display: none;">
                    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="alert alert-success alert-dismissible fade show" role="alert" style="display: none;">
                    <strong>Berhasil!</strong>Suku Cadang berhasil ditambahkan.
                    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div id="EditArticleModalBody">

                </div>
            </div>
            <!-- Modal footer -->
            <div class="modal-footer">
                <button type="button" class="btn btn-success" id="SubmitEditArticleForm">Ubah</button>
                <button type="button" class="btn btn-danger modelClose" data-dismiss="modal">Batal</button>
            </div>
        </div>
    </div>
</div>


<div class="modal" id="DeleteArticleModal">
    <div class="modal-dialog">
        <div class="modal-content">
            <!-- Modal Header -->
            <div class="modal-header">
                <h4 class="modal-title">Hapus Suku Cadang</h4>
                <button type="button" class="close" data-dismiss="modal">&times;</button>
            </div>
            <!-- Modal body -->
            <div class="modal-body">
                <h4>Apakah Anda yakin ingin menghapus Suku Cadang?</h4>
            </div>
            <!-- Modal footer -->
            <div class="modal-footer">
                <button type="button" class="btn btn-danger" id="SubmitDeleteArticleForm">Yes</button>
                <button type="button" class="btn btn-default" data-dismiss="modal">No</button>
            </div>
        </div>
    </div>
</div>

<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.3/jquery.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-validate/1.19.0/jquery.validate.js"></script>
<script src="https://cdn.datatables.net/1.10.21/js/jquery.dataTables.min.js"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/js/bootstrap.min.js"></script>
<script src="https://cdn.datatables.net/1.10.21/js/dataTables.bootstrap4.min.js"></script>

<script src="https://cdn.datatables.net/v/bs5/dt-1.13.2/datatables.min.js"></script>


<script type="text/javascript">
    $(function() {

        var table = $('.yajra-datatable').DataTable({
            responsive: true,
            processing: true,
            serverSide: true,
            autoWidth: false,
            pageLength: 5,
            ajax: "{{ route('spareparts.index') }}",
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
                {
                    data: 'action',
                    name: 'action',
                    orderable: true,
                    searchable: true,
                    sClass: 'text-center'
                },
            ]
        });
        // Create article Ajax request.
        $('#SubmitCreateArticleForm').click(function(e) {
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
                success: function(result) {
                    if (result.errors) {
                        $('.alert-danger').html('');
                        $.each(result.errors, function(key, value) {
                            $('.alert-danger').show();
                            $('.alert-danger').append('<strong><li>' + value + '</li></strong>');
                        });
                    } else {
                        $('.alert-danger').hide();
                        $('.alert-success').show();
                        $('.yajra-datatable').DataTable().ajax.reload();
                        setInterval(function() {
                            $('.alert-success').hide();
                            $('#CreateArticleModal').modal('hide');
                        }, 100);

                        $('#CreateArticleModal').modal().hide(); // modal togel diganti iki
                        $("body").removeClass("modal-open"); //ditambah
                        $(".modal-backdrop").remove(); // ditambah
                        $('#nameS').val('')
                        $('#price').val('')
                        $('#biayaPemasangan').val('')
                        $('#stock').val('')
                    }
                }
            });
        });

        // Get single article in EditModel
        $('.modelClose').on('click', function() {
            $('#EditArticleModal').hide();
        });
        var id;
        $('body').on('click', '#getEditArticleData', function(e) {
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
                success: function(result) {
                    console.log(result);
                    $('#EditArticleModalBody').html(result.html);
                    $('#EditArticleModal').show();
                }
            });
        });

        // Update article Ajax request.
        $('#SubmitEditArticleForm').click(function(e) {
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
                success: function(result) {
                    if (result.errors) {
                        $('.alert-danger').html('');
                        $.each(result.errors, function(key, value) {
                            $('.alert-danger').show();
                            $('.alert-danger').append('<strong><li>' + value + '</li></strong>');
                        });
                    } else {
                        $('.alert-danger').hide();
                        $('.alert-success').show();
                        $('.yajra-datatable').DataTable().ajax.reload();
                        $('.alert-success').hide();
                        $('#EditArticleModal').hide();
                        setInterval(function() {
                        }, 100);
                    }
                }
            });
        });

        // Delete article Ajax request.
        var deleteID;
        $('body').on('click', '#getDeleteId', function() {
            deleteID = $(this).data('id');
        })
        $('#SubmitDeleteArticleForm').click(function(e) {
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
                success: function(result) {
                        $('.yajra-datatable').DataTable().ajax.reload();
                        $('#DeleteArticleModal').modal().hide(); // modal togel diganti iki
                        $("body").removeClass("modal-open"); //ditambah
                        $(".modal-backdrop").remove(); // ditambah
                }
            });
        });

    });
</script>
@endsection