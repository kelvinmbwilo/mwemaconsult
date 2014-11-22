@extends("layout.master")

@section('heading')
<h2>
    Place New Order
</h2>
@stop

@section('contents')
{{ HTML::style("css/jquery.steps.css%3F1.css") }}
<section class="panel">
    <header class="panel-heading">
          Place a New Order
    </header>
    <div class="panel-body">

        <div id="wizard">
            <h2>Candidate Details</h2>

            <section>
                <form class="form-horizontal">
                    <div class="form-group">
                        <label class="col-lg-2 control-label">Full Name</label>
                        <div class="col-lg-8">
                            <input type="text" class="form-control" placeholder="Full Name">
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="col-lg-2 control-label">Email Address</label>
                        <div class="col-lg-8">
                            <input type="text" class="form-control" placeholder="Email Address">
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="col-lg-2 control-label">User Name</label>
                        <div class="col-lg-8">
                            <input type="text" class="form-control" placeholder="Username">
                        </div>
                    </div>
                </form>
            </section>

            <h2>Second Step</h2>
            <section>
                <form class="form-horizontal">
                    <div class="form-group">
                        <label class="col-lg-2 control-label">Phone</label>
                        <div class="col-lg-8">
                            <input type="text" class="form-control" placeholder="Phone">
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="col-lg-2 control-label">Mobile</label>
                        <div class="col-lg-8">
                            <input type="text" class="form-control" placeholder="Mobile">
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="col-lg-2 control-label">Address</label>
                        <div class="col-lg-8">
                            <textarea class="form-control" cols="60" rows="5"></textarea>
                        </div>
                    </div>
                </form>
            </section>

            <h2>Third Step</h2>
            <section>
                <form class="form-horizontal">
                    <div class="form-group">
                        <label class="col-lg-2 control-label">Bill Name 1</label>
                        <div class="col-lg-8">
                            <input type="text" class="form-control" placeholder="Phone">
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="col-lg-2 control-label">Bill Name 2</label>
                        <div class="col-lg-8">
                            <input type="text" class="form-control" placeholder="Mobile">
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="col-lg-2 control-label">Status</label>
                        <div class="col-lg-8">
                            <textarea class="form-control" cols="60" rows="5"></textarea>
                        </div>
                    </div>
                </form>
            </section>

            <h2>Final Step</h2>
            <section>
                <p>Congratulations This is the Final Step</p>
            </section>
        </div>
    </div>
</section>
{{ HTML::script("js/jquery-steps/jquery.steps.js") }}
<script>
    $(function ()
    {
        $("#wizard").steps({
            headerTag: "h2",
            bodyTag: "section",
            transitionEffect: "slideLeft"
        });

        $("#wizard-vertical").steps({
            headerTag: "h2",
            bodyTag: "section",
            transitionEffect: "slideLeft",
            stepsOrientation: "vertical"
        });
    });


</script>
@stop