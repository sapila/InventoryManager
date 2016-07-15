<?php include 'header.php';?>
<?php include 'dbConnection.php';?>
<?php include 'menu.php';?>
<head>
<link rel="stylesheet" href="css/stepStyle.css">
	  <link href="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.0/css/bootstrap.min.css" rel="stylesheet">
<script src="js/jquery1.11.js"></script>
<script src="js/angular.min.js"></script>
<script src="js/inventoryOrder.js"></script>

</head>

<script>

</script>

<div class="container" ng-app="inventoryOrder" ng-controller="inventoryOrderController">
	<div class="row">
		<section>
        <div class="wizard">
            <div class="wizard-inner">
                <div class="connecting-line"></div>
                <ul class="nav nav-tabs" role="tablist">

                    <li role="presentation" class="active">
                        <a href="#step1" data-toggle="tab" aria-controls="step1" role="tab" title="Step 1">
                            <span class="round-tab">
                                <i class="glyphicon glyphicon-folder-open"></i>
                            </span>
                        </a>
                    </li>

                    <li role="presentation" class="disabled">
                        <a href="#step2" data-toggle="tab" aria-controls="step2" role="tab" title="Step 2">
                            <span class="round-tab">
                                <i class="glyphicon glyphicon-pencil"></i>
                            </span>
                        </a>
                    </li>
                    <li role="presentation" class="disabled">
                        <a href="#step3" data-toggle="tab" aria-controls="step3" role="tab" title="Step 3">
                            <span class="round-tab">
                                <i class="glyphicon glyphicon-picture"></i>
                            </span>
                        </a>
                    </li>

                    <li role="presentation" class="disabled">
                        <a href="#complete" data-toggle="tab" aria-controls="complete" role="tab" title="Complete">
                            <span class="round-tab">
                                <i class="glyphicon glyphicon-ok"></i>
                            </span>
                        </a>
                    </li>
                </ul>
            </div>

            <form role="form">
                <div class="tab-content">
<!-- Step 1 -->
                    <div class="tab-pane active" role="tabpanel" id="step1">
                        <div class="buttonList" ng-click="categorySelection(category.id)" ng-repeat="category in categories">

                         {{category.name}}
                        </div>

                    </div>
<!-- Step 2 -->
                    <div class="tab-pane" role="tabpanel" id="step2">
                        <div class="productList"  ng-repeat="product in products">
                        <div class="row">
	                        <div class="col-xs-6">
	                         {{product.name}}
	                        </div>
	                        <div class="col-xs-6">
														<div ng-show=isOnlyBox(product)>
		                        	Κουτιά</br>
		                         	<button ng-click="decreaseProductBox($index)" ><i class="glyphicon glyphicon-minus"></i></button>
		                         	<input min=0.0 type="number" style="width:50px;" ng-model="product.boxcount"/>
		                         	<button ng-click="increaseProductBox($index)" ><i class="glyphicon glyphicon-plus"></i></button>
		                         	</br>
														</div>
														<div ng-show=isOnlyItem(product)>
		                         	</br>
		                         	Τεμάχια</br>
		                         	<button ng-click="decreaseProductItem($index)" ><i class="glyphicon glyphicon-minus"></i></button>
		                         	<input type="number" style="width:50px;" ng-model="product.itemcount"/>
		                         	<button ng-click="increaseProductItem($index)" ><i class="glyphicon glyphicon-plus"></i></button>
		                        </div>
												  </div>
	                        </div>
                        </div>

                        <ul class="list-inline pull-right">
                            <li><button type="button" class="btn btn-default prev-step">Previous</button></li>
                            <li><button ng-click="gotoStep3()" type="button" class="btn btn-primary">Καταχώρηση</button></li>
                        </ul>
                    </div>
<!-- Step 3 -->
                    <div class="tab-pane" role="tabpanel" id="step3">
                        <div class="productList"  ng-repeat="product in productOrder">
                        <div class="row">
                            <div class="col-xs-6">
                             <strong>{{product.product_name}} <br>
                             		 boxes: {{product.boxcount}} <span style="padding-left:20px;"></span> items: {{product.itemcount}}</strong>
                            </div>
                        </div>
                        </div>
                        <br>
                        <button ng-click="gotoStep1()" class="btn btn-default">Add more items <i class="glyphicon glyphicon-plus"></i></button>

                        <ul class="list-inline pull-right">
                            <li><button ng-click="submitOrder()" type="button" class="btn btn-primary btn-info-full ">Καταχώρηση Παραγγελείας Αποθήκης</button></li>
                        </ul>
                    </div>
<!-- Step 4 -->
                    <div class="tab-pane" role="tabpanel" id="complete">
                    	<div class="container text-center">

	                        <i style="font-size: 30px;color:{{resultSubmitIconColor}};" class="{{resultSubmitIcon}}"></i>
	                        <p>{{submitResultMessage}}</p>

                        </div>
                    </div>
                </div>
            </form>
        </div>
    </section>
   </div>
</div>
<script type="text/javascript">
$(document).ready(function () {
    //Initialize tooltips
    $('.nav-tabs > li a[title]').tooltip();

    //Wizard
    $('a[data-toggle="tab"]').on('show.bs.tab', function (e) {

        var $target = $(e.target);

        if ($target.parent().hasClass('disabled')) {
            return false;
        }
    });

    $(".next-step").click(function (e) {

        var $active = $('.wizard .nav-tabs li.active');
        $active.next().removeClass('disabled');
        nextTab($active);

    });
    $(".prev-step").click(function (e) {

        var $active = $('.wizard .nav-tabs li.active');
        prevTab($active);

    });
});

function nextTab(elem) {
    $(elem).next().find('a[data-toggle="tab"]').click();
}
function prevTab(elem) {
    $(elem).prev().find('a[data-toggle="tab"]').click();
}
</script>


<?php include 'footer.php';?>
