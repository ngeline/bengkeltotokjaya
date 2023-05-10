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
                        <li class="breadcrumb-item"><a href="index.html" class="link"><i
                                    class="mdi mdi-home-outline fs-4"></i></a></li>
                        <li class="breadcrumb-item active" aria-current="page">Dashboard</li>
                    </ol>
                </nav>
                <h1 class="mb-0 fw-bold">Dashboard</h1>
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
        <!-- ============================================================== -->
        <!-- Sales chart -->
        <!-- ============================================================== -->
        <div class="row">
            <div class="col-xl-3 col-md-6 mb-4">
                <div class="card border-left-info shadow h-100 py-2">
                    <div class="card-body">
                        <div class="row no-gutters align-items-center">
                            <div class="col mr-2">
                                <div class="text-xs font-weight-bold text-info text-uppercase mb-1">User
                                </div>
                                <div class="row no-gutters align-items-center">
                                    <div class="col-auto">
                                        <div class="h5 mb-0 mr-3 font-weight-bold text-gray-800">{{$user}}</div>
                                    </div>
                                    <!-- <div class="col">
                                    <div class="progress progress-sm mr-2">
                                        <div class="progress-bar bg-info" role="progressbar" style="width: 50%" aria-valuenow="50" aria-valuemin="0" aria-valuemax="100"></div>
                                    </div>
                                </div> -->
                                </div>
                            </div>
                            <div class="col-auto">
                                <i class="fas fa-users fa-2x text-gray-300"></i>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-xl-3 col-md-6 mb-4">
                <div class="card border-left-primary shadow h-100 py-2">
                    <div class="card-body">
                        <div class="row no-gutters align-items-center">
                            <div class="col mr-2">
                                <div class="text-xs font-weight-bold text-primary text-uppercase mb-1">
                                    Tipe Servis </div>
                                <div class="h5 mb-0 font-weight-bold text-gray-800">{{ $jenisService}}</div>
                            </div>
                            <div class="col-auto">
                                <i class="fas fa-quote-right fa-2x text-gray-300"></i>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-xl-3 col-md-6 mb-4">
                <div class="card border-left-success shadow h-100 py-2">
                    <div class="card-body">
                        <div class="row no-gutters align-items-center">
                            <div class="col mr-2">
                                <div class="text-xs font-weight-bold text-success text-uppercase mb-1">
                                    Merek Mobil</div>
                                <div class="h5 mb-0 font-weight-bold text-gray-800">{{$category}}</div>
                            </div>
                            <div class="col-auto">
                                <i class="fas fa-atom fa-2x text-gray-300"></i>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-xl-3 col-md-6 mb-4">
                <div class="card border-left-primary shadow h-100 py-2">
                    <div class="card-body">
                        <div class="row no-gutters align-items-center">
                            <div class="col mr-2">
                                <div class="text-xs font-weight-bold text-primary text-uppercase mb-1">
                                    Suku Cadang </div>
                                <div class="h5 mb-0 font-weight-bold text-gray-800">{{ $sparepart}}</div>
                            </div>
                            <div class="col-auto">
                                <i class="fas fa-archway fa-2x text-gray-300"></i>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-xl-3 col-md-6 mb-4">
                <div class="card border-left-success shadow h-100 py-2">
                    <div class="card-body">
                        <div class="row no-gutters align-items-center">
                            <div class="col mr-2">
                                <div class="text-xs font-weight-bold text-success text-uppercase mb-1">
                                    Pemesanan Servis</div>
                                <div class="h5 mb-0 font-weight-bold text-gray-800">{{$booking}}</div>
                            </div>
                            <div class="col-auto">
                                <i class="far fa-clipboard fa-2x text-gray-300"></i>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <!-- <div class="col-xl-3 col-md-6 mb-4">
            <div class="card border-left-info shadow h-100 py-2">
                <div class="card-body">
                    <div class="row no-gutters align-items-center">
                        <div class="col mr-2">
                            <div class="text-xs font-weight-bold text-info text-uppercase mb-1">
                                Pesan Chat
                            </div>
                            <div class="row no-gutters align-items-center">
                                <div class="col-auto">
                                    <div class="h5 mb-0 mr-3 font-weight-bold text-gray-800">{{$contact}}</div>
                                </div>
                                <div class="col">
                                    <div class="progress progress-sm mr-2">
                                        <div class="progress-bar bg-info" role="progressbar" style="width: 50%" aria-valuenow="50" aria-valuemin="0" aria-valuemax="100"></div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-auto">
                            <i class="far fa-address-book fa-2x text-gray-300"></i>
                        </div>
                    </div>
                </div>
            </div>
        </div> -->
            <div class="col-xl-3 col-md-6 mb-4">
                <div class="card border-left-primary shadow h-100 py-2">
                    <div class="card-body">
                        <div class="row no-gutters align-items-center">
                            <div class="col mr-2">
                                <div class="text-xs font-weight-bold text-info text-uppercase mb-1">
                                    Total Pendapatan
                                </div>
                                <div class="row no-gutters align-items-center">
                                    <div class="col-auto">
                                        <div class="h5 mb-0 mr-3 font-weight-bold text-gray-800">Rp {{$payment}}</div>
                                    </div>
                                    <!-- <div class="col">
                                    <div class="progress progress-sm mr-2">
                                        <div class="progress-bar bg-info" role="progressbar" style="width: 50%" aria-valuenow="50" aria-valuemin="0" aria-valuemax="100"></div>
                                    </div>
                                </div> -->
                                </div>
                            </div>
                            <div class="col-auto">
                                <i class="far fa fa-dollar fa-2x text-gray-300"></i>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="row quick-action-toolbar">
              <div class="col-md-12 grid-margin">
                <div class="card">
                  <div class="card-header d-block d-md-flex">
                    <h5 class="mb-0">Lihat Perkembangan</h5>
                    <p class="ml-auto mb-0">Apa saja yang berkembang?<i class="icon-bulb"></i></p>
                  </div>
                  <div class="d-md-flex row m-0 quick-action-btns" role="group" aria-label="Quick action buttons">
                    <div class="col-sm-6 col-md-4 p-3 text-center btn-wrapper">
                      <a href="#pekok2">
                        <button type="button" class="btn px-0"> <i class="icon-user mr-2"></i>Stok Terlaris</button>
                      </a>
                    </div>
                    <div class="col-sm-6 col-md-4 p-3 text-center btn-wrapper">
                      <a href="#containerss">
                        <button type="button" class="btn px-0"><i class="icon-docs mr-2"></i>Stok Terbanyak dan Sedikit</button>
                      </a>
                    </div>
                    <div class="col-sm-6 col-md-4 p-3 text-center btn-wrapper">
                      <a href="#container">
                        <button type="button" class="btn px-0"><i class="icon-docs mr-2"></i>Pengguna</button>
                      </a>
                    </div>
                  </div>
                </div>
              </div>
            </div>
        <br><br>

        <div class="row">
            <div class="col-lg-12">
                <div class="card">
                    <div class="card-body">
                    <div class="d-md-flex align-items-center">
                                    <div>
                                        <h4 class="card-title">Trend Stock Terlaris</h4>
                                    </div>
                                    <div class="ms-auto d-flex no-block align-items-center">
                                        <ul class="list-inline dl d-flex align-items-center m-r-15 m-b-0">
                                            <li class="list-inline-item d-flex align-items-center text-info"><i class="fa fa-circle font-10 me-1"></i> Ample
                                            </li>
                                            <li class="list-inline-item d-flex align-items-center text-primary"><i class="fa fa-circle font-10 me-1"></i> Pixel
                                            </li>
                                        </ul>
                                    </div>
                                </div>
                        <div class="chartist-tooltip3" id="pekok2"></div>
                        <script src="https://cdnjs.cloudflare.com/ajax/libs/chartist/0.11.4/chartist.min.js"></script>
                        <script>
                            var ss = <?php echo json_encode($sparepartsedikit) ?>;
                            var nss = <?php echo json_encode($namasparepartsedikit) ?>;
                            $(function() {
                                "use strict";
                                var chart2 = new Chartist.Bar(
                                    ".chartist-tooltip3",
                                    {
                                        series: [{
                                        name: 'Stok',
                                        data: ss
                                        }],

                                        labels: nss,
                                    },
                                    {
                                        yAxis: {
            
        },
                                        axisX: {
                                            position: "end",
                                            showGrid: false,
                                        },
                                        axisY: {
                                            position: "start",
                                        },
                                        responsive: {
                                            rules: [{
                                                condition: {
                                                    maxWidth: 500
                                                },
                                                chartOptions: {
                                                    legend: {
                                                        layout: 'horizontal',
                                                        align: 'center',
                                                        verticalAlign: 'bottom'
                                                    }
                                                }
                                            }]
                                        }

                                    },
                                );

                                var chart = [chart2];
                            });
                        </script>
                    </div>
                </div>
            </div>
        </div>
        
<!-- CHART STOCK TERLARIS -->
<h1 style="font-size: 25px; color: #1E1E2D; font-weight: bold;">Trend Stok Terlaris</h1>
<div id="containerst"></div>
<script src="https://code.highcharts.com/highcharts.js"></script>
<script type="text/javascript">
    var ts = <?php echo json_encode($totalsparepart) ?>;
    var ns = <?php echo json_encode($namasparepart) ?>;

    Highcharts.chart('containerst', {
        title: {
            text: 'Perkembangan Trend Stok Terlaris'
        },
        subtitle: {
            text: 'Source: Bengkel Mobil Totok Jaya'
        },
        xAxis: {
            categories: ns
        },
        yAxis: {
            title: {
                text: 'Jumlah Stok'
            }
        },
        legend: {
            layout: 'vertical',
            align: 'right',
            verticalAlign: 'middle'
        },
        plotOptions: {
            series: {
                allowPointSelect: true
            }
        },
        series: [{
            name: 'Stok',
            data: ts
        }],
        responsive: {
            rules: [{
                condition: {
                    maxWidth: 500
                },
                chartOptions: {
                    legend: {
                        layout: 'horizontal',
                        align: 'center',
                        verticalAlign: 'bottom'
                    }
                }
            }]
        }
    });
    
</script>

<br>


<!-- CHART STOCK Sedikit -->
<h1 style="font-size: 25px; color: #1E1E2D; font-weight: bold;">Stok Terbanyak & Sedikit</h1>
<div id="containerss"></div>
<script src="https://code.highcharts.com/highcharts.js"></script>
<script type="text/javascript">
    var ss = <?php echo json_encode($sparepartsedikit) ?>;
    var nss = <?php echo json_encode($namasparepartsedikit) ?>;

    Highcharts.chart('containerss', {
        title: {
            text: 'Stok Terbanyak & Sedikit'
        },
        subtitle: {
            text: 'Source: Bengkel Mobil Totok Jaya'
        },
        xAxis: {
            categories: nss
        },
        yAxis: {
            title: {
                text: 'Jumlah Stok'
            }
        },
        legend: {
            layout: 'vertical',
            align: 'right',
            verticalAlign: 'middle'
        },
        plotOptions: {
            series: {
                allowPointSelect: true
            }
        },
        series: [{
            name: 'Stok',
            data: ss
        }],
        responsive: {
            rules: [{
                condition: {
                    maxWidth: 500
                },
                chartOptions: {
                    legend: {
                        layout: 'horizontal',
                        align: 'center',
                        verticalAlign: 'bottom'
                    }
                }
            }]
        }
    });
    
</script>

<br>
            


<br>
<h1 style="font-size: 25px; color: #1E1E2D; font-weight: bold;">Grafik Pengguna</h1>
<div id="container"></div>
<script src="https://code.highcharts.com/highcharts.js"></script>
<script type="text/javascript">
    var users = <?php echo json_encode($users) ?>;

    Highcharts.chart('container', {
        title: {
            text: 'Pertumbuhan Pengguna Baru'
        },
        subtitle: {
            text: 'Source: Bengkel Mobil Totok Jaya'
        },
        xAxis: {
            categories: [ 'Apr','May', 'Jun', 'Jul', 'Aug', 'Sep', 'Oct', 'Nov', 'Dec', 'Jan', 'Feb', 'Mar', ]
        },
        yAxis: {
            title: {
                text: 'Jumlah Pengguna'
            }
        },
        legend: {
            layout: 'vertical',
            align: 'right',
            verticalAlign: 'middle'
        },
        plotOptions: {
            series: {
                allowPointSelect: true
            }
        },
        series: [{
            name: 'User Baru',
            data: users
        }],
        responsive: {
            rules: [{
                condition: {
                    maxWidth: 500
                },
                chartOptions: {
                    legend: {
                        layout: 'horizontal',
                        align: 'center',
                        verticalAlign: 'bottom'
                    }
                }
            }]
        }
    });
</script>

        </div>
    </div>
    <br>
</div>


<br>



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
                              <li class="breadcrumb-item active" aria-current="page">Dashboard</li>
                            </ol>
                          </nav>
                        <h1 class="mb-0 fw-bold">Dashboard</h1> 
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
                <!-- ============================================================== -->
                <!-- Sales chart -->
                <!-- ============================================================== -->
                <div class="row">
                    <div class="col-lg-12">
                        <div class="card">
                            <div class="card-body">
                                <div class="d-md-flex align-items-center">
                                    <div>
                                        <h4 class="card-title">Trend Stock Terlaris</h4>
                                    </div>
                                    <div class="ms-auto d-flex no-block align-items-center">
                                        <ul class="list-inline dl d-flex align-items-center m-r-15 m-b-0">
                                            <li class="list-inline-item d-flex align-items-center text-info"><i class="fa fa-circle font-10 me-1"></i> Ample
                                            </li>
                                            <li class="list-inline-item d-flex align-items-center text-primary"><i class="fa fa-circle font-10 me-1"></i> Pixel
                                            </li>
                                        </ul>
                                    </div>
                                </div>
                                <div class="amp-pxl mt-4" style="height: 350px;">
                                    <div class="chartist-tooltip"></div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- ============================================================== -->
                <!-- Sales chart -->
                <!-- ============================================================== -->
                <!-- ============================================================== -->
                <!-- Table -->
                <!-- ============================================================== -->
                
                <!-- ============================================================== -->
                <!-- Table -->
                <!-- ============================================================== -->
                <!-- ============================================================== -->
                <!-- Recent comment and chats -->
                <!-- ============================================================== -->
                
                <!-- ============================================================== -->
                <!-- Recent comment and chats -->
                <!-- ============================================================== -->
            </div>
            <!-- ============================================================== -->
            <!-- End Container fluid  -->
            <!-- ============================================================== -->
            <!-- ============================================================== -->
            <!-- footer -->
            <!-- ============================================================== -->
            <footer class="footer text-center">
                All Rights Reserved by Flexy Admin. Designed and Developed by <a
                    href="https://www.wrappixel.com">WrapPixel</a>.
            </footer>
            <!-- ============================================================== -->
            <!-- End footer -->
            <!-- ============================================================== -->
        </div>

@endsection



