let slide = new Array("assets/images/slider/jardinRedim.png", "assets/images/slider/kidona.jpg", "assets/images/slider/oreiller.jpg", "assets/images/slider/sejour.jpg");
let numero = 0;

function ChangeSlide(n) {
    numero = numero + n;
    if (numero < 0)
        numero = slide.length - 1;
    if (numero > slide.length - 1)
        numero = 0;
        document.getElementById("slider").src = slide[numero];   
    }
setInterval("ChangeSlide(+1)",3000);    
