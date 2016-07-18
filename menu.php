<nav class="navbar navbar-inverse navbar-fixed-top">
      <div class="container">
        <div class="navbar-header">
          <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#navbar" aria-expanded="false" aria-controls="navbar">
            <span class="sr-only">Toggle navigation</span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
          </button>
          <a class="navbar-brand" href="index.php">InventoryManager</a>
        </div>
        <div id="navbar" class="collapse navbar-collapse">
          <ul class="nav navbar-nav">
            <li class="active"><a href="index.php">Home</a></li>
            <li class="dropdown">
                <a class="dropdown-toggle" data-toggle="dropdown" href="#">Ιστορικό<span class="caret"></span></a>
                <ul class="dropdown-menu">
                    <li><a href="clientHistory.php">Ανα Πελατη</a></li>
                    <li><a href="opencloseHistory.php">Ανοιγμα/Κλεισιμο</a></li>
                    <li><a href="inventoryOrderHistory.php">Ιστορικό Αποθήκης</a></li>
                </ul>
             </li>

             <li class="dropdown">
                <a class="dropdown-toggle" data-toggle="dropdown" href="#">Διαχείρηση <span class="caret"></span></a>
                <ul class="dropdown-menu">
                    <li><a href="clients.php">Πελατών</a></li>
                    <li><a href="products.php">Προιόντων</a></li>
                    <li><a href="categories.php">Κατηγοριών Προιόντων</a></li>
                </ul>
             </li>
          </ul>
        </div><!--/.nav-collapse -->
      </div>
    </nav>
