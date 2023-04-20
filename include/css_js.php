<?php //the css for modules instead of manually editing on each site
 function framework_css(){?>
<link rel="stylesheet" href="./assets/frameworks/node_modules/bootstrap/dist/css/bootstrap.min.css">
<link rel="stylesheet" href="./assets/frameworks/node_modules/@fortawesome/fontawesome-free/css/all.min.css">
<!--owl carousel css-->
<link rel="stylesheet" href="./assets/frameworks/node_modules/owl.carousel/dist/assets/owl.carousel.min.css">
<?php } ?>
<?php 
//the js for modules
function framework_js(){?>
<script src="./assets/frameworks/node_modules/jquery/dist/jquery.min.js"></script>
<script src="./assets/frameworks/node_modules/popper.js/dist/popper.min.js"></script>
<script src="./assets/frameworks/node_modules/bootstrap/dist/js/bootstrap.min.js"></script>
<!--owl carousel js-->
<script src="./assets/frameworks/node_modules/owl.carousel/dist/owl.carousel.min.js"></script>
<?php }?>