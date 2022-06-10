$(document).ready(function(){
    //AL PASAR POR ENCIMA DEL DIV SE MUESTRA MI NOMBRE EN EL MENU//
    $("#div1").hover(function(){
        $("#nombreAnimacion").fadeIn("slow")
    })
    //AL SALIR DEL DIV SE ESCONDE MI NOMBRE DEL MENU//
    $("#div1").mouseleave(function(){
        $("#nombreAnimacion").fadeOut("slow")
    })

    $("#div1").slideDown(5000, function(){
    })

    $("#div1").slideDown(5000, function(){
    })

    //RECOGO EL DIV PARA ANIMARLO//
    var div = $("#div1");
    //DIV ANIMADO//
    div.animate({left:'400px', height:'50px', opacity:'0.4'}, "slow")
    div.animate({right:'200px', width:'60px', opacity:'0.5'}, "slow")
    div.animate({left:'200px', height:'100px', opacity:'0.6'}, "slow")
    div.animate({right:'100px', opacity:'0.3'}, "slow")
    div.animate({right:'50px', width:'350px', opacity:'0.7'}, "slow")
    div.animate({left:'100px', height:'200px', opacity:'1'}, "slow")




    //AL HACER CLICK EN LA CRUZ DEL DIV//
    $("#equis").click(function(){
        //SE ELIMINA EL DIV//
        $("#div1").remove()
    })


    navigator.geolocation.getCurrentPosition(Ubicacion);
            function Ubicacion(position) {
                //RECOGE COORDENADAS DE LATITUD Y ALTITUD//
                var latitud = position.coords.latitude;
                var longitud = position.coords.longitude;

            //PETICION AJAX PARA RECOGER LA TEMPERATURA Y LA CIUDAD//
            $.ajax({
                type:'GET',
                url: 'http://api.openweathermap.org/data/2.5/weather?lat='+latitud+'&lon='+longitud+'&units=metric&appid=9f50a805aa0089a1edd1829a5db029f0',
                dataType: 'jsonp'
            })
            .done(function(data){
                //MUSTRA POR CONSOLA EL JSON QUE DEVUELVE//
                console.log(data)
                //RECOGE LA TEMPERATURA Y LUGAR DEL JSON
                var tem = data.main.temp
                var lug = data.name
                //AÑADE TEMPERATURA Y LUGAR EN EL DIV//
                $("#div1").append(`<h3 style="color: white;text-align:center">${lug} - ${tem}ºC</h3>`)

            })
        }





        setInterval(function() { 
            var Tiempo = new Date()
            var hora = Tiempo.getHours()
            var minuto = Tiempo.getMinutes()
            var segundo = Tiempo.getSeconds()
            $("#hora").html(`<span>${hora}:${minuto}:${segundo}</span>`)
        }, 1000);
        

})

