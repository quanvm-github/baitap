var calendarCreate = [];
var dayCurrent = new Date();
var monthCurrent = dayCurrent.getMonth(); // to compare month value
var yearCurrent = dayCurrent.getFullYear(); // to compare year value
var month = monthCurrent; // to set month value
var year = yearCurrent; // to set year value
var dayWeekName = ['Sun', 'Mon', 'Tue', 'Wed', 'Thu', 'Fri', 'Sat'];
var monthName = ['January', 'February', 'March', 'April', 'May', 'June', 'July',  'August', 'September', 'October', 'November', 'December'];
function show() {
	var day = new Date(year, month); // first day of the set month/year
	var startYear = year - 100;
	var endYear = year + 150;
	calendar.style.display = 'block'; // reappear calendar form (hide after a day clicked)

	//==== calendar control (pev/next button, select month/year, day of week name) ====

	calendarCreate.push('<table>');
	calendarCreate.push('<tr>');
	calendarCreate.push('<td><button onclick="preYear()">&llarr;</button></td>');
	calendarCreate.push('<td><button onclick="preMonth()">&larr;</button></td>');
	calendarCreate.push('<td colspan = "2">');
	calendarCreate.push('<select id = "changeMonth" onchange="changeMonth()">');
	for (var i = 0; i < 12; i++) {
		calendarCreate.push('<option value="' + i + '">' + monthName[i] + '</option>');
	}
	calendarCreate.push('</select>');
	calendarCreate.push('</td>');

	calendarCreate.push('<td>');
	calendarCreate.push('<select id = "changeYear" onchange="changeYear()">');
	for (var i = startYear; i < endYear; i++) {
		calendarCreate.push('<option value="' + i + '">' + i + '</option>');
	}
	calendarCreate.push('</select>');
	calendarCreate.push('</td>');

	calendarCreate.push('<td><button onclick="nextMonth()">&rarr;</button></td>');
	calendarCreate.push('<td><button onclick="nextYear()">&rrarr;</button></td>');
	calendarCreate.push('</tr>');

	calendarCreate.push('<tr>');
	for(var i = 0; i < 7; i++) {
		calendarCreate.push('<td class="day_week_name">' + dayWeekName[i] + '</td>');
	}
	calendarCreate.push('</tr>');

	//==== calendar day of month ====

	calendarCreate.push('<tr>');
	for (var i = 0; i < day.getDay(); i++) {
    		calendarCreate.push('<td class="emptydate"></td>');
  	}

	// check if excess one month
	while(day.getMonth() == month) {
		// hight light current day
		if(day.getDate() == dayCurrent.getDate() && month == monthCurrent && year == yearCurrent) {
			calendarCreate.push('<td class="date hightlight" onclick="getDate(' + day.getDate() + ')">' + day.getDate() + '</td>');
		} else {
    			calendarCreate.push('<td class= "date" onclick="getDate(' + day.getDate() + ')">' + day.getDate() + '</td>');
		}
		// end line after saturday
    		if (day.getDay() == 6) {
      			calendarCreate.push('</tr><tr>');
    		}
    		day.setDate(day.getDate() + 1);
  	}
  	for (var i = day.getDay(); i < 7; i++) {
    		calendarCreate.push('<td class="emptydate"></td>');
  	}

	calendarCreate.push('</tr>');
	calendarCreate.push('</table>');
	calendar.innerHTML = calendarCreate.join('');
	calendarCreate = [];

	// set value to combobox
	document.getElementById("changeMonth").value = month;
	document.getElementById("changeYear").value = year;
}

//==== click a day -> display input text ====
function getDate(date) {
	document.getElementById("inputtext").value = date + "/" + (month + 1) + "/" + year;
	calendar.style.display = 'none';
}

//==== next / pev button click ====
function nextMonth() {
	month++;
	if (month > 11) {
		month = 0;
		year++;
	}
	show();
}

function preMonth() {
	month--;
	if (month < 0) {
		month = 11;
		year--;
	}
	show();
}

function nextYear() {
	year++;
	show();
}

function preYear() {
	year--;
	show();
}

//==== get month / year from combobox ====
function changeMonth() {
	month = parseInt(document.getElementById("changeMonth").value);
	show();
}

function changeYear() {
	year = parseInt(document.getElementById("changeYear").value);
	show();
}