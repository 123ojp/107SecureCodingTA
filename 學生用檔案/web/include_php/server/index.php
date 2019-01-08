<?php
	if (!empty($_GET["page"])){
		include($_GET["page"]);
	} else{
		$title = "首頁";
		$text = "一個demo首頁";
	}
?>
<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="utf-8">
<title><?php echo $title;?></title>
<meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1">
<link rel="stylesheet" href="stylesheets/base.css">
<link rel="stylesheet" href="stylesheets/skeleton.css">
<link rel="stylesheet" href="stylesheets/layout.css">
<link rel="stylesheet" href="stylesheets/flexslider.css">
<link rel="stylesheet" href="stylesheets/prettyPhoto.css">
<script src="http://ajax.googleapis.com/ajax/libs/jquery/1.8.0/jquery.min.js"></script>
<script src="js/jquery.flexslider-min.js"></script>
<script src="js/scripts.js"></script>
<script src="js/main.js"></script>
</head>
<body class="wrap">
<header id="header" class="site-header" role="banner">
	<div id="header-inner" class="container sixteen columns over">
		<hgroup class="one-third column alpha">
			<h1 id="site-title" class="site-title"> <a href="/" id="logo"><img src="images/icebrrrg-logo.png" alt="Icebrrrg logo" height="63" width="157" /></a> </h1>
		</hgroup>
		<nav id="main-nav" class="two thirds column omega">
			<ul id="main-nav-menu" class="nav-menu">
				<li id="menu-item-1" > <a href="/">首頁</a> </li>
				<li id="menu-item-2"> <a href="/?page=about.php">關於</a> </li>
				<li id="menu-item-3"> <a href="/?page=info.php">資訊</a> </li>
				<li id="menu-item-3"> <a href="/?page=handsome.php">講師</a> </li>
			</ul>
		</nav>
	</div>
</header>

	<div class="container">



        <article class="ten columns main-content">
        <h1><?php echo $title;?></h1>
				<p><?php echo $text;?></p>
        </article>
        <!-- End main Content -->


    </div>

		<footer>
	
			<div id="footer-base">
				<div class="container">
					<div class="eight columns"> <a href="http://www.opendesigns.org/design/icebrrrg/">Icebrrg Website Template</a> &copy; 2012 </div>
					<div class="eight columns far-edge"> Design by <a href="http://www.opendesigns.org">OD</a> </div>
				</div>
			</div>
		</footer>
		<script src="js/jquery.prettyPhoto.js"></script>
		</body>
		</html>
