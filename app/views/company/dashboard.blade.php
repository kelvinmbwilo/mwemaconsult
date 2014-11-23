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
                <span>{{ count(Order::all()) }}</span>
                Total Candidates
            </div>
        </div>
    </div>
    <div class="col-md-3">
        <div class="mini-stat clearfix">
            <span class="mini-stat-icon tar"><i class="fa fa-tag"></i></span>
            <div class="mini-stat-info">
                <span>{{ count(Order::where('status','pending')->get()) }}</span>
                Pending Order
            </div>
        </div>
    </div>
    <div class="col-md-3">
        <div class="mini-stat clearfix">
            <span class="mini-stat-icon pink"><i class="fa fa-money"></i></span>
            <div class="mini-stat-info">
                <span>{{ count(Order::where('status','In Progress')->get()) }}</span>
                Orders In progress
            </div>
        </div>
    </div>
    <div class="col-md-3">
        <div class="mini-stat clearfix">
            <span class="mini-stat-icon green"><i class="fa fa-eye"></i></span>
            <div class="mini-stat-info">
                <span>{{ count(Order::where('status','Completed')->get()) }}</span>
                Completed Orders
            </div>
        </div>
    </div>
</div>
<!--mini statistics end-->

<div class="row">
    <div class="col-md-8">
        <!--earning graph start-->
        <section class="panel">
            <header class="panel-heading">
                Summary Table <span class="tools pull-right">
            <a href="javascript:;" class="fa fa-chevron-down"></a>
            <a href="javascript:;" class="fa fa-cog"></a>
            <a href="javascript:;" class="fa fa-times"></a>
            </span>
            </header>
            <div class="panel-body">


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
                        <h4 class="pull-left"  style="color:#000000"> Company Details</h4>
                        <!-- Nav tabs -->
                        <div class="btn-group pull-right stat-tab">
                            <a href="index.html#line-chart" class="btn stat-btn active" data-toggle="tab"><i class="ico-stats"></i></a>
                            <a href="index.html#bar-chart" class="btn stat-btn" data-toggle="tab"><i class="ico-bars"></i></a>
                        </div>
                    </div>
                    <!-- Tab panes -->
                    <div class="tab-content">
                        <div class="tab-pane active" id="line-chart" style="color:#000000">
                            <h4>Name : {{ $company->name }}</h4>
                            <h4>Address : {{ $company->address }}</h4>
                            <h4>Region : {{ $company->getRegion->region }}</h4>
                            <p>Email : {{ $company->email }}</p>
                            <p>Tel : {{ $company->tel }}</p>
                            <p>Fax : {{ $company->fax }}</p>
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

@stop