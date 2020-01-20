/**
 * Stepper class to manage from steps
 **/
class Stepper {

  constructor() {
    this.step = 0;
    this.listeners = [];
  }

  addListener(fn) {
    this.listeners.push(fn);
  }

  update(step) {
    this.listeners.forEach(listener => listener(step));
  }

  nextStep() {
    this.step = this.step + 1;
    this.update(this.step);
    return this.step;
  }

  prevStep() {
    if (this.step > 0) {
      this.step = this.step - 1;
      this.update(this.step);
    }
    return this.step;
  }

  getCurrentStep() {
    return this.step;
  }
}


function previousStep() {
  window.stepsForm.prevStep();
}

function nextStep() {
  const step = window.stepsForm.getCurrentStep();

  if (step < MAX_STEPS) {
    window.stepsForm.nextStep();
  }
}

// Every time the stepper change the current step, we will need to update the UI here:
window.stepsProgress = [16, 32, 50, 66, 82, 100];
function handleStepChange(step) {
  // TODO: Remove this temporal validation.. it's used only to void blank steps:
  if (step < MAX_STEPS) {
    jQuery(".step").hide();
    jQuery(".step-" + (step + 1)).show();
    $("div.side-bar-menu .navbar-nav li").removeClass("active");

    // https://developer.mozilla.org/en-US/docs/Web/API/Window/scrollTo#Example
    window.scrollTo({ top: 0, behavior: "smooth" });
    // console.log("set progress bar to step:", step);

    const stepValue = window.stepsProgress[step];
    $(".progress-bar").css({ width: stepValue + "%" });
    $(".progress-bar").attr("aria-valuenow", stepValue);
    $("div.side-bar-menu .navbar-nav li.nb-stp-" + step).addClass("active");

    const stateData = window.statesRules[step];
    if (stateData) {
      history.pushState({}, stateData.title, stateData.url);
    }
  }
}

function initApp() {
  jQuery("#stp2dob").datepicker({
    uiLibrary: "bootstrap4",
    maxDate: new Date()
  });
  jQuery("#stp4npdate").datepicker({
    uiLibrary: "bootstrap4",
    minDate: new Date()
  });
  jQuery("#rcrCustnpdate").datepicker({
    uiLibrary: "bootstrap4"
  });

  jQuery(".btn-previous").click(previousStep);

  // on validations file:
  initFormValidations(nextStep);

  initRangeSlider();

  // Everything start here!
  window.stepsForm = new Stepper();
  window.stepsForm.addListener(handleStepChange);

  // TODO: remove the following call or use it for testing to choose the initial step:
  //handleStepChange(5);
}
window.addEventListener("DOMContentLoaded", initApp);
window.MAX_STEPS = 6;
window.formData = {};
window.ENDPOINT_STORE = "/service/";
window.statesRules = [
  { title: "Start Application", url: "/StartApplication" },
  { title: "Getting Started", url: "/GettingStarted" },
  { title: "General Information", url: "/GeneralInformation" },
  { title: "Income Verification", url: "/IncomeVerification" },
  { title: "Banking Information", url: "/BankingInformation" },
  { title: "Final Authorization", url: "/FinalAuthorization" }
];


function initRangeSlider() {
  const sliderRange = document.querySelector('#moneyNeed');
  const sliderValue = document.querySelector('#moneyValue');
  sliderValue.parentElement.classList.remove('d-none');

  document.querySelector('#slider-minvalue').innerHTML = '$' + sliderRange.min;
  document.querySelector('#slider-maxvalue').innerHTML = '$' + sliderRange.max;

  let offsetLeft = 6;
  const off = sliderRange.offsetWidth / (parseInt(sliderRange.max) - parseInt(sliderRange.min));
  const px =  ((sliderRange.valueAsNumber - parseInt(sliderRange.min)) * off) - (sliderValue.offsetParent.offsetWidth / 2) - offsetLeft;

  sliderValue.parentElement.style.left = px + 'px';
  sliderValue.parentElement.style.top = - (sliderRange.offsetHeight + 12) + 'px';
  sliderValue.innerHTML = '$' + sliderRange.value;

  sliderRange.oninput = function() {
    offsetLeft = 12; // this line fix parent box padding in css.
    let px = ((sliderRange.valueAsNumber - parseInt(sliderRange.min)) * off) - (sliderValue.offsetWidth / 2) - offsetLeft;
    sliderValue.innerHTML = '$' + sliderRange.value;
    sliderValue.parentElement.style.left = px + 'px';
  };
}

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