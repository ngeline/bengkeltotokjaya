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
                        <li class="breadcrumb-item active" aria-current="page">Grafik Perkembangan</li>
                    </ol>
                </nav>
                <h1 class="mb-0 fw-bold">Grafik Perkembangan</h1>
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
            <div class="row quick-action-toolbar">
              <div class="col-md-12 grid-margin">
                <div class="card">
                  <div class="card-header d-block d-md-flex">
                    <h5 class="mb-1">Lihat Perkembangan</h5>
                    <!-- <p class="ml-auto mb-2">Apa saja yang berkembang?<i class="icon-bulb"></i></p> -->
                  </div>
                  <div class="d-md-flex row m-0 quick-action-btns" role="group" aria-label="Quick action buttons">
                    <div class="col-sm-6 col-md-4 p-3 text-center btn-wrapper">
                      <a href="#containerst">
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
            text: 'Source: Bengkel Mobil Delta'
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
            text: 'Source: Bengkel Mobil Delta'
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
            text: 'Source: Bengkel Mobil Delta'
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

@endsection
