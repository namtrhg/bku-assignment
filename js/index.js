//Code of Nam Kute


function SearchWord(x)
{
    var query = x.value; 
    if (query != '') {
        $.ajax({
            url: "ajax/search.php",
            method: "POST",
            data: { query: query },
            success: function (data) {
                $('#autos').fadeIn();
                $('#autos').html(data);
            }
        });
    }
    else {
        $('#autos').html("");
    }
}


