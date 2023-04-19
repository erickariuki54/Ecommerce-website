<?php 
include_once "./include/session.php";
?>
<style>
    
  /*bring the text forward*/
  .navbar {
    z-index: 999;/*to bring forward the text instead of the back */ 
  }
    
</style>
<div class="container-fluid">
        <div class="row">
            <div class="nav">
                  
                <nav class="navbar navbar-expand-lg navbar-light bg-light position-fixed" style="width: 100%;">
                    <button data-toggle="collapse" data-target="#side"><i class="fas fa-dice-three    "></i>
  
                    </button>
                    <a class="navbar-brand" style="color:blue; font-size:30px;">Royal Technologies</a>
                    <button class="navbar-toggler" data-target="#my-nav" data-toggle="collapse" aria-controls="my-nav" aria-expanded="false" aria-label="Toggle navigation">
                        <span class="navbar-toggler-icon"></span>
                    </button>
                    <div id="my-nav" class="collapse navbar-collapse ">
                        <ul class="navbar-nav mr-auto mx-auto">
                            <li class="nav-item active">
                                <a class="nav-link" href="./index.php"><i class="fa fa-home" aria-hidden="true"></i> Home <span class="sr-only">(current)</span></a>
                            </li>
                            <li class="nav-item dropdown">
                                <a class="nav-link dropdown-toggle" data-toggle="dropdown" href="#" role="button" aria-haspopup="true" aria-expanded="false" style="color: black;"><i class="fa fa-book" aria-hidden="true"></i> categories</a>
                                <div class="dropdown-menu">
                                    <a class="dropdown-item" href="./index.php?#phones"><i class="fa fa-phone" aria-hidden="true"></i> Phones</a>
                                    <a class="dropdown-item" href="./index.php?#laptops"><i class="fa fa-laptop" aria-hidden="true"></i> laptops</a>
                                    <div class="dropdown-divider"></div>
                                    <a class="dropdown-item" href="#tab4Id"> accessories</a>
                                </div>
                            </li>
                            <li class="nav-item active">
                                <a class="nav-link" href="./login.php"><?php loginchecker() ?></a>
                            </li>
                            <li class="nav-item active">
                              <a class="nav-link" href="./cart.php">
                                <i class="fa fa-cart-plus" aria-hidden="true"></i>
                                cart
                                <div class="badge badge-warning cart-badge">0</div>
                              </a>
                            </li>
                            
  
                        </ul>
                        <form class="form-inline my-2 my-lg-0 mx-auto">
                          <input class="form-control mr-sm-2" type="search" placeholder="Search" aria-label="Search" name="search" id="search">
                          
                          <button class="btn btn-outline-success my-2 my-sm-0" type="submit">Search</button>
                        </form>


                    </div>
                </nav>
        </div>
        <div class="row">
            <div class="col-sm-2 collapse show"id="side" style="top: 71px;margin-right:40px;" >
              <div class="navbar navbar-dark position-fixed bg-light"  >
                  <ul class="navbar-nav" style="height: 600px;">
                      <li class="nav-item" style="color: grey;">categories</li>
                      <li class="nav-item"><a href="#"><i class="fa fa-phone" aria-hidden="true"></i> Phones</a></li>
                      <li class="nav-item"><a href="#"> <i class="fa fa-laptop" aria-hidden="true"></i> laptops</a></li>
                      <li class="nav-item"><a href="#"><i class="fas fa-toolbox    "></i> accessories</a></li>
                      <li><div class="dropdown-menu" aria-labelledby="searchResults" id="searchResults"></div></li>
                      
                  </ul>
              </div>
            </div>

<!--add funtionality to the search button-->
<script src="./assets/frameworks/node_modules/jquery/dist/jquery.min.js"></script>
<script src="../assets/js/cart.js"></script>

<script>
  $(document).ready(function() {
  $('#search').keyup(function() {
    var query = $(this).val();
    if (query != '') {
      $.ajax({
        url: 'redirect.php',
        method: 'POST',
        data: {query:query},
        success: function(data) {
          $('#searchResults').html(data);/*target */
          $('#searchResults').show();
        }
      });
    } else {
      $('#searchResults').hide();
    }
  });
});

</script>







              