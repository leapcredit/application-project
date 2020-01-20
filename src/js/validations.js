//var letersonlyRegex = new RegExp("^[A-Za-z]+$");
// required function to start all forms validations
function initFormValidations(next) {
  // Disable default submits on each step form
  jQuery("form").submit(function(evt) {
    var formId = this.id;

    evt.preventDefault();
    var invalids = 0;

    const inputs = jQuery("#" + formId + " :input");
    inputs
      .filter("[required]:visible")
      .each(function() {
        jQuery(this)
          .closest("div")
          .addClass("was-validated");

        if (!this.validity.valid) {
          invalids++;
          console.log('Invalid fields:', invalids);
        }
      });

    // possible extra validations in case they are needed
    const formIdStep = formId.substring(10); // 10 = length of: "step-form-"
    if (window["validateStep" + formIdStep]) {
      const extraValidations = window["validateStep" + formIdStep]();
      if (!extraValidations) {
        return false;
      }
    }

    if (invalids === 0) {
      inputs.each(function(){
        if(this.id && this.id.length > 0) {
          window.formData[this.id] = jQuery(this).val();
        }
      });

      next && next();
    } else {
      window.scrollTo({ top: 0, behavior: "smooth" });
    }
  });
}


// After fill all fields on step 6, use data to fill Step 7 and Step 8
function validateStep6() {

  // Fields from Step 4
  jQuery('#rcrCustMI').val( window.formData['stp4mincome'] );
  jQuery('#rcrCustEmp').val( window.formData['stp4employer'] );
  jQuery('#rcrCustpfrecuency').val( window.formData['stp4pfrecuency'] );
  jQuery('#rcrCustnpdate').val( window.formData['stp4npdate'] );


  // Fields from Step 5
  jQuery('#rcrAccNumber').val( window.formData['stp5anumber'] );
  jQuery('#rcrRoutingNumber').val( window.formData['stp5rnumber'] );
  jQuery('#rcrCustAddress').val( window.formData['stp3address'] );
  jQuery('#rcrCustcity').val( window.formData['stp3city'] );
  jQuery('#rcrCuststate').val( window.formData['stp3state'] );
  jQuery('#rcrCustzip').val( window.formData['stp3zip'] );

  return true;
}


function validateStep8() {
  const params = {
      method : "POST",
      body: JSON.stringify(window.formData)
  };
  fetch(window.ENDPOINT_STORE, params)
  .then(response => {
    if(response.status>=200 && response.status<300) {
      return response.json()
    } else {
      response.text().then(text => {
        text && console.log(text)
      })
      throw Error(response.statusText);
    }

  }).then(res => {
    console.log('Response:', res);
  }).catch(error => {
    console.error('Request error:', error)
  });

  return false;
}
// EOF