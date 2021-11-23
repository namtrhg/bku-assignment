//Code of Nam Kute

function SearchAutoFill(x)
{
    x.style.background = "yellow";

    var query = ''; 
      
        $.ajax({  
             url:"ajax/search.php",  
             method:"POST",  
             data:{query:query},  
             success:function(data)  
             {  
                  $('#autos').fadeIn();  
                  $('#autos').html(data);  
             }  
        }); 
}

function SearchOff(x)
{
    x.style.background = "white";
    
    $('#autos').html('');
}



function SearchWord(x)
{
    var query = x.value; 
    console.log(query);
    
    if(query != '')  
    {  
        $.ajax({  
             url:"ajax/search.php",  
             method:"POST",  
             data:{query:query},  
             success:function(data)  
             {  
                  $('#autos').fadeIn();  
                  $('#autos').html(data);  
             }  
        }); 
    } 
   
}


