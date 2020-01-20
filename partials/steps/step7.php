<section class="container col-md-7 step step-7 step-hidden p-4 p-lg-5">
    <form class="form" id="step-form-7" novalidate>
        <div class="stepHeader flex-column d-flex my-3 justify-content-center justify-content-sm-between flex-sm-row">
            <h2>Loan Details</h2>
        </div>
        <p>
            How much do you need?
        </p>


        <div class="form-group pt-3">
            <div class="form-row">
                <input type="range" class="custom-range" id="customRange" />
            </div>
        </div>

        <p>
            Confirm your income details
        </p>

        <div class="form-row">
            <div class="form-group col-md-6">
                <label for="rcrCustMI">Monthly Income</label>
                <span>* </span>
                <input type="text" required class="form-control" id="rcrCustMI" />
            </div>
            <div class="form-group  col-md-6">
                <label for="rcrCustEmp">Employer</label>
                <span>* </span>
                <input type="text" required class="form-control" id="rcrCustEmp" />
            </div>
        </div>
        <div class="form-row">
            <div class="form-group col-md-6">
                <label for="rcrCustpfrecuency">How Often Do You Get Paid</label>

                <select class="custom-select" id="rcrCustpfrecuency" required>
                    <option value="0" selected>Weekly</option>
                    <option value="1">By-Weekly</option>
                    <option value="2">Monthly</option>
                </select>
            </div>
            <div class="form-group col-md-6">
                <label for="rcrCustnpdate">Next Payment date</label>

                <input id="rcrCustnpdate" class="calendar" required />
            </div>
        </div>




        <div class="flex-column-reverse d-flex mt-3 justify-content-center justify-content-sm-between flex-sm-row">

            <div class="d-flex justify-content-center">
                <button type="submit" class="btn btn-success btn-next">
                    Submit application
                    <i class="fa fa-angle-right fa-lg" aria-hidden="true"></i>
                </button>
            </div>
        </div>
    </form>
</section>