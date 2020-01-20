<section class="container col-md-7 step step-4 step-hidden p-4 p-lg-5">
    <form class="form" id="step-form-4" novalidate>
        <div class="stepHeader">
            <div class="flex-column d-flex my-3 justify-content-center justify-content-sm-between flex-sm-row">
                <h2 class="">Income verification</h2>
                <div class="">
                    <span>* </span>
                    <small class="form-text text-muted ml-auto align-middle d-inline-block">Denotes required
                        fields</small>
                </div>
            </div>

            <p class="pb-3">Income Details</p>
        </div>

        <div class="form-row">
            <div class="form-group col-md-6">
                <label for="stp4mincome">Monthly Income</label>
                <span>* </span>
                <input pattern="^[0-9]+(\.[0-9]{1,2})?$" type="text" required class="form-control" id="stp4mincome" />
            </div>
            <div class="form-group  col-md-6">
                <label for="stp4isource">Income Source</label>
                <span>* </span>
                <select required class="custom-select" id="stp4isource">
                    <option selected>Employed</option>
                    <option value="1">Self-Employed</option>
                </select>
            </div>
        </div>
        <div class="form-goup">
            <nav aria-label="breadcrumb">
                <ol class="breadcrumb">
                    <li class="breadcrumb-item active" aria-current="page">
                        ECOA Disclosuer
                        <i class="fa fa-plus" aria-hidden="true"></i>
                    </li>
                </ol>
            </nav>
        </div>
        <div class="form-row">
            <div class="form-group col-md-4">
                <label for="stp4pfrecuency">Pay Frequency</label>
                <span>* </span>
                <select required class="custom-select" id="stp4pfrecuency">
                    <option value="0" selected>Weekly</option>
                    <option value="1">By-Weekly</option>
                    <option value="2">Monthly</option>
                </select>
            </div>
            <div class="form-group  col-md-5">
                <label for="stp4npdate">Next pay date</label>
                <span>* </span>
                <input required id="stp4npdate" class="calendar" />
            </div>
            <div class="form-group  col-md-3">
                <div class="row">
                    <label for="stp4ddeposit">Direct Deposit</label>
                    <span>* </span>
                </div>
                <select required class="custom-select" id="stp4ddeposit">
                    <option value="0" selected>Yes</option>
                    <option value="1">No</option>
                </select>
            </div>
        </div>

        <div class="stepHeader form-group">
            <p class="pb-2 pt-3">Employer information</p>
        </div>

        <div class="form-row">
            <div class="form-group col-md-7">
                <label for="stp4employer">Employer</label>
                <span>* </span>
                <input pattern="^[a-zA-Z ]{2,40}$" required type="text" class="form-control" id="stp4employer" />
            </div>
            <div class="form-group  col-md-5">
                <label for="stp4cphone">Cell Phone</label>
                <span>* </span>
                <input type="text" required
                    pattern="^(?:(?:\+?1\s*(?:[.-]\s*)?)?(?:\(\s*([2-9]1[02-9]|[2-9][02-8]1|[2-9][02-8][02-9])\s*\)|([2-9]1[02-9]|[2-9][02-8]1|[2-9][02-8][02-9]))\s*(?:[.-]\s*)?)?([2-9]1[02-9]|[2-9][02-9]1|[2-9][02-9]{2})\s*(?:[.-]\s*)?([0-9]{4})(?:\s*(?:#|x\.?|ext\.?|extension)\s*(\d+))?$"
                    class="form-control" id="stp4cphone" minlength="10" />
            </div>
        </div>

        <div class="form-group">
            <label for="stp4address1">Address</label>
            <span>* </span>
            <input required
                pattern="\d+[ ](?:[A-Za-z0-9.-]+[ ]?)+(?:Avenue|Lane|Road|Boulevard|Drive|Street|Ave|Dr|Rd|Blvd|Ln|St)\.?"
                type="text" class="form-control" id="stp4address1" />
        </div>
        <div class="form-group">
            <label for="stp4address2">Address line 2</label>
            <input type="email" class="form-control" id="stp4address2" />
        </div>
        <div class="form-row">
            <div class="form-group  col-5">
                <label for="stp3city">City</label>
                <input type="text" class="form-control" id="stp4city" />
            </div>
            <div class="form-group  col-3">
                <label for="spt3state">State</label>
                <input type="text" class="form-control" id="stp4state" />
            </div>
            <div class="form-group  col-4">
                <label for="stp3zip">ZIP Code</label>
                <input type="text" class="form-control" id="stp4zip" />
            </div>
        </div>
        <div class="form-row">
            <div class="col-md-8">
                <label for="stp4jtitle">Job Title</label>
                <span style="color: red;">* </span>
                <input pattern="^[a-zA-Z ]{2,40}$" required type="text" class="form-control" id="stp4jtitle" />
            </div>
            <div class="col-md-4">
                <label for="stp3taay">Time at job</label>
                <span style="color: red;">* </span>
                <div class="d-flex">
                    <div class="form-group col-sm-6 col-md-6 px-0">

                        <input pattern="\d*" maxlength="2" required type="text" class="form-control " id="stp4tajy" />
                        <small id="emailHelp" class="form-text text-muted text-center">Years</small>
                    </div>
                    <div class="form-group col-sm-6  col-md-6 pr-0">
                        <input pattern="\d*" maxlength="2" required type="text" class="form-control " id="stp4tajm" />
                        <small id="emailHelp" class="form-text text-muted text-center">Months</small>
                    </div>
                </div>

            </div>
        </div>

        <?php require("controlButtons.php"); ?>
    </form>
</section>