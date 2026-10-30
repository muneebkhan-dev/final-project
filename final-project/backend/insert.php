<?php

include("config.php");

if(isset($_POST['btn'])){

   $cat = $_POST['cat'];
   $pname = $_POST['pname'];
   $rprice = $_POST['rprice'];
   $sprice = $_POST['sprice'];
   $pdes = $_POST['pdes'];

   $pimg = $_FILES['pimg']['name'];
   $tname = $_FILES['pimg']['tmp_name'];

   $target = "assets/images/" . $pimg;
   move_uploaded_file($tname, $target);
 
   $query= "INSERT INTO addprod VALUES ('','$cat','$pname','$pimg','$rprice','$sprice','$pdes',NOW())";
   $res = mysqli_query ($conn, $query) or die (mysqli_error());

      if($res){
        echo "<script>
        alert('Data Stored')
        document.location = 'add-product.php';
        </script>";

      }else{
        echo "<script>
        alert( 'Data not Stored');
        document.location='add-product.php';    
        </script>";

        };

}

?>