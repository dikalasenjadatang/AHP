<!DOCTYPE html>
<html lang="en">
<head>
    <title>Contoh Aplikasi SPK Metode AHP (Analytic Hierarchy Process)</title>
    <meta name="description" content="" />
    <meta name="keywords" content="" />
    <meta charset="utf-8">
    <link rel="stylesheet" href="css/reset.css" type="text/css" media="screen">
    <link rel="stylesheet" href="css/style.css" type="text/css" media="screen">
    <link rel="stylesheet" href="css/grid.css" type="text/css" media="screen">   
    <link rel="stylesheet" href="css/bootstrap.css" type="text/css" media="screen">   
    <script src="js/jquery-1.6.2.min.js" type="text/javascript"></script>     
	<!--[if lt IE 7]>
        <div style=' clear: both; text-align:center; position: relative;'>
            <a href="http://www.microsoft.com/windows/internet-explorer/default.aspx?ocid=ie6_countdown_bannercode"><img src="http://storage.ie6countdown.com/assets/100/images/banners/warning_bar_0000_us.jpg" border="0"  alt="" /></a>
        </div>
	<![endif]-->
    <!--[if lt IE 9]>
   		<script type="text/javascript" src="js/html5.js"></script>
        <link rel="stylesheet" href="css/ie.css" type="text/css" media="screen">
	<![endif]-->
</head>
<body id="page2">
	<!--==============================header=================================-->
	<?php include 'header.php'; ?>
<!-- content -->
    <section id="content">
        <div class="bg-top">
        	<div class="bg-top-2">
                <div class="bg">
                    <div class="bg-top-shadow">
                        <div class="main">
                            <div class="box p3">
                                <div class="padding">
                                    <div class="container_12">
                                        <div class="wrapper">
                                            <div class="grid_12">
                                                <div class="wrapper">
                                                    <article class="grid_4 alpha">
                                                        <div class="indent">
                                                            <?php include 'sidebar.php';?>
															
                                                        </div>
                                                    </article>
                                                    <article class="grid_8 omega">
                                                        <div class="indent-right">
                                                            <?php eval($CONTENT_["main"]);?>
                                                    </article>
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
        
    </section>
    
	<!--==============================footer=================================-->
	<?php include 'footer.php';?>
</body>
</html>
