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
                      <li class="breadcrumb-item active" aria-current="page">Basic Table</li>
                    </ol>
                  </nav>
                <h1 class="mb-0 fw-bold">Basic Table</h1> 
            </div>
            <div class="col-6">
                <div class="text-end upgrade-btn">
                    <a href="https://www.wrappixel.com/templates/flexy-bootstrap-admin-template/" class="btn btn-primary text-white"
                        target="_blank">Upgrade to Pro</a>
                </div>
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
                                        Tambah Tipe Service
                                    </button>
                                    <table id="tabel-data" class="table table-striped table-hover yajra-datatable">
                                        <thead>
                                            <tr class="text-center">
                                                <th scope="col">No</th>
                                                <th scope="col">Nama</th>
                                                <th scope="col">Harga</th>
                                                <th scope="col">Aksi</th>
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
                <h4 class="modal-title">Tambah Jenis Tipe Servis</h4>
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
                    <strong>Success!</strong>Tipe Servis berhasil ditambahkan.
                    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="form-group">
                    <label for="title">Nama:</label>
                    <input type="text" class="form-control" name="name" id="name">
                </div>
                <div class="form-group">
                    <label for="price">Harga:</label>
                    <input class="form-control" name="price" id="price">
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
                <h4 class="modal-title">Ubah Tipe Servis</h4>
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
                    <strong>Success!</strong>Berhasil Mengubah Tipe Servis.
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
                <button type="button" class="btn btn-danger modelClose" data-dismiss="modal">Kembali</button>
            </div>
        </div>
    </div>
</div>


<div class="modal" id="DeleteArticleModal">
    <div class="modal-dialog">
        <div class="modal-content">
            <!-- Modal Header -->
            <div class="modal-header">
                <h4 class="modal-title">Hapus Tipe Servis</h4>
                <button type="button" class="close" data-dismiss="modal">&times;</button>
            </div>
            <!-- Modal body -->
            <div class="modal-body">
                <h4>Apakah Anda yakin ingin menghapus tipe servis ini?</h4>
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
            ajax: "{{ route('index_get_typeService.index') }}",
            columns: [{
                    data: 'DT_RowIndex',
                    name: 'DT_RowIndex',
                    sClass:'text-center'
                },
                {
                    data: 'name',
                    name: 'name',
                    sClass:'text-center'
                },
                {
                    data: 'price',
                    name: 'price',
                    sClass:'text-center'
                },
                {
                    data: 'action',
                    name: 'action',
                    orderable: true,
                    searchable: true,
                    sClass:'text-center'
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
                url: "{{ route('index_get_typeService.store') }}",
                method: 'POST',
                data: {
                    name: $('#name').val(),
                    price: $('#price').val(),
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
                        $('#name').val('')
                        $('#status').val('')
                    }
                }
            });
        });

        // Get single article in EditModel
        $('.modelClose').on('click', function(){
            $('#EditArticleModal').hide();
        });
        var id;
        $('body').on('click', '#getEditArticleData', function(e) {
            // e.preventDefault();
            $('.alert-danger').html('');
            $('.alert-danger').hide();
            id = $(this).data('id');
            $.ajax({
                url: "index_get_typeService/"+id+"/edit",
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
                url: "index_get_typeService/"+id,
                method: 'PUT',
                data: {
                    name: $('#editTitle').val(),
                    price: $('#editDescription').val(),
                },
                success: function(result) {
                    if(result.errors) {
                        $('.alert-danger').html('');
                        $.each(result.errors, function(key, value) {
                            $('.alert-danger').show();
                            $('.alert-danger').append('<strong><li>'+value+'</li></strong>');
                        });
                    } else {
                        $('.alert-danger').hide();
                        $('.alert-success').show();
                        $('.yajra-datatable').DataTable().ajax.reload();
                        $('.alert-success').hide();
                        $('#EditArticleModal').hide();
                        setInterval(function(){ 
                        }, 100);
                    }
                }
            });
        });

      // Delete article Ajax request.
      var deleteID;
        $('body').on('click', '#getDeleteId', function(){
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
                url: "index_get_typeService/"+id,
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