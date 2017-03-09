(function(window, google){
	//map option
var options = {

	center: {
		lat: 10.309910,
		lng: 123.893031
	},
	zoom: 15

},
element = document.getElementById('google-map'),
	//map 
	map = new google.maps.Map(element, options);

var marker = new google.maps.Marker({

	position: {
		lat: 10.309910,
		lng: 123.893031
	},
	map: map,
});
}(window, google));

(function(){
setInterval(function(){
	console.log('log log')
},5000)
}());