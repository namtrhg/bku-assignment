<?php  
    include_once '../class/Backend.php';
    $Backend = new Backend;

 
 if(isset($_POST["query"]))  
 {  
      $output = '';    
      $word = $_POST["query"];
      $result = $Backend->get_searchWord($word);
      $output = '<ul class="list-group">';  
      if(mysqli_num_rows($result) > 0)  
      {  
           while($row = mysqli_fetch_array($result))  
           {  
                $output .= '<li class="list-group-item"><a href="/jobs/'.$row["ID"].'">'.$row["NAME"].'</a></li>';
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