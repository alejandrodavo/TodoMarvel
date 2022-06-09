$(document).ready(function(){
    $("#galeria a").fancybox({
             openEffect:'elastic',
             openSpeed:'slow',
             closeSpeed:'normal',
             helpers:{
                 title:{
                     type: 'inside'
                 },
                 overlay: {
                     closeClick: true
                 }
             },
             padding:11   	
    });
})