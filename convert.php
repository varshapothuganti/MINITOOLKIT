<?php 

//import the converter class
require('image_converter.php');

$imageType = '';
$download = false;

//handle get method, when page redirects
if($_GET){	
	$imageType = urldecode($_GET['imageType']);
	$imageName = urldecode($_GET['imageName']);
}else{
	header('Location:index.php');
}

//handle post method when the form submitted
if($_POST){
	
	$convert_type = $_POST['convert_type'];
	
	//create object of image converter class
	$obj = new Image_converter();
	$target_dir = 'uploads';
	//convert image to the specified type
	$image = $obj->convert_image($convert_type, $target_dir, $imageName);
	
	//if converted activate download link 
	if($image){
		$download = true;
	}
}


//convert types
$types = array(
	'png' => 'PNG',
	'jpg' => 'JPG',
	'webp' => 'WEBP',
	'gif' => 'GIF'
);
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
	</head>
	<body class="is-preload">

		<!-- Wrapper -->
			<div id="wrapper">

				<!-- Main -->
					<div id="main">
						<div class="inner">

							<!-- Header -->
								<header id="header">
									<a href="index.php" class="logo"><strong>Mini Tool Kit</strong></a>
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
									 
									 	<?php if(!$download) {?>
		<form method="post" action="">
			<table width="500" align="center">
				<tr>
					<td align="center">
						File Uploaded, Select below option to convert!
						<img src="uploads/<?=$imageName;?>"  />
					</td>
				</tr>
				<tr>
					<td align="center">
						Convert To: 
							<select name="convert_type">
								<?php foreach($types as $key=>$type) {?>
									<?php if($key != $imageType){?>
									<option value="<?=$key;?>"><?=$type;?></option>
									<?php } ?>
								<?php } ?>
							</select>
							<br /><br />
					</td>
				</tr>
				<tr>
					<td align="center"><input type="submit" value="convert" /></td>
				</tr>
			</table>
		</form>
	<?php } ?>
	<?php if($download) {?>
		<table width="500" align="center">
				<tr>
					<td align="center">
						Image Converted to <?php echo ucwords($convert_type); ?>
						<img src="<?=$target_dir.'/'.$image;?>"  />
					</td>
				</tr>
				<td align="center">
				
					<a class="button icon solid fa-download" href="download.php?filepath=<?php echo $target_dir.'/'.$image; ?>" />Download Converted Image</a>
				</td>
			</tr>
			<tr>
				<td align="center"><a href="index.php">Convert Another</a></td>
			</tr>
		</table>
	<?php } ?>
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
									<li><a href="index.php">Home</a></li>
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
									<p class="copyright">&copy; 2020 SIG mini tool kit</p>
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