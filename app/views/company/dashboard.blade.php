@extends("layout.master")

@section('heading')

@stop

@section('contents')
{{ HTML::style("js/jvector-map/jquery-jvectormap-1.2.2.css") }}
{{ HTML::style("css/clndr.css") }}
<!--clock css-->
{{ HTML::style("js/css3clock/css/style.css") }}
<!--Morris Chart CSS -->
{{ HTML::style("js/morris-chart/morris.css") }}
<!--mini statistics start-->
<div class="row">
    <div class="col-md-3">
        <div class="mini-stat clearfix">
            <span class="mini-stat-icon orange"><i class="fa fa-gavel"></i></span>
            <div class="mini-stat-info">
                <span>{{ count(Order::where('company_id',$company->id)->get()) }}</span>
                Total Candidates
            </div>
        </div>
    </div>
    <div class="col-md-3">
        <div class="mini-stat clearfix">
            <span class="mini-stat-icon tar"><i class="fa fa-tag"></i></span>
            <div class="mini-stat-info">
                <span>{{ count(Order::where('status','pending')->where('company_id',$company->id)->get()) }}</span>
                Pending Order
            </div>
        </div>
    </div>
    <div class="col-md-3">
        <div class="mini-stat clearfix">
            <span class="mini-stat-icon pink"><i class="fa fa-money"></i></span>
            <div class="mini-stat-info">
                <span>{{ count(Order::where('status','In Progress')->where('company_id',$company->id)->get()) }}</span>
                Orders In progress
            </div>
        </div>
    </div>
    <div class="col-md-3">
        <div class="mini-stat clearfix">
            <span class="mini-stat-icon green"><i class="fa fa-eye"></i></span>
            <div class="mini-stat-info">
                <span>{{ count(Order::where('status','Completed')->where('company_id',$company->id)->get()) }}</span>
                Completed Orders
            </div>
        </div>
    </div>
</div>
<!--mini statistics end-->
<div class="col-sm-12">
    <div class="container1">

    </div>
</div>

<div class="row">
    <div class="col-md-8">
        <!--earning graph start-->
        <section class="panel">
            <header class="panel-heading">
                Summary Table
            </header>
            <div class="panel-body">

                <table class="table table-bordered table-stripped table-hover">
                    <tr>
                        <th>Screening Type</th>
                        <th>All</th>
                        <th>Completed</th>
                        <th>In Progress</th>
                        <th>Pending</th>
                        <th>Declined</th>
                    </tr>
                    @foreach(Screening::all() as $screen)
                        <tr>
                            <td>{{ $screen->name }}</td>
                            <td>{{ count(OrderScreening::where('screen_id',$screen->id)->whereIn('order_id',Order::where('company_id',$company->id)->get()->lists('id'))->get()) }}</td>
                            <td>{{ count(OrderScreening::where('screen_id',$screen->id)->whereIn('order_id',Order::where('company_id',$company->id)->get()->lists('id'))->where('complete','100')->where('visibilty_status','show')->get()) }}</td>
                            <td>{{ count(OrderScreening::where('screen_id',$screen->id)->whereIn('order_id',Order::where('company_id',$company->id)->where('status','In Progress')->get()->lists('id') + array(0))->where('visibilty_status','hidden')->get()) }}</td>
                            <td>{{ count(Order::whereIn('id',OrderScreening::where('screen_id',$screen->id)->get()->lists('order_id'))->where('company_id',$company->id)->where('status','pending')->get()) }}</td>
                            <td>{{ count(Order::whereIn('id',OrderScreening::where('screen_id',$screen->id)->get()->lists('order_id'))->where('company_id',$company->id)->where('status','Declined')->get()) }}</td>

                        </tr>
                    @endforeach
                </table>
            </div>
        </section>
        <!--earning graph end-->
    </div>
    <div class="col-md-4">
        <!--widget graph start-->
        <section class="panel">
            <div class="panel-body">
                <div class="monthly-stats">
                    <div class="clearfix">
                        <br><br><br>
                        <h3 class="pull-left"  style="color:#000000"> Company Details</h3>

                        <!-- Nav tabs -->
                        <div class="btn-group pull-right stat-tab">
                            <a href="index.html#line-chart" class="btn stat-btn active" data-toggle="tab"><i class="ico-stats"></i></a>
                            <a href="index.html#bar-chart" class="btn stat-btn" data-toggle="tab"><i class="ico-bars"></i></a>
                        </div>
                    </div>
                    <!-- Tab panes -->
                    <div class="tab-content">
                        <div class="tab-pane active" id="line-chart" style="color:#000000">
                            <hr>
                            <h4>Name : {{ $company->name }}</h4>
                            <h4>Address : {{ $company->address }}</h4>
                            <h4>Country : {{ $company->getRegion->name }}</h4>
                            <h4>Email : {{ $company->email }}</h4>
                            <h4>Tel : {{ $company->tel }}</h4>
                            <h4>Fax : {{ $company->fax }}</h4>
                        </div>
                        <div class="tab-pane" id="bar-chart">
                            <div class="sparkline" data-type="bar" data-resize="true" data-height="75" data-width="90%" data-bar-color="#d4a7f5" data-bar-width="10" data-data="[300,200,500,700,654,987,457,300,876,454,788,300,200,500,700,654,987,457,300,876,454,788]"></div>
                        </div>
                    </div>
                </div>
            </div>
        </section>
        <!--widget graph end-->
        <!--widget graph start-->
        <!--widget weather end-->
    </div>
</div>
<script>
    <?php
    $bardata = "";
    $linedata = "";
    $piedata = "";

    $i = 0;
foreach(Screening::all() as $screen){
$i ++;
  $Completed = count(OrderScreening::where('screen_id',$screen->id)->whereIn('order_id',Order::where('company_id',$company->id)->get()->lists('id'))->where('complete','100')->where('visibilty_status','show')->get());
  $InProgress = count(OrderScreening::where('screen_id',$screen->id)->whereIn('order_id',Order::where('company_id',$company->id)->where('status','In Progress')->get()->lists('id') + array(0))->where('visibilty_status','hidden')->get());
  $Pending = count(Order::whereIn('id',OrderScreening::where('screen_id',$screen->id)->get()->lists('order_id'))->where('company_id',$company->id)->where('status','pending')->get());
  $Declined =count(Order::whereIn('id',OrderScreening::where('screen_id',$screen->id)->get()->lists('order_id'))->where('company_id',$company->id)->where('status','Declined')->get());
   $total = count(Order::whereIn('id',OrderScreening::where('screen_id',$screen->id)->get()->lists('order_id'))->where('company_id',$company->id)->get());;
   $bardata .= (count(Screening::all()) == $i)?"{ type: 'column',name:'".$screen->name."',data:[$Completed,$InProgress,$Pending,$Declined] }":"{ type: 'column',name:'".$screen->name."',data:[$Completed,$InProgress,$Pending,$Declined] },";
   $linedata .= (count(Screening::all()) == $i)?"{ type: 'spline',name:'".$screen->name."',data:[$Completed,$InProgress,$Pending,$Declined] }":"{ type: 'spline',name:'".$screen->name."',data:[$Completed,$InProgress,$Pending,$Declined] },";
   $piedata .= (count(Screening::all()) == $i)?"{ name:'".$screen->name."',y:$total }":"{ type: 'spline',name:'".$screen->name."',y:$total },";

}

?>
    $(function () {

        $('.container1').highcharts({
            title: {
                text: '<?php echo $company->name ?> Screening Order Summary'
            },
            xAxis: {
                categories: ['Completed', 'In Progress', 'Pending', 'Declined']
            },
            labels: {
                items: [{
                    html: 'Screening',
                    style: {
                        left: '50px',
                        top: '18px',
                        color: (Highcharts.theme && Highcharts.theme.textColor) || 'black'
                    }
                }]
            },
            series: [<?php echo $bardata ?>, <?php echo $linedata ?>, {
                type: 'pie',
                name: 'Total consumption',
                data: [<?php echo $piedata ?>],
                center: [100, 80],
                size: 100,
                showInLegend: false,
                dataLabels: {
                    enabled: false
                }
            }]
        });
    });
</script>

@stop