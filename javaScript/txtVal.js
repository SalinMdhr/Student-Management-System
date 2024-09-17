

function checkInput() {
  var input = document.getElementById("stdid");
  var message = document.getElementById("characterMessage");
  if (input.indexOf("SP") === 0) {
    // User entered "SP" at the beginning of the input
    // Perform your desired action here (e.g., submit the form)
    message.textContent = "??";
  } else {
    // User did not enter "SP" at the beginning of the input
    // Display an error message or take appropriate action
    message.textContent = "Input is invalid. Please start with 'SP'";
  }
}