// create Fireteam module
var fireteamApp = angular.module('fireteamApp', ['ngRoute']);

// configure routes
fireteamApp.config(function($routeProvider) {
	$routeProvider

	// route for the home page
	.when('/', {
		templateUrl	:	'partials/home.phtml',
		controller	:	'mainController'
	})

	// route for the about page
	.when('/about', {
		templateUrl	:	'partials/about.phtml',
		controller	:	'aboutController'
	})

	// route for the contact page
	.when('/contact', {
		templateUrl	:	'partials/contact.phtml',
		controller	:	'contactController'
	})
});

// create controller and inject Angular's $scope
fireteamApp.controller('mainController', function($scope) {

	// create a message to display in the view
	$scope.message = 'Everyone come and see my new fireteam website';
});

fireteamApp.controller('aboutController', function($scope) {
	$scope.message = 'About the fireteam website';
});

fireteamApp.controller('contactController', function($scope) {
	$scope.message = 'Contact the owner of the fireteam website';
});