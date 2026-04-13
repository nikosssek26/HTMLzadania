function photo(src){
    document.getElementById("obr").src=src;
}
function zmiengrubosc(){
    var width = document.getElementById("gruboscramki").value;
    var img = document.getElementById("obr"     );
        img.style.border = width + "px solid black";
}
function zmientlo (color){
    document.body.style.backgroundColor = color;
}
function zmienkolor (color){
    document.body.style.color = color;
}
function zmienpodreslenie(){
    var checkbox = document.getElementById("podkreslenie");
    var dekoracja = checkbox.checked ? "underline" : "none";
    document.body.style.textDecoration = dekoracja;
    document.getElementById("prawy").style.textDecoration = dekoracja;
}
 
function zmienczcionke1(){
    document.body.style.fontFamily = "Arial, Helvetica, sans-serif";
}
function zmienczcionke2(){
    document.body.style.fontFamily = "Tahoma, Geneva, Verdana, sans-serif";
}
function zmienczcionke3(){
    document.body.style.fontFamily = "Courier New, Courier, monospace";
}