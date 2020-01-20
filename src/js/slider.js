
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
