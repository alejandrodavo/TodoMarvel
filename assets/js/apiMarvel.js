/*idM = $("#monitor").val()
fetch('https://gateway.marvel.com:443/v1/public/characters?apikey=074227bf87c87cf63d85a9de5377e968')
    .then(data => data.json())
    .then(function (data) {
        usuarios = data.data;
        console.log(usuarios);
        $("#nombreMonitor").val(data.name)
        mon = data.name
        $(div).append("<p>Monitor: <b>" + mon + "<p>")
    })
    .catch(function (error) {
        console.log('Hubo un problema con la petición Fetch:' + error.message);
    });
mon = $("#nombreMonitor").val()




function getMarvelResponse() {
    var apiKey = "87165c2531d309ddf02d84f4ae2c5e02"; var titleKeyword = "wolverine"; //FIX ONE BELOW
    var url = "http://gateway.marvel.com/v1/public/comics?ts=" + ts + "&hash=" + hash + "&apikey=" + apiKey;
    var url = "http://gateway.marvel.com/v1/public/comics?ts=1457734667935&hash=hashcodehere&apikey=87165c2531d309ddf02d84f4ae2c5e02&title=wolverine";
    alert(hash);
    alert(url);
    console.log(url);
    $.ajax({
         url: url, context: document.body 
        }).done(function (data) {
             $('#results').html('');*/


$(document).ready(function(){
    $("#pedidoInput").keyup(function(){
        if($("#pedidoInput").val()!=""){
            var start = $("#pedidoInput").val()
            const marvel =  {
                render:()=>{
                    const urlAPI = "https://gateway.marvel.com:443/v1/public/characters?ts=1&nameStartsWith="+start+"&apikey=074227bf87c87cf63d85a9de5377e968&hash=e75b099bc6b4e48782149ea13ccc39f5";
                    const constainer = document.querySelector("#pedidos");
                    let contentHTML = "";
        
                    fetch(urlAPI)
                    .then(res => res.json())
                    .then((json) => {
                        for(const hero of json.data.results){
                            contentHTML+=`<option value='${hero.name}'>`
        
                        }
                        constainer.innerHTML=contentHTML;
                    })
                }
            }
        
            marvel.render()
}})
})
        
    

