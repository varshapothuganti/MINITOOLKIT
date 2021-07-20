 <?php
 if(isset($_POST["create_word"]))  
 {  
      if(empty($_POST["description"]))
      {  
           echo '<script>alert("HTML script is required")</script>';  
           echo '<script>window.location = "index1.php"</script>';  
      }   
 }

 require_once __DIR__ . '/vendor/autoload.php';
 
 //grab variables
 $message = $_POST['description'];
 $title=$_POST['heading'];

 //create new PDF instance
 $mpdf = new \Mpdf\Mpdf();

 $data = '';

 $data .= $title. '<br />'; 

 if($message)
 {
     $data .= '<br /><strong></strong><br />' . $message;
 }


 $mpdf->WriteHTML($data);

 $mpdf->Output('converted.pdf','D');
?>