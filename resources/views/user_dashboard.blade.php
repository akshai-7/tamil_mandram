@extends('app')
@section('content')
    <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <section class="content-header">
            <div class="container-fluid">
                <div class="row mb-2">
                    <div class="col-sm-12">
                        <ol class="breadcrumb float-sm-left">
                            <li class="breadcrumb-item "> <a href="{{ route('dashboard') }}" class="hover1"> Dashboard</a></li>
                        </ol>
                    </div><!-- /.col -->
                </div><!-- /.row -->
                <!-- /.row -->
            </div>
            <!-- /.row -->
        </section><!--/. container-fluid -->

        <section class="content">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-12">
                        <div class="card {{ @$search_open ? 'search-card' : 'collapsed-card   search-card' }} ">
                            <div class="card-header">
                                <div class="card-title">
                                    <h4>Search Reports</h4>
                                </div>
                                <div class="card-tools">
                                    <button type="button" class="btn btn-tool btn-primary" data-card-widget="collapse"
                                        title="Collapse">
                                        <i class="fas fa-plus"></i>
                                    </button>
                                </div>
                            </div>
                            <div class="card-body" style='{{ @$search_open ? 'display:block' : 'display:none' }}'>
                                <form action="{{ route('search-dashboard') }}" method="post">
                                    @csrf
                                    <div class="row">
                                        <div class="col-md-3">
                                            <div class="form-group">
                                                <label> From Date</label>
                                                <input type="text" class="form-control datepicker">
                                            </div>
                                        </div>

                                        <div class="col-md-3">
                                            <div class="form-group">
                                                <label> To Date</label>
                                                <input type="text" class="form-control datepicker">
                                            </div>
                                        </div>


                                        <div class="col-md-4">
                                            <div class="form-group mt-4">
                                                <label></label>
                                                <a href="{{ route('dashboard') }}"
                                                    class="btn btn-primary col-md-4"></i>Reset </a>
                                                <button type="submit" class="btn btn-primary"><i class="fa fa-search"></i>
                                                    Search</button>
                                            </div>
                                        </div>
                                    </div>
                                </form>
                            </div>
                        </div>

                        <!-- Info boxes -->
                        <div class="row offset-md-2">

                            <!-- ./col -->

                            <div class="col-lg-3 col-6 ">
                                <!-- small box -->
                                <div class="small-box bg-success">
                                    <div class="inner">
                                        <h3>{{ @$total_event_count }}<sup style="font-size: 20px"></sup></h3>

                                        <p>Total Events </p>
                                    </div>
                                    <div class="icon">
                                        <i class="ion ion-stats-bars"></i>
                                    </div>
                                    <!-- <a href="{{ url('/event') }}" class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a> -->
                                </div>
                            </div>

                            <div class="col-lg-3 col-6">
                                <!-- small box -->
                                <div class="small-box bg-success">
                                    <div class="inner">
                                        <h3>{{ @$total_upcoming_event_count }}<sup style="font-size: 20px"></sup></h3>

                                        <p>Total Upcoming Event </p>
                                    </div>
                                    <div class="icon">
                                        <i class="ion ion-stats-bars"></i>
                                    </div>
                                    <!-- <a href="{{ url('/event') }}" class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a> -->
                                </div>
                            </div>
                            <!-- ./col -->
                            <div class="col-lg-3 col-6">
                                <!-- small box -->
                                <div class="small-box bg-warning">
                                    <div class="inner">
                                        <h3>{{ @$total_past_event_count }}</h3>
                                        <p>Total Past Event </p>
                                    </div>
                                    <div class="icon">
                                        <i class="ion ion-person-add"></i>
                                    </div>
                                    <!-- <a href="{{ url('/event') }}" class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a> -->
                                </div>
                            </div>
                            <!-- ./col -->
                        </div>

                        <div class="row">

                            <div class="col-6">
                                <div class="card">
                                    <div class="card-header" style="    background-color: #fff !important;">
                                        <h3 class="card-title"> Event Percentage</h3>

                                    </div>
                                    <div class="card-body">
                                        <canvas id="pieChart"
                                            style="min-height: 250px; height: 250px; max-height: 250px; max-width: 100%;"></canvas>
                                    </div>
                                    <!-- /.card-body -->
                                </div>
                            </div>
                            <div class="col-6">
                                <div class="card">
                                    <div class="card-header" style="    background-color: #fff !important;">
                                        <h3 class="card-title"> Event Count</h3>
                                    </div>
                                    <div class="card-body">
                                        <canvas id="barChart"
                                            style="min-height: 250px; height: 250px; max-height: 250px; max-width: 100%;"></canvas>
                                    </div>
                                    <!-- /.card-body -->
                                </div>
                            </div>
                        </div>


                    </div>
                </div>
            </div>
        </section>
        <!-- /.content -->
    </div>
    <!-- /.content -->



    <div id="event_percent" data-value={{ json_encode($event_percent) }}></div>
    <div id="event_count" data-value={{ json_encode($event_count) }}></div>

    <!-- /.content -->
@endsection
@push('child-scripts')
    <script>
        //-------------
        //- pie CHART -
        //-------------

        var event_percent = $("#event_percent").data('value');

        var event_count = $("#event_count").data('value');
        console.log(event_percent);

        var donutData = {
            labels: [
                'Past Event',
                'Upcoming Event',
            ],
            datasets: [{
                data: event_percent,
                backgroundColor: ['#ffc107', '#17a2b8'],
            }]
        }

        var pieOptions = {
            events: false,
            animation: {
                duration: 500,
                easing: "easeOutQuart",
                onComplete: function() {
                    var ctx = this.chart.ctx;
                    ctx.font = Chart.helpers.fontString(Chart.defaults.global.defaultFontFamily, 'normal', Chart
                        .defaults.global.defaultFontFamily);
                    ctx.textAlign = 'center';
                    ctx.textBaseline = 'bottom';

                    this.data.datasets.forEach(function(dataset) {

                        for (var i = 0; i < dataset.data.length; i++) {
                            var model = dataset._meta[Object.keys(dataset._meta)[0]].data[i]._model,
                                total = dataset._meta[Object.keys(dataset._meta)[0]].total,
                                mid_radius = model.innerRadius + (model.outerRadius - model.innerRadius) /
                                2,
                                start_angle = model.startAngle,
                                end_angle = model.endAngle,
                                mid_angle = start_angle + (end_angle - start_angle) / 2;

                            var x = mid_radius * Math.cos(mid_angle);
                            var y = mid_radius * Math.sin(mid_angle);

                            ctx.fillStyle = '#fff';
                            if (i == 3) { // Darker text color for lighter background
                                ctx.fillStyle = '#444';
                            }
                            var percent = String(Math.round(dataset.data[i] / total * 100)) + "%";
                            //   ctx.fillText(dataset.data[i], model.x + x, model.y + y);
                            // Display percent in another line, line break doesn't work for fillText
                            ctx.fillText(percent, model.x + x, model.y + y + 15);
                        }
                    });
                }
            }
        };


        if ($('#pieChart').length) {


            var pieChartCanvas = $('#pieChart').get(0).getContext('2d')
            var pieData = donutData;

            //Create pie or douhnut chart
            // You can switch between pie and douhnut using the method below.
            new Chart(pieChartCanvas, {
                type: 'pie',
                data: pieData,
                options: pieOptions
            })
        }


        //-------------
        //- pie CHART -
        //-------------

        /***** second pie chart */


        var pieOptions = {
            events: false,
            animation: {
                duration: 500,
                easing: "easeOutQuart",
                onComplete: function() {
                    var ctx = this.chart.ctx;
                    ctx.font = Chart.helpers.fontString(Chart.defaults.global.defaultFontFamily, 'normal', Chart
                        .defaults.global.defaultFontFamily);
                    ctx.textAlign = 'center';
                    ctx.textBaseline = 'bottom';

                    this.data.datasets.forEach(function(dataset) {

                        for (var i = 0; i < dataset.data.length; i++) {
                            var model = dataset._meta[Object.keys(dataset._meta)[0]].data[i]._model,
                                total = dataset._meta[Object.keys(dataset._meta)[0]].total,
                                mid_radius = model.innerRadius + (model.outerRadius - model.innerRadius) /
                                2,
                                start_angle = model.startAngle,
                                end_angle = model.endAngle,
                                mid_angle = start_angle + (end_angle - start_angle) / 2;

                            var x = mid_radius * Math.cos(mid_angle);
                            var y = mid_radius * Math.sin(mid_angle);

                            ctx.fillStyle = '#fff';
                            if (i == 3) { // Darker text color for lighter background
                                ctx.fillStyle = '#444';
                            }
                            var percent = String(Math.round(dataset.data[i] / total * 100)) + "%";
                            //   ctx.fillText(dataset.data[i], model.x + x, model.y + y);
                            // Display percent in another line, line break doesn't work for fillText
                            ctx.fillText(percent, model.x + x, model.y + y + 15);
                        }
                    });
                }
            }
        };





        //-------------
        //- BAR CHART -
        //-------------

        var xValues = ["Upcoming", "Past", ];
        var yValues = event_count;
        var barColors = ["#17a2b8", "#28a745", "#ffc107", "#dc3545"];

        if ($('#barChart').length) {


            var $barChart = $('#barChart').get(0).getContext('2d')

            new Chart($barChart, {
                type: "bar",
                data: {
                    labels: xValues,
                    datasets: [{
                        backgroundColor: barColors,
                        data: yValues,
                        barThickness: 30,
                        maxBarThickness: 100,
                        minBarLength: 2,
                    }]


                },
                options: {
                    legend: {
                        display: false
                    },
                    title: {
                        display: true,
                        text: "Event Type"
                    },

                }
            });

        }
        ///////// last chart

        if ($('#barChart1').length) {



            var xValues1 = ["Scaffolding", "General Administration", "Construction", "Inspecting heating",
                "ventilation systems"
            ];
            var yValues1 = [60, 50, 42, 41, 14];
            var barColors1 = ["#17a2b8", "#28a745", "#ffc107", "#dc3545", "#7ba1f1"];
            var $barChart1 = $('#barChart1').get(0).getContext('2d');



            new Chart($barChart1, {
                type: "bar",
                data: {
                    labels: xValues1,
                    datasets: [{
                        backgroundColor: barColors1,
                        data: yValues1,
                        barThickness: 30,
                        maxBarThickness: 100,
                        minBarLength: 5,
                    }]
                },
                options: {
                    legend: {
                        display: false
                    },

                    tooltip: {
                        bodyFont: {
                            size: 13,
                            family: 'vazir'
                        }
                    },
                    scales: {
                        yAxes: [{
                            ticks: {
                                fontSize: 15,

                            }
                        }],
                        xAxes: [{
                            ticks: {
                                fontSize: 15,
                            }
                        }]
                    }
                }
            });


        }
        if ($('#barChart2').length) {
            var xValues2 = ["Pre Test", "Video", "Post Test", "FeedBack"];
            var yValues2 = [52, 100, 25, 40, 30];
            var barColors2 = ["#17a2b8", "#28a745", "#ffc107", "#dc3545", "#7ba1f1"];
            var $barChart2 = $('#barChart2').get(0).getContext('2d');


            new Chart($barChart2, {
                type: "bar",
                data: {
                    labels: xValues2,
                    datasets: [{
                        backgroundColor: barColors2,
                        data: yValues2,
                        barThickness: 30,
                        maxBarThickness: 100,
                        minBarLength: 5,
                    }]
                },
                options: {
                    legend: {
                        display: false
                    },

                    tooltip: {
                        bodyFont: {
                            size: 13,
                            family: 'vazir'
                        }
                    },
                    scales: {
                        yAxes: [{
                            ticks: {
                                fontSize: 15,

                            }
                        }],
                        xAxes: [{
                            ticks: {
                                fontSize: 15,
                            }
                        }]
                    }
                }
            });
        }
    </script>
@endpush
