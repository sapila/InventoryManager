var app = angular.module('clientOrder', [])

app.controller('clientOrderController',function($scope,$http) {

	$scope.productOrder = [];
	$scope.totalPrice = 0;
	$scope.discount = 0;

	$scope.getClients = function(){

		$http.get('api/get/clients.php')
			.then(function(response){

		console.log(JSON.stringify(response));
				$scope.clients = response.data;
			}, function(response){
				console.log(response);
			});

	}

	$scope.search = function(searchterm){
		$http.get('api/get/searchClients.php?search='+searchterm)
			.then(function(response){

		console.log(JSON.stringify(response.data));
				$scope.clients = response.data;
			}, function(response){
				console.log(response);
			});
	}

	$scope.clientSelection = function(id){

	$scope.clientid=id;

		var $active = $('.wizard .nav-tabs li.active');
		        $active.next().removeClass('disabled');
		        nextTab($active);
	}

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
				    response.data[index].allAvailableItems = parseInt(response.data[index].itemreverse)+(parseInt(response.data[index].boxreverse)*parseInt(response.data[index].boxtoitem));
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

		if($scope.products[index].boxreverse>$scope.products[index].boxcount)
			{
				$scope.products[index].boxcount++;
				$scope.products[index].allAvailableItems -= $scope.products[index].boxtoitem ;
			}

	}

	$scope.decreaseProductBox = function(index){

		if($scope.products[index].boxcount > 0)
			{
				$scope.products[index].boxcount--;
				$scope.products[index].allAvailableItems += parseInt($scope.products[index].boxtoitem) ;
			}

	}

	$scope.increaseProductItem = function(index){

		if($scope.products[index].allAvailableItems>$scope.products[index].itemcount)
			{
				$scope.products[index].itemcount++;
			}

	}

	$scope.decreaseProductItem = function(index){

		if($scope.products[index].itemcount > 0)
			$scope.products[index].itemcount--;

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
				// edw that kanw ta mathimatika gia box/item

					var allItems = parseInt($scope.products[index].itemreverse) + ($scope.products[index].boxreverse * $scope.products[index].boxtoitem);
					console.log("all : " + allItems);
					allItems = allItems - ($scope.products[index].itemcount + ($scope.products[index].boxcount * $scope.products[index].boxtoitem));
					console.log("all - ordered : " + allItems);
					var boxes = Math.floor(allItems / $scope.products[index].boxtoitem );
					console.log("all/boxtoitem: " + Math.floor(allItems / $scope.products[index].boxtoitem ));
					var items =  (allItems % $scope.products[index].boxtoitem);

					console.log(allItems +"all     "+boxes + " b    " + items + " i ");

					var productPrice = ($scope.products[index].boxcount * $scope.products[index].boxprice) + ($scope.products[index].itemcount * $scope.products[index].itemprice) ;


				var order = {
					product_id : $scope.products[index].id,
					product_name : $scope.products[index].name,
					boxleft : boxes,
					itemleft : items,
					boxbought : $scope.products[index].boxcount,
					itembought : $scope.products[index].itemcount,
					productPrice : productPrice
				}

				$scope.totalPrice += productPrice ;
				$scope.productOrder.push(order);
			}

		}

		var $active = $('.wizard .nav-tabs li.active');
        $active.next().removeClass('disabled');
        nextTab($active);

	}

	$scope.getTotalPrice = function(){

		var index = 0;
		var sum =0;
		for(index = 0 ; index < $scope.products.length ; index++ )
		{

			sum += $scope.productOrder[index].productPrice;
		}

		return sum;
	}

	$scope.submitOrder = function(){

		console.log("client" + $scope.clientid);
		console.log($scope.productOrder);



		$http.defaults.headers.post['Content-Type'] = 'application/x-www-form-urlencoded; charset=UTF-8';

		$http.post('api/post/submitClientOrder.php',{
														client:$scope.clientid,
														totalprice: $scope.totalPrice,
														discount: $scope.discount,
														order:$scope.productOrder
													} )
		.then(function(response){
			console.log(JSON.stringify(response));

		  		window.location.href = "orderPrint.php?id="+response.data.clientOrderId;

			}, function(response){
				console.log(JSON.stringify(response));
			});


	}

	var init = function () {
	   $scope.getCategories();
	   $scope.getClients();

	};

	init();


})
