//API DE MARVEL PARA QUE AL INTRODUCIR VALORES EN EL CAMPO PEDIDO, VAYA BUSCANDO LO QUE ESCRIBES EN LA API DE MARVEL CON TODOS LOS PERSONAJES QUE HAY//
$(document).ready(function(){
    //AL ESCRIBIR EN EL INPUT//
    $("#pedidoInput").keyup(function(){
        //SI EL CAMPO NO ESTÁ VACIO//
        if($("#pedidoInput").val()!=""){
            //RECOGE LAS LETRAS//
            var start = $("#pedidoInput").val()
            const marvel =  {
                render:()=>{
                    //URL DE LA API, CON LOS CAMPOS nameStartsWith QUE RECIBIRÁ LO QUE ESCRIBAMOS Y LO PEDIRÁ, MI CLAVE PARA PODER USARLA Y UN CÓDIGO HASH DE MI KEY//
                    const urlAPI = "https://gateway.marvel.com:443/v1/public/characters?ts=1&nameStartsWith="+start+"&apikey=074227bf87c87cf63d85a9de5377e968&hash=e75b099bc6b4e48782149ea13ccc39f5";
                    //SELECCIONA EL DATALIST DEL HTML//
                    const constainer = document.querySelector("#pedidos");
                    //CREA LA VARIABLE DONDE SE INSERTARÁ TODO EL CÓDIGO HTML//
                    let contentHTML = "";
        
                    //HACE UNA PROMESA//
                    fetch(urlAPI)
                    .then(res => res.json())
                    .then((json) => {
                        //ESTE FOR RECORRE TODOS LOS HELEMENTOS DEL JSON//
                        for(const hero of json.data.results){
                            //CREA UN OPTION PARA EL DATALIST CON EL NOMBRE DEL HEROE DE LA API//
                            contentHTML+=`<option value='${hero.name}'>`
        
                        }
                        //LO AÑADE AL HTML//
                        constainer.innerHTML=contentHTML;
                    })
                }
            }
            //EJECUTA LA API//
            marvel.render()
}})
})
        
    

