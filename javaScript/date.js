// Get the current date
var currentDate = new Date();

// Extract the individual date components
var day = currentDate.getDate();
var month = currentDate.getMonth() + 1; // Months are zero-based
var year = currentDate.getFullYear();

// Format the date string
var dateString = month + "/" + day + "/" + year;

// Update the content of the HTML element
document.getElementById("currentDate").innerHTML = dateString;

var today = new Date();
var day = today.getDay();

var dayList = ["Sunday", "Monday", "Tuesday", "Wednesday", "Thursday", "Friday", "Saturday"];
document.querySelector(".day").innerHTML = dayList[day];

