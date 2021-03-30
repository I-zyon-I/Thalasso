$(function(){

    //constantes
    var url = "https://api.openweathermap.org/data/2.5/weather?q=";
    var position = "Deauville";
    var cle = "&appid=c3b01ae20df332287b65ef8a20d6ad26";
    var unit = "&units=metric";
    var lang = "&lang=fr";

    function fetchCurrentWeather() {
        $.get(url+position+cle+unit+lang).done(afficheWeather)   
        
    }

    function afficheWeather(response) {
        $("#city-name").text(response.name);
        $("#current-weather").text(response.weather[0].description);
        $("#current-weather-icon").attr("src","../../assets/icones/" + response.weather[0].icon + ".png");
        $("#current-temp").text(Math.round(response.main.temp) + " °C");
    }
    
    fetchCurrentWeather();
})

