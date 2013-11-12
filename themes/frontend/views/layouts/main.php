<!DOCTYPE html>
<html lang="en">
	
	<head>
		<title><?php echo Yii::app()->name;?></title>
		<?php Yii::app()->clientScript->registerCoreScript('jquery');?>
		<meta name="viewport" content="width=device-width, initial-scale=1.0">
		<meta charset="utf-8">
		<link rel="stylesheet" href="<?php echo baseTheme();?>/assets/bootstrap.css" media="screen">
		<link rel="stylesheet" href="<?php echo baseTheme();?>/assets/bower_components/font-awesome/css/font-awesome.min.css">
		<link rel="stylesheet" href="<?php echo baseTheme();?>/assets/assets/css/bootswatch.min.css">
		<link rel="stylesheet" href="<?php echo baseTheme();?>/css/main.css" media="screen">
		<script type="text/javascript">

			
		</script>
	</head>
	<body>
		
		<div class="navbar navbar-default navbar-fixed-top">
			<div class="container">
				<div class="navbar-header">
					<a href="javascript:void(0)" class="navbar-brand">TECHNICAL<color class="colorRed">::</color>SOLUTION</a>
					<button class="navbar-toggle" type="button" data-toggle="collapse" data-target="#navbar-main">
					<span class="icon-bar"></span>
					<span class="icon-bar"></span>
					<span class="icon-bar"></span>
					</button>
				</div>
				<div class="navbar-collapse collapse" id="navbar-main">
					<ul class="nav navbar-nav">
						<li class="dropdown">
							<a class="dropdown-toggle" data-toggle="dropdown" href="#" id="themes">Categories <span class="caret"></span></a>
							<ul class="dropdown-menu" aria-labelledby="themes">
								<li><a tabindex="-1" href="../default/index.html">Default</a></li>
								<li class="divider"></li>
								<li><a tabindex="-1" href="../amelia/index.html">Amelia</a></li>
								<li><a tabindex="-1" href="../cerulean/index.html">Cerulean</a></li>
								<li><a tabindex="-1" href="../cosmo/index.html">Cosmo</a></li>
								<li><a tabindex="-1" href="../cyborg/index.html">Cyborg</a></li>
								<li><a tabindex="-1" href="../flatly/index.html">Flatly</a></li>
								<li><a tabindex="-1" href="index.html">Journal</a></li>
								<li><a tabindex="-1" href="../readable/index.html">Readable</a></li>
								<li><a tabindex="-1" href="../simplex/index.html">Simplex</a></li>
								<li><a tabindex="-1" href="../slate/index.html">Slate</a></li>
								<li><a tabindex="-1" href="../spacelab/index.html">Spacelab</a></li>
								<li><a tabindex="-1" href="../united/index.html">United</a></li>
							</ul>
						</li>
						<li>
							<a href="../help/index.html">Profile</a>
						</li>
						<li>
							<a href="http://news.bootswatch.com/">Portfolio</a>
						</li>
						
					</ul>
					<form class="navbar-form navbar-left">
						<input type="text" class="form-control col-lg-8" placeholder="Search">
					</form>
					<!--<ul class="nav navbar-nav navbar-right">
						
					</ul>-->
				</div>
			</div>
		</div>
		<div class="container">
			<div class="page-header" id="banner">
				<div class="row">
					<div class="col-lg-6">
						<h1>Journal</h1>
						<p class="lead">Crisp like a new sheet of paper</p>
					</div>
					<div class="col-lg-6">
						<div class="bsa well">
							<div id="bsap_1277971" class="bsarocks bsap_c466df00a3cd5ee8568b5c4983b6bb19"></div>
						</div>
					</div>
				</div>
			</div>
			
			<?php echo $content;?>
			<footer>
				<div class="row">
					<div class="col-lg-12">
						<ul class="list-unstyled">
							<li class="pull-right"><a href="#top">Back to top</a></li>
							<li><a href="http://news.bootswatch.com/" >Categories</a></li>
							<li><a href="http://feeds.feedburner.com/bootswatch">Profile</a></li>
							<li><a href="https://twitter.com/thomashpark">Portfolio</a></li>
						</ul>
						<p>Made by <a href="http://thomaspark.me/">Phan Thinh</a>. Contact him at <a href="mailto:quocthinh9889@gmail.com">quocthinh9889@gmail.com</a>.</p>
						<p>Based on <a href="http://getbootstrap.com/">Bootstrap</a>. Icons from <a href="http://fortawesome.github.io/Font-Awesome/">Font Awesome</a>.
						Web fonts from <a href="http://www.google.com/webfonts">Google</a>. </p>
					</div>
				</div>
			</footer>
		</div>
		
		<script src="<?php echo baseTheme();?>/assets/bower_components/bootstrap/dist/js/bootstrap.min.js"></script>
		<script src="<?php echo baseTheme();?>/assets/assets/js/bootswatch.js"></script>
	</body>
	
</html>