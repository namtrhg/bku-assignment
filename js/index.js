//Code of Nam Kute

function SearchAutoFill(x)
{
    x.style.background = "yellow";
    $('#list-auto-fill').css("display", "block");
}

function SearchOff(x)
{
    x.style.background = "white";
    $('#list-auto-fill').css("display", "none");
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

$('#input-search').val($(this).text());  
$('#autos').fadeOut();  
