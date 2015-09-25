$('.datepicker').pickadate({
	selectMonths: true, // Creates a dropdown to control month
	selectYears: 15 // Creates a dropdown of 15 years to control year
});

$(document).ready(function () {
	$('select').material_select();
});

var slider = document.getElementById('test52');
noUiSlider.create(slider, {
	start: [20, 80],
	connect: true,
	step: 1,
	range: {
		'min': 0,
		'max': 100
	},
	format: wNumb({
		decimals: 0
	})
});

//sidemenu
$('.button-collapse').sideNav({
	menuWidth: 300, // Default is 240
	edge: 'right', // Choose the horizontal origin
	closeOnClick: true // Closes side-nav on <a> clicks, useful for Angular/Meteor
});