myApp = angular.module('myAgenda',[], function($interpolateProvider) {
        $interpolateProvider.startSymbol('<%');
        $interpolateProvider.endSymbol('%>');
    });

myApp.controller('loginController', function($scope,$http)
{
	
	$scope.checkCredentials = function()
	{
		if($scope.validateFields() == true){
			$http({
				method: 'POST',
				url: 'http://localhost:8000/magenna/contacts',
				headers: {'Content-Type': 'application/json'},
				params: {service:'login','username':$scope.username,'password':$scope.password}
			}).success(function(data, status, headers, config) {
				console.log(data.username.validation);
			}).error(function(data, status, headers, config) {
				// called asynchronously if an error occurs
				// or server returns response with an error status.
			});
		}
	}
	
	$scope.validateFields = function()
	{
		return true;
	}
	
});

myApp.controller('dashboardController', function($scope,$http)
{
	
	$scope.activateContacts = function()
	{	
		$scope.getContacts();
	}
	
	$scope.addContact = function()
	{
		$http({
			method: 'POST',
			url: '/magenna/contacts',
			headers: {'Content-Type': 'application/json'},
			params: {'_token': $scope.token, 'name' :$scope.name, 'phone': $scope.phone, 
						'email': $scope.email, 'favorite': $scope.favorite }
		}).success(function(data, status, headers, config) {			
			$scope.contacts = data;
			$('#modalCreate').modal('hide');
			$scope.formCreate.$setPristine();			
		}).error(function(data, status, headers, config) {
			// called asynchronously if an error occurs
			// or server returns response with an error status.
		});	
	}
	
	$scope.loadData = function($index)
	{
		$contact = $scope.contacts[$index];		
		$scope.editName = $contact['name'];
		$scope.editPhone = $contact['phone'];
		$scope.editEmail = $contact['email'];
		$scope.id = $contact['id'];

	}
	
	$scope.editContact = function()
	{
		$http({
			method: 'PUT',
			url: '/magenna/contacts/'+$scope.id,
			headers: {'Content-Type': 'application/json'},
			params: {'_token': $scope.token, 'name' :$scope.editName, 'phone': $scope.editPhone, 
						'email': $scope.editEmail }
		}).success(function(data, status, headers, config) {			
			$scope.contacts = data;
			$('#modalEdit').modal('hide');
			$scope.formCreate.$setPristine();			
		}).error(function(data, status, headers, config) {
			// called asynchronously if an error occurs
			// or server returns response with an error status.
		});	
	}
	
	$scope.getContacts = function()
	{
		$http({
			method: 'GET',
			url: '/magenna/selectContacts',
			headers: {'Content-Type': 'application/json'},
			params: {}
		}).success(function(data, status, headers, config) {
			$scope.contacts = data;
		}).error(function(data, status, headers, config) {
			// called asynchronously if an error occurs
			// or server returns response with an error status.
		});
	}
	
	$scope.formatTime = function(utcDate) { return moment(utcDate).format("MMddYYYY"); }
	
	$scope.getContacts();
	
});
