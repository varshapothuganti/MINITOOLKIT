<?php

//import the converter class
require('image_converter.php');
if($_FILES){
	$obj = new Image_converter();
	
	//call upload function and send the $_FILES, target folder and input name
	$upload = $obj->upload_image($_FILES, 'uploads', 'fileToUpload');
	if($upload){
		$imageName = urlencode($upload[0]);
		$imageType = urlencode($upload[1]);
		
		if($imageType == 'jpeg'){
			$imageType = 'jpg';
		}
		header('Location: convert.php?imageName='.$imageName.'&imageType='.$imageType);
	}
}
	
?>

<!DOCTYPE HTML>

<html>
	<head>
		<title>MINI TOOL KIT</title>
		<meta charset="utf-8" />
		<link rel="shortcut icon" href="image.png" type="image/x-icon" />
		<meta name="viewport" content="width=device-width, initial-scale=1, user-scalable=no" />
		<meta name="description" content="">
		<meta name="Keywords" content="" />
		<link rel="stylesheet" href="assets/css/main.css" />
		<script>
		function checkEmpty(){
		var img = document.getElementById('fileToUpload').value;
		if(img == ''){
			alert('Please upload an image');
			return false;
		}
		return true;
	}
</script>
</head>
<body >
<!-- Wrapper -->
	<div id="wrapper">
		<!-- Main -->
			<div id="main">
				<div class="inner">
					<!-- Header -->
						<header id="header">
								<a href="index.php" class="logo"><strong>Mini Tool Kit</strong> </a>
									<ul class="icons">
										<li><a href="#" class="icon brands fa-twitter"><span class="label">Twitter</span></a></li>
										<li><a href="#" class="icon brands fa-facebook-f"><span class="label">Facebook</span></a></li>
										<li><a href="#" class="icon brands fa-snapchat-ghost"><span class="label">Snapchat</span></a></li>
										<li><a href="#" class="icon brands fa-instagram"><span class="label">Instagram</span></a></li>
										<li><a href="#" class="icon brands fa-medium-m"><span class="label">Medium</span></a></li>
									</ul>
								</header>

							<!-- Banner -->
								<section id="banner">
									<div class="content">
									 
									 <table width="500" align="center">
		<tr><td align="center">	<h2 align="center">MINI TOOL KIT</h2></td></tr>
	
		<tr>
			<td align="center">
				<!--<form action="" enctype="multipart/form-data" method="post" onsubmit="return checkEmpty()" />
					<input type="file" name="fileToUpload" id="fileToUpload" />
					<input type="submit" value="Upload" />
				</form>
				-->
				<h4> CONVERTION OF IMAGES TO DIFFERENT FORMATS</h4>

			</td>
		</tr>
	</table>
	</div>
	</section>
	</div>
	</div>

				<!-- Sidebar -->
					<div id="sidebar">
						<div class="inner">

							<!-- Search -->
								<section id="search" class="alt">
								<h1>Mini Tool Kit</h1>
								</section>

							<!-- Menu -->
								<nav id="menu">
									<header class="major">
									<h2>Tools</h2>
									</header>
									<ul>
									<li><a href="index4.php">IMAGES</a></li>
									<li><a href="index.php">Convert to PNG</a></li>
									<li><a href="index.php">Convert to JPG</a></li>
									<li><a href="index.php">Convert to WEBP</a></li>
									<li><a href="index.php">Convert to GIF</a></li>
									<li><a href="index5.php">Documents</a></li>
									<li><a href="index1.php">Convert HTML to WORD</a></li>
									<li><a href="index2.php">Convert TEXT to PDF</a></li>
									<li><a href="index3.php">Convert CSV to JSON</a></li>

									</ul>
								</nav>

						

							<!-- Footer -->
								<footer id="footer">
									<p class="copyright">&copy; SIG mini tool kit</p>
								</footer>

						</div>
					</div>

			</div>

		<!-- Scripts -->
			<script src="assets/js/jquery.min.js"></script>
			<script src="assets/js/browser.min.js"></script>
			<script src="assets/js/breakpoints.min.js"></script>
			<script src="assets/js/util.js"></script>
			<script src="assets/js/main.js"></script>

	</body>
</html>