var app = angular.module('inventoryOrder', [])

app.controller('inventoryOrderController',function($scope,$http) {

	$scope.productOrder = [];

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

	$scope.gotoStep1 = function(index){

		 var $active = $('.wizard .nav-tabs li.active');
        prevTab($active);
         var $active = $('.wizard .nav-tabs li.active');
        prevTab($active);

	}

	$scope.gotoStep3 = function(index){

		var index = 0;
		for(index = 0 ; index < $scope.products.length ; index++ )
		{
			if($scope.products[index].boxcount > 0 || $scope.products[index].itemcount >0)
			{
				var order = {
					product_id : $scope.products[index].id,
					product_name : $scope.products[index].name,
					boxcount : $scope.products[index].boxcount,
					itemcount : $scope.products[index].itemcount
				}

				$scope.productOrder.push(order);
			}

		}

		var $active = $('.wizard .nav-tabs li.active');
        $active.next().removeClass('disabled');
        nextTab($active);

	}

	$scope.isOnlyItem = function(product){
		if(parseInt(product.itemprice) > 0)
		{
			return true;
		}else{
			return false;
		}
	}

	$scope.isOnlyBox = function(product){
		if(parseInt(product.boxprice) > 0 )
		{
			return true;
		}else{
			return false;
		}
	}
	
	$scope.submitOrder = function(){

		$http.defaults.headers.post['Content-Type'] = 'application/x-www-form-urlencoded; charset=UTF-8';

		$http.post('api/post/submitSupplyOrder.php',$scope.productOrder )
		.then(function(response){
				if(response.data.error){
					$scope.resultSubmitIcon = "glyphicon glyphicon-remove";
					$scope.resultSubmitIconColor = "red";
					$scope.submitResultMessage = "Υπηρξε κάποιο πρόβλημα.Ελέγξτε ξανά την παρααγγελία."
				}else{
					$scope.resultSubmitIcon = "glyphicon glyphicon-ok";
					$scope.resultSubmitIconColor = "green";
					$scope.submitResultMessage = "Η παραγγελία αποθήκης ολοκληρώθηκε"
				}

				var $active = $('.wizard .nav-tabs li.active');
		        $active.next().removeClass('disabled');
		        nextTab($active);

			}, function(response){
				console.log(JSON.stringify(response));
			});


	}

	var init = function () {
	   $scope.getCategories();

	};

	init();


})
