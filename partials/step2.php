<div class="col-12 col-md-8 step step-2 step-hidden">
    <section class="container  p-4 p-lg-5">
        <form class="form" id="step-form-2" novalidate>
            <div class="stepHeader">
                <h2 class="d-flex justify-content-center justify-content-sm-between flex-sm-row">Create Account</h2>
                <p class="pb-3">Create your account is easy, fast, and secure</p>
            </div>

            <div class="form-group">
                <label for="stp2email">Email Address</label>
                <input type="email" required class="form-control" id="stp2email" placeholder="Email Address" />
            </div>

            <div class="form-row">
                <div class="form-group col-md-6">
                    <label for="stp2ssn">Social Security Number</label>
                    <input type="text" pattern="^(?!000|666)[0-8][0-9]{2}-(?!00)[0-9]{2}-(?!0000)[0-9]{4}$" required
                        class="form-control" id="stp2ssn" />
                    <div class="invalid-feedback">Please use 000-00-0000 format</div>
                </div>
                <div class="form-group  col-md-6">
                    <label for="stp2dob">Date of Birth</label>
                    <input required id="stp2dob" class="calendar" />
                </div>
            </div>
            <p class="p-0 m-0 stepTitle">Already have and account?</p>
            <a class="p-0 m-0" href="#">Login to apply</a>

            <div class="d-flex justify-content-sm-end justify-content-center pt-2">
                <button type="submit" class="px-1 btn btn-success  btn-next">
                    Save & Continue &nbsp
                    <i class="fa fa-angle-right fa-lg" aria-hidden="true"></i>
                </button>
            </div>
        </form>
    </section>
</div>