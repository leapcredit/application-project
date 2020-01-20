<section class="container col-md-7 step step-8 step-hidden p-4 p-lg-5">
    <form class="form" id="step-form-8" novalidate>
        <div class="stepHeader flex-column d-flex my-3 justify-content-center justify-content-sm-between flex-sm-row">
            <h2>Review Your Information</h2>
        </div>
        <p>
            Does your bank information look correct?
        </p>

        <div class="form-row">
            <div class="form-group pt-3 col-md-6">
                <label for="rcrAccNumber">Account Number</label>
                <span>* </span>
                <input required type="text" class="form-control" id="rcrAccNumber" />

            </div>

            <div class="form-group pt-3 col-md-6">
                <label for="rcrRoutingNumber">Routing Number</label>
                <span>* </span>
                <input required type="text" class="form-control" id="rcrRoutingNumber" />

            </div>
        </div>

        <p>
            Make sure your details are correct.
        </p>

        <div class="form-row">
            <div class="form-group col-12">
                <label for="rcrCustAddress">Address</label>
                <span>* </span>
                <input required type="text" class="form-control" id="rcrCustAddress" />
            </div>
            <div class="form-group  col-12">
                <label for="rcrCustAddress2">Address line 2</label>
                <input type="text" class="form-control" id="rcrCustAddress2" />
            </div>
        </div>

        <div class="form-row">
            <div class="form-group  col-5">
                <label for="rcrCustcity">City</label>
                <input type="text" class="form-control" id="rcrCustcity" />
            </div>
            <div class="form-group  col-3">
                <label for="rcrCuststate">State</label>
                <input type="text" class="form-control" id="rcrCuststate" />
            </div>
            <div class="form-group  col-4">
                <label for="rcrCustzip">ZIP Code</label>
                <input type="text" class="form-control" id="rcrCustzip" />
            </div>
        </div>




        <div class="flex-column-reverse d-flex mt-3 justify-content-center justify-content-sm-between flex-sm-row">

            <div class="d-flex justify-content-center ml-auto">
                <button type="submit" class="btn btn-success btn-next">
                    Save & Continue
                    <i class="fa fa-angle-right fa-lg" aria-hidden="true"></i>
                </button>
            </div>
        </div>
    </form>
</section>