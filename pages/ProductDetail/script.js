
function myAjax() {
      $.ajax({
           type: "POST",
           url: '../../pages/ProductDetail/ajax.php',
           data:{action:'call_this'},
           success:function(html) {
             alert(html);
           }
      });
 }
