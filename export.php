<?php  
 //export.php  
 if(isset($_POST["create_word"]))  
 {  
      if(empty($_POST["description"]))
      {  
           echo '<script>alert("HTML script is required")</script>';  
           echo '<script>window.location = "index1.php"</script>';  
      }  
      else  
      {  
           header("Content-type: application/vnd.ms-word");  
           header("Content-Disposition: attachment;Filename=".rand().".doc");  
           header("Pragma: no-cache");  
           header("Expires: 0");  
           echo $_POST["description"];  
      }  
 }  
 ?>  