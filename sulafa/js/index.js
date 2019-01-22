
var app = angular.module("sulafaApp", ["ngRoute"]);

app.config(function($routeProvider) {
    $routeProvider
    .when("/", {
        controller: 'blankCtrl',
        templateUrl : "view/blank.html"
    })
    .when("/tenants", {
        controller: 'viewTenantCntrl',
        templateUrl : "view/tenant/viewTenants.html"
    })
});

app.controller('sulafaCtrl', function($scope,sharedService,$rootScope) {
    $rootScope.title = "App";
});

app.service("sharedService", function() {
    this.data = "App";

    this.activateMenu = function(menu,$rootScope)
    {
        $rootScope.activemenu_students = "";
        $rootScope.activemenu_teachers = "";
        $rootScope.activemenu_classes = "";
        $rootScope.activemenu_fees = "";
        if(menu=="students")
            $rootScope.activemenu_students = "active";
        if(menu=="teachers")
            $rootScope.activemenu_teachers = "active";
        if(menu=="classes")
            $rootScope.activemenu_classes = "active";
        if(menu=="fees")
            $rootScope.activemenu_fees = "active";
    }

});





