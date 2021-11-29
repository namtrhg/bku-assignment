<?php  
    include_once '../class/Backend.php';
    $Backend = new Backend;

 
 if(isset($_POST["query"]))  
 {  
      $output = '';    
      $word = $_POST["query"];
      $result = $Backend->get_job_by_keyword($word);
      $output = '<ul class="list-group">';  
      if($result->num_rows > 0)  
      {  
           while($row = mysqli_fetch_array($result))  
           {  
                $output .= '<li class="list-group-item"><a href="./pages/ProductDetail/index.php?id='.$row["ID"].'">'.$row["NAME"].'</a></li>';
           }  
      }  
      else  
      {  
           $output .= '<li class="list-group-item">Jobs Not Found</li>';  
      }  
      $output .= '</ul>';  
      echo $output;  
 }  
 ?>  