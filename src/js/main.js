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
