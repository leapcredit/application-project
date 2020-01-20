<section class="container col-md-7 step step-3 step-hidden p-4 p-lg-5">
    <form class="form" id="step-form-3">
        <div class="stepHeader">
            <div class="flex-column d-flex my-3 justify-content-center justify-content-sm-between flex-sm-row">
                <h2>General information</h2>
                <div class="">
                    <span>* </span>
                    <small class="form-text text-muted align-middle d-inline-block">Denotes required
                        fields</small>
                </div>
            </div>

            <p class="pb-3">Contact information</p>
        </div>

        <div class="form-row">
            <div class="form-group col-md-6">
                <label for="stp3fname">First Name</label>
                <span>* </span>
                <input type="text" required class="form-control" id="stp3fname" />
            </div>
            <div class="form-group  col-md-6">
                <label for="stp3lname">Last Name</label>
                <span>* </span>
                <input type="text" class="form-control" id="stp3lname" />
            </div>
        </div>
        <div class="form-row">
            <div class="form-group col-6">
                <label for="stp3cphone">Cell Phone</label>
                <span>* </span>
                <input type="text" class="form-control" id="stp3cphone" />
            </div>
            <div class="form-group  col-6">
                <label for="stp3hphone">Home Phone</label>
                <input type="text" class="form-control" id="stp3hphone" />
            </div>
        </div>
        <div class="form-row">
            <div class="form-group col-12">
                <label for="stp3address">Address</label>
                <span>* </span>
                <input type="email" class="form-control" id="stp3address" />
            </div>
            <div class="form-group col-12">
                <label for="stp3address2">Address line 2</label>
                <input type="email" class="form-control" id="stp3address2" />
            </div>
        </div>

        <div class="form-row">
            <div class="form-group  col-5">
                <label for="stp3city">City</label>
                <span>* </span>
                <input type="text" class="form-control" id="stp3city" />
            </div>
            <div class="form-group  col-3">
                <label for="spt3state">State</label>
                <span>* </span>
                <input type="text" class="form-control" id="spt3state" />
            </div>
            <div class="form-group  col-4">
                <label for="stp3zip">ZIP Code</label>
                <span>* </span>
                <input type="text" class="form-control" id="stp3zip" />
            </div>
        </div>
        <div class="form-row">
            <div class="col-md-4">
                <label for="stp3taay">Time at address</label>
                <span style="color: red;">* </span>
                <div class="d-flex">
                    <div class="form-group col-sm-6 col-md-6 px-0">

                        <input type="text" class="form-control" id="stp3taay" />
                        <small id="emailHelp" class="form-text text-muted text-center">Years</small>
                    </div>
                    <div class="form-group col-sm-6  col-md-6 pr-0">
                        <input type="text" class="form-control" id="stp3taam" />
                        <small id="emailHelp" class="form-text text-muted text-center">Months</small>
                    </div>
                </div>

            </div>


            <div class="col-md-5">
                <label for="stp3roo">Do you rent or own?</label>
                <span style="color: red;">* </span>
                <select class="custom-select" id="stp3roo">
                    <option selected>Rent</option>
                    <option value="1">Own</option>
                </select>
            </div>
        </div>
        <div class="stepHeader">
            <p class="pt-4">Identification</p>
        </div>
        <p class="pt-0 mt-0">
            At this time we only can accept a valid state driver's license as
            proof of Identification.
        </p>
        <div class="form-row h-100">
            <div class="form-group col-8 col-md-5">
                <label for="stp3dlcity">City</label>
                <span>* </span>
                <input type="text" class="form-control" id="stp3dlcity" />
            </div>
            <div class="form-group col-4 col-md-3">
                <label for="stp3dlstate">State</label>
                <span>* </span>
                <input type="text" class="form-control" id="stp3dlstate" />
            </div>

            <div class="col-md-4">
                <div>
                    <label for="inputState">Active military?</label>
                    <span style="color: red;"> * </span>
                </div>
                <div class="align-middle">
                    <div class="custom-control custom-radio custom-control-inline">
                        <input type="radio" id="customRadioInline1" name="customRadioInline1"
                            class="custom-control-input">
                        <label class="custom-control-label" for="customRadioInline1">No</label>
                    </div>
                    <div class="custom-control custom-radio custom-control-inline">
                        <input type="radio" id="customRadioInline2" name="customRadioInline1"
                            class="custom-control-input">
                        <label class="custom-control-label" for="customRadioInline2">Yes</label>
                    </div>
                </div>

            </div>
        </div>

        <?php require("controlButtons.php"); ?>
    </form>
</section>