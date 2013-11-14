var App = angular.module('ng');

;(function($, scope){
	scope['Common'] = {
		init : function(){
			
		},
		Event:{
		},
		obj:{
			
		},
		data:{
			categories: []
		}
	}
})(jQuery, main);
App.filter('cut', function () {
	return function (value, wordwise, max, tail) {
		if (!value) return '';

		max = parseInt(max, 10);
		if (!max) return value;
		if (value.length <= max) return value;

		value = value.substr(0, max);
		if (wordwise) {
			var lastspace = value.lastIndexOf(' ');
			if (lastspace != -1) {
				value = value.substr(0, lastspace);
			}
		}

		return value + (tail || ' …');
	};
});

App.directive('menuCategories', function () {
    return {
        restrict: 'AE',
        templateUrl: main.templateURL+'/template/components/menu-header.html',
        link: function (scope, iterStartElement, attr) {
			
			$.get(main.templateURL+"/api/categories",function(res){
				if(res.error){
					scope.categories = [];
				}else{
					scope.$apply(function () {
						scope.categories = res.data;
					});
				}
				
				
				
			});
        }
    };
});


App.controller('Skills', ['$scope', '$filter', function ($scope, $filter, Typekit) {
    $scope.loadData = function () {
        
		$.get(main.templateURL+"/api/categories",{page:$scope.page,per_page:$scope.per_page},function(res){
			
			if(res.error){
				$scope.more = false;
				$scope.categories = [];
				console.log(1);
			}else{
				$scope.more = res.data.length === $scope.per_page;
				$scope.categories = $scope.categories.concat(res.data);
				console.log(2);
			}

		});

    }
    $scope.show_more = function () {
        $scope.page += 1;
        $scope.loadData();
    }
    $scope.has_more = function () {
        return $scope.more;
    }

    $scope.per_page = 6;
    $scope.page = 1;
    $scope.categories = [];
    $scope.more = true;
    $scope.loadData();
	
}]);


