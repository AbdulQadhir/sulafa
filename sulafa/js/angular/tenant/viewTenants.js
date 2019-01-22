app.controller('viewTenantCntrl', function($scope, $http) {
	$scope.title = "SulafaApp";
	
	$scope.loadTenants = function(_id_department){
	$http({
		  method  : 'POST',
		  data	  : $.param({}),
		  url     : 'controller/getTenants.php',
		  headers : { 'Content-Type': 'application/x-www-form-urlencoded' }
	}).then(function mySucces(response) {
        $scope.tenants = response.data.tenants;
    }, function myError(response) {
        $scope.tenants  = response.statusText;
    });
	}
});

