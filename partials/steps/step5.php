<section class="container col-md-7 step step-5 step-hidden p-4 p-lg-5">
    <form class="form" id="step-form-5" novalidate>
        <div class="stepHeader">
            <div class="flex-column d-flex my-3 justify-content-center justify-content-sm-between flex-sm-row">
                <h2>Banking information</h2>
                <div class="">
                    <span>* </span>
                    <small class="form-text text-muted ml-auto align-middle d-inline-block">Denotes required
                        fields</small>
                </div>
            </div>

            <p class="pb-3">Bank Account Details</p>
        </div>

        <div class="form-row">
            <div class="form-group col-md-6">
                <label for="stp5anumber">Account Number</label>
                <span>* </span>
                <input type="text" required pattern="^[0-9]{7,14}$" class="form-control" id="stp5anumber" />
            </div>
            <div class="form-group  col-md-6">
                <label for="stp5rnumber">Routing Number</label>
                <span>* </span>
                <input required pattern="^[0-9]{9}$" type="text" class="form-control" id="stp5rnumber" />
            </div>
        </div>

        <div class="form-row">
            <div class="col-md-6">
                <label for="stp5atype">Account Type</label>
                <span style="color: red;">* </span>
                <select required class="custom-select" id="stp5atype">
                    <option value="0" selected>Checking</option>
                    <option value="1">Saving</option>
                </select>
            </div>

            <div class="col-md-6">
                <label for="stp3taay">How long has it be open?</label>
                <span style="color: red;">* </span>
                <div class="d-flex">
                    <div class="form-group col-sm-6 col-md-6 px-0">

                        <input type="text" pattern="\d*" maxlength="2" required class="form-control" id="stp5hlbpy" />
                        <small id="emailHelp" class="form-text text-muted text-center">Years</small>
                    </div>
                    <div class="form-group col-sm-6  col-md-6 pr-0">
                        <input type="text" pattern="\d*" maxlength="2" required class="form-control" id="stp5hlbpm" />
                        <small id="emailHelp" class="form-text text-muted text-center">Months</small>
                    </div>
                </div>

            </div>
        </div>

        <div class="form-row">
            <div class="card card-body">
                We use your bank information as just another tool to find out the
                best possible short-tern loans we can provide to you. Your
                information is strictly confidential, and will never be used for
                anything beyound your route to approval.
            </div>
        </div>
        <?php require("controlButtons.php"); ?>
    </form>
</section>