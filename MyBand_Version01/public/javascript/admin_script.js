console.log("ree");

var button = document.getElementById('button1');
var button2 = document.getElementById('button2');
var test = document.getElementById('text_banner');

button.addEventListener("click", change, false);
button2.addEventListener("click", change2, false);

function change(){
    test.value = "https://i.redd.it/ttygwklnq57y.png";
}
function change2(){
    test.value="https://static1.squarespace.com/static/5710064860b5e95e742fa5f2/t/5b36b18388251bb98f8ce199/1516311179950/EDEN_Vertigo-%28iameden-web-banner%29.jpg";
}

// img.addEventListener("keyup",function(){
//     console.log('ree');
// })