<?php

$error = '';

if(isset($_POST["upload_file"]))
{
  if($_FILES['file']['name'])
  {
    $file_array = explode(".", $_FILES['file']['name']);

    $file_name = $file_array[0];

    $extension = end($file_array);

    if($extension == 'csv')
    {
      $column_name = array();

      $final_data = array();

      $file_data = file_get_contents($_FILES['file']['tmp_name']);

      $data_array = array_map("str_getcsv", explode("\n", $file_data));

      $labels = array_shift($data_array);

      foreach($labels as $label)
      {
        $column_name[] = $label;
      }

      $count = count($data_array) - 1;

      for($j = 0; $j < $count; $j++)
      {
        $data = array_combine($column_name, $data_array[$j]);

        $final_data[$j] = $data;
      }

      header('Content-disposition: attachment; filename='.$file_name.'.json');

      header('Content-type: application/json');

      echo json_encode($final_data);

      exit;
    }
    else
    {
      $error = 'Only <b>.csv</b> file allowed';
    }
  }
  else
  {
    $error = 'Please Select CSV File';
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
		<tr><td align="center"><h4>Convert CSV TO JSON</h4></td></th>
		<tr>
			<td align="center">
      <div class="container">
    		<div class="panel panel-default">
          <div class="panel-heading">
            <h3 class="panel-title">Select CSV File</h3>
          </div>
          <div class="panel-body">
            <?php
            if($error != '')
            {
              echo '<div class="alert alert-danger">'.$error.'</div>';
            }
            ?>
            <form method="post" enctype="multipart/form-data">
              <div class="col-md-6" align="right">Select File</div>
              <div class="col-md-6">
                <input type="file" name="file" />
              </div>
              <br /><br /><br />
              <div class="col-md-12" align="center">
                <input type="submit" name="upload_file" class="btn btn-primary" value="Upload" />
              </div>
            </form>
          </div>
        </div>
    	</div> 
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



