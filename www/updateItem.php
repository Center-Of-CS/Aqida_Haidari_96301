
<?php include('include/head.php');?>
</head>
<?php  
    include("../lib/crud.php");
    
    $db = new CRUD();
    $name = $quantity= $price= $date="";
    $nameErr = $quantityErr = $priceErr= $dateErr="";   
    $id = (int) $_GET['updateID'];
    $result = $db->select_one("items","id='$id'");
    $name = $result['name'];
    $quantity = $result['quantity'];
    $price = $result['price'];
    $date = $result['date'];
    if(isset($_POST['submit'])){
        if(empty($_POST['name'])){
            $nameErr = "name can not be empty";	
        }else{
            $name = cleanData($_POST['name']);
        }
        if(empty($_POST['quantity'])){
            $qunatityErr = "quantity can not be empty";	
        }else{
            $quantity = cleanData($_POST['quantity']);
        }
        if(empty($_POST['price'])){
            $priceErr = "price can not be empty";	
        }else{
            $price = cleanData($_POST['price']);
        }
        if(empty($_POST['date'])){
            $dateErr = "date can not be empty";	
        }else{
            $date = cleanData($_POST['date']);
        }
    
        if(empty($nameErr) && empty($quantityErr) && empty($priceErr) && empty($dateErr)){
            $data = sprintf("name='%s
            ',quantity='%d',price='%d',date='%s'",
                mysqli_real_escape_string($GLOBALS["DB"],$name),
                mysqli_real_escape_string($GLOBALS["DB"],$quantity),
                mysqli_real_escape_string($GLOBALS["DB"],$price),
                mysqli_real_escape_string($GLOBALS["DB"],$date)
            );
            $update = $db->update("items",$data,"id='$id'");
            if($update){
                header("location:list_of_items.php?update=1");
            }else{
                echo "Failed update";
            } 
            
        }else{
            echo "Failed";
        }
    }
    function cleanData($data){
        $data = trim($data);
        $data = htmlSpecialChars($data);
        $data = stripslashes($data);
        return $data;
    }
?>
<body>
    <!--[if lt IE 8]>
		<p class="browserupgrade">You are using an <strong>outdated</strong> browser. Please <a href="http://browsehappy.com/">upgrade your browser</a> to improve your experience.</p>
	<![endif]-->
    <!-- Start Left menu area -->
    <?php include('include/sidebar.php');?>
    <!-- End Left menu area -->
    <!-- Start Welcome area -->
    <div class="all-content-wrapper" >
        <?php include('include/header.php');?>
        <div style="width: 40%;margin: auto;">
            <div class="basic-form-area mg-b-15">
                <div class="container-fluid">
                    <div class="row">
                        <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                            <div class="sparkline12-list">
                                <div class="sparkline12-hd">
                                    <div class="main-sparkline12-hd">
                                        <h1> Update Item</h1>
                                    </div>
                                </div>
                                <div class="sparkline12-graph">
                                    <div class="basic-login-form-ad">
                                        <div class="row">
                                            <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                                                <div class="all-form-element-inner">
                                                    <form action=" <?php $_SERVER['PHP_SELF'];?>" method="post" enctype="multipart/form-data">
                                                        <div class="form-group-inner">
                                                            <div class="row">
                                                                <div class="col-lg-3 col-md-3 col-sm-3 col-xs-12">
                                                                    <label for=""  class="login2 pull-right pull-right-pro">Name</label>
                                                                </div>
                                                                <div class="col-lg-9 col-md-9 col-sm-9 col-xs-12">
                                                                    <input type="text" class="form-control" name="name" value="<?php echo $name;?>" id=""  />
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <div class="form-group-inner">
                                                            <div class="row">
                                                                <div class="col-lg-3 col-md-3 col-sm-3 col-xs-12">
                                                                    <label for="type"  class="login2 pull-right pull-right-pro">Quantity</label>
                                                                </div>
                                                                <div class="col-lg-9 col-md-9 col-sm-9 col-xs-12">
                                                                    <input type="text" class="form-control" name="quantity" id=""  value="<?php echo $quantity?>" />
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <div class="form-group-inner">
                                                            <div class="row">
                                                                <div class="col-lg-3 col-md-3 col-sm-3 col-xs-12">
                                                                    <label for="price"  class="login2 pull-right pull-right-pro">Price</label>
                                                                </div>
                                                                <div class="col-lg-9 col-md-9 col-sm-9 col-xs-12">
                                                                    <input type="text" class="form-control" name="price" id="price" value="<?php echo $price?>" />
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <div class="form-group-inner">
                                                            <div class="row">
                                                                <div class="col-lg-3 col-md-3 col-sm-3 col-xs-12">
                                                                    <label for="details"  class="login2 pull-right pull-right-pro">Date</label>
                                                                </div>
                                                                <div class="col-lg-9 col-md-9 col-sm-9 col-xs-12">
                                                                    <textarea class="form-control" name="date" id="" ><?php echo $date?></textarea>
                                                                </div>
                                                            </div>
                                                        </div>
                                                        
                                                        <div class="form-group-inner">
                                                            <div class="login-btn-inner">
                                                                <div class="row">
                                                                    <div class="col-lg-3"></div>
                                                                    <div class="col-lg-9">
                                                                        <div class="login-horizental cancel-wp pull-left form-bc-ele">
                                                                            <input class="btn btn-sm btn-primary login-submit-cs" type="submit" name="submit" value="Submit">
                                                                            <a class="btn btn-sm btn-primary login-submit-cs" href="list_of_items.php">cancel</a>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </form>     
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <?php include('include/footer.php');?>
    <!-- jquery
		============================================ -->
    <script src="js/vendor/jquery-1.12.4.min.js"></script>
    <!-- bootstrap JS
		============================================ -->
    <script src="js/bootstrap.min.js"></script>
    <!-- wow JS
		============================================ -->
    <script src="js/wow.min.js"></script>
    <!-- price-slider JS
		============================================ -->
    <script src="js/jquery-price-slider.js"></script>
    <!-- meanmenu JS
		============================================ -->
    <script src="js/jquery.meanmenu.js"></script>
    <!-- owl.carousel JS
		============================================ -->
    <script src="js/owl.carousel.min.js"></script>
    <!-- sticky JS
		============================================ -->
    <script src="js/jquery.sticky.js"></script>
    <!-- scrollUp JS
		============================================ -->
    <script src="js/jquery.scrollUp.min.js"></script>
    <!-- counterup JS
		============================================ -->
    <script src="js/counterup/jquery.counterup.min.js"></script>
    <script src="js/counterup/waypoints.min.js"></script>
    <script src="js/counterup/counterup-active.js"></script>
    <!-- mCustomScrollbar JS
		============================================ -->
    <script src="js/scrollbar/jquery.mCustomScrollbar.concat.min.js"></script>
    <script src="js/scrollbar/mCustomScrollbar-active.js"></script>
    <!-- metisMenu JS
		============================================ -->
    <script src="js/metisMenu/metisMenu.min.js"></script>
    <script src="js/metisMenu/metisMenu-active.js"></script>
    <!-- morrisjs JS
		============================================ -->
    <script src="js/morrisjs/raphael-min.js"></script>
    <script src="js/morrisjs/morris.js"></script>
    <script src="js/morrisjs/morris-active.js"></script>
    <!-- morrisjs JS
		============================================ -->
    <script src="js/sparkline/jquery.sparkline.min.js"></script>
    <script src="js/sparkline/jquery.charts-sparkline.js"></script>
    <script src="js/sparkline/sparkline-active.js"></script>
    <!-- calendar JS
		============================================ -->
    <script src="js/calendar/moment.min.js"></script>
    <script src="js/calendar/fullcalendar.min.js"></script>
    <script src="js/calendar/fullcalendar-active.js"></script>
    <!-- plugins JS
		============================================ -->
    <script src="js/plugins.js"></script>
    <!-- main JS
		============================================ -->
    <script src="js/main.js"></script>
    <!-- tawk chat JS
		============================================ -->
    <script src="js/tawk-chat.js"></script>
</body>

</html>