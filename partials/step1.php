<div class="col-12 col-md-8 step step-1">
    <section class="container p-4 p-lg-5">
        <form class="form" id="step-form-1" novalidate>
            <div class="stepHeader d-flex justify-content-sm-start justify-content-center">
                <h2>How much do you need?</h2>
            </div>

            <div class="form-group pt-3">
                <div class="form-row">
                    <input type="range" class="custom-range" id="customRange" />
                </div>
            </div>

            <div class="form-group">
                <div class="form-row stepHeader">
                    <p for="stp1whatdoyouneeditfor">What do you need it for?</p>
                    <input type="text" required class="form-control" id="stp1whatdoyouneeditfor" />
                    <div class="invalid-feedback">Tell us how you plan use it. (custom message)</div>
                </div>
            </div>
            <div class="d-flex justify-content-sm-end justify-content-center">
                <button type="submit" class="px-1 btn btn-success  btn-next">
                    Start Application
                    <i class="fa fa-angle-right fa-lg" aria-hidden="true"></i>
                </button>
            </div>

        </form>
    </section>
</div>