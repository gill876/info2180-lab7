$(document).ready(function(){
    //console.log("hello world");
    
    function requestCountry(city = ""){
        let countryI = $("#country").val();
        countryI = countryI.trim();
        
        $.ajax("world.php", {
            method: 'GET',
            data: {
                country: countryI,
                context: city
            }
        }).done(function(response){
            let parseHTML = response;
            $("#result").html(parseHTML);
        }).fail(function(){
            alert('There was an issue with the request.');
        });
    }
    
    $("#lookup").click(function(){
        requestCountry();
    });
    
    $("#country").keypress(function(e){
        if(e.which == 13){
            requestCountry();
        }
    });
    
    $("#lookup-cities").click(function(){
        requestCountry("cities");
    });
});