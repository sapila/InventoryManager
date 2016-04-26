var app = angular.module('inventoryOrder', [])

app.controller('inventoryOrderController',function($scope,$http) {

	$scope.getCategories = function(){

		$http.get('api/get/categories.php')
			.then(function(response){

				$scope.categories = response.data;
			}, function(response){
				console.log(response);
			});

	}

	$scope.categorySelection = function(id){

		$http.get('api/get/productsByCategoryId.php?id='+id)
		.then(function(response){
				var index = 0 ;
				for (index ; index < response.data.length; ++index) {
				    response.data[index].boxcount = 0 ;
				    response.data[index].itemcount = 0 ;
				}

				$scope.products = response.data ;

				var $active = $('.wizard .nav-tabs li.active');
		        $active.next().removeClass('disabled');
		        nextTab($active);

			}, function(response){
				console.log(response);
			});
	}

	$scope.increaseProductBox = function(index){

		$scope.products[index].boxcount++;

	}

	$scope.decreaseProductBox = function(index){

		if($scope.products[index].boxcount > 0)
			$scope.products[index].boxcount--;

	}

	$scope.increaseProductItem = function(index){

		$scope.products[index].itemcount++;

	}

	$scope.decreaseProductItem = function(index){

		if($scope.products[index].itemcount > 0)
			$scope.products[index].itemcount--;

	}

	var init = function () {
	   $scope.getCategories();
	   $scope.aaa=0;
	};

	init();


})