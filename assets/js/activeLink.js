var dashboard = document.getElementById("dashboard");
var about = document.getElementById("about");
var users = document.getElementById("users");
var informatives = document.getElementById("informatives");
var images = document.getElementById("images");
var links = document.getElementById("links");

var url = window.location.pathname;

//var splitUrl = url.split("/");
//console.log(splitUrl[1]);
//console.log(url);

if(url.indexOf("home") > -1) {
	dashboard.classList.add('link_active');
} else if (url.indexOf("about") > -1) {
	about.classList.add('link_active');
} else if (url.indexOf("users") > -1) {
	users.classList.add('link_active');
} else if (url.indexOf("informatives") > -1) {
	informatives.classList.add('link_active');
} else if (url.indexOf("images") > -1) {
	images.classList.add('link_active');
} else if (url.indexOf("links") > -1) {
	links.classList.add('link_active');
}

/*

if(url == '/' + splitUrl[1] + '/dashboard') {
	dashboard.classList.add('link_active');
} else if (url == '/' + splitUrl[1] + '/dashboard/about' ) {
	about.classList.add('link_active');
} else if (url == '/' + splitUrl[1] + '/dashboard/users') {
	users.classList.add('link_active');
} else if (url == '/' + splitUrl[1] + '/dashboard/informatives') {
	informatives.classList.add('link_active');
} else if (url == '/' + splitUrl[1] + '/dashboard/images') {
	images.classList.add('link_active');
} else if (url == '/' + splitUrl[1] + '/dashboard/links') {
	links.classList.add('link_active');
}

*/