var dashboard = document.getElementById("dashboard");
console.log(dashboard);
var about = document.getElementById("about");
console.log(about);
var users = document.getElementById("users");
var informatives = document.getElementById("informatives");
var images = document.getElementById("images");
var links = document.getElementById("links");

var url = window.location.pathname;
console.log(url);

if(url == '/pet/dashboard') {
	dashboard.classList.add('link_active');
} else if (url == '/pet/dashboard/about') {
	about.classList.add('link_active');
} else if (url == '/pet/dashboard/users') {
	users.classList.add('link_active');
} else if (url == '/pet/dashboard/informatives') {
	informatives.classList.add('link_active');
} else if (url == '/pet/dashboard/images') {
	images.classList.add('link_active');
} else if (url == '/pet/dashboard/links') {
	links.classList.add('link_active');
}