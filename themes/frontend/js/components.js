var angular = angular.module('ng');


angular.directive('menuCategories', function () {
    return {
        restrict: 'A',
        templateUrl: main.templateURL+'/template/components/menu-header.html',
        link: function (scope, iterStartElement, attr) {
			
			$.get(main.templateURL+"/api/categories",function(res){
				console.log(res.data);
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