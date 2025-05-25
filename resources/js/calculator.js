export default (selector) => {
  const calculator = document.querySelector(selector);
  if (!calculator) {
    return;
  }

  const volumeSlider = document.getElementById('volumeSlider');
  const valueSlider = document.getElementById('valueSlider');
  const volumeInput = document.getElementById('volumeInput');
  const valueInput = document.getElementById('valueInput');
  const resultAmount = document.getElementById('resultAmount');
  const volumeTrack = document.getElementById('volumeTrack');
  const valueTrack = document.getElementById('valueTrack');

  function formatNumber(num) {
    return num.toLocaleString('en-US').replace(/,/g, ' ');
  }

  function updateSliderTrack(slider, track) {
    const percent =
      ((slider.value - slider.min) / (slider.max - slider.min)) * 100;
    track.style.width = percent + '%';
  }

  function calculateRevenue(A, B) {
    // Parametry wewnętrzne kalkulatora
    const C = 0.8; // Stała wartość 80%
    const E = 0.1; // Stała wartość 10%
    const S = 0.75; // Stała wartość 75%

    // D obliczane dynamicznie w oparciu o wartość B
    const D = 0.375 * B + 32.5; // Zakres: 40 EUR (dla B=20) do 70 EUR (dla B=100)

    // Główny wzór: F(A,B) = A × C × E × D(B) × S
    // Po podstawieniu: F(A,B) = 0.06 × A × (0.375 × B + 32.5)
    const result = A * C * E * D * S;

    return Math.round(result);
  }

  function updateValues() {
    // Get values from sliders (these are always valid)
    const A = parseInt(volumeSlider.value); // Commercial test orders volume per month
    const B = parseInt(valueSlider.value); // Average commercial test order value

    // Calculate result using the proper formula
    const additionalRevenue = calculateRevenue(A, B);
    resultAmount.textContent = formatNumber(additionalRevenue);

    // Update slider tracks
    updateSliderTrack(volumeSlider, volumeTrack);
    updateSliderTrack(valueSlider, valueTrack);
  }

  function updateFromInput() {
    // Get values from inputs
    const volumeValue = parseInt(volumeInput.value) || 0;
    const valueValue = parseInt(valueInput.value) || 0;

    // Only update sliders if the input values are within valid range
    // This allows typing intermediate values without blocking
    if (
      volumeValue >= parseInt(volumeSlider.min) &&
      volumeValue <= parseInt(volumeSlider.max)
    ) {
      volumeSlider.value = volumeValue;
    }

    if (
      valueValue >= parseInt(valueSlider.min) &&
      valueValue <= parseInt(valueSlider.max)
    ) {
      valueSlider.value = valueValue;
    }

    // Always update the calculation and visual elements
    updateValues();
  }

  // Event listeners for sliders and inputs
  volumeSlider.addEventListener('input', function () {
    // Update input value when slider changes
    volumeInput.value = volumeSlider.value;
    updateValues();
  });

  valueSlider.addEventListener('input', function () {
    // Update input value when slider changes
    valueInput.value = valueSlider.value;
    updateValues();
  });

  volumeInput.addEventListener('input', updateFromInput);
  valueInput.addEventListener('input', updateFromInput);

  // Initialize calculator
  updateValues();
};
