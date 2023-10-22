addEventListener("DOMContentLoaded", () => {
    document.getElementById("btn").addEventListener("click",() => {
        document.getElementById("menu").classList.toggle("show");
    });
} );

setTimeout(function(){
    window.location.replace("https://cuiprotec.com.ar");
},2000);