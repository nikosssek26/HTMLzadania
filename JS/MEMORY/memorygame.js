let TabKart = Array(6);
let CzyAktywna = Array(6);
const tyl = "img/tyl.png";
const k1 = "img/1.png";
const k2 = "img/2.png";
const k3 = "img/3.png";
let CzyPierwsza = true;
let piewszaKarta;

function ClickImg(numer){
    if(! CzyAktywna[numer]){
        return;
    }
    if(CzyPierwsza){
        CzyPierwsza = false;
        karta = document.getElementById("k" + numer);
        console.log("Kliknięto karte nr " + numer);
        karta.src = tabKart[numer];
        CzyAktywna[numer] = false;
        piewszaKarta = numer;
        return;
    } 
    else{
        karta = document.getElementById("k" + numer);
        console.log("Kliknięto karte nr " + numer);
        karta.src = tabKart[numer];
        CzyAktywna[numer] = false;
        
    }
    //sprawdzenie czy karty są takie same
    if(tabKart[numer] == tabKart[piewszaKarta]){
        console.log("Dobra para");
        CzyPierwsza = true;
        return;
    }
    else{
        console.log("Zła para");
        setTimeout(() => {
        CzyAktywna[piewszaKarta] = true;
        CzyAktywna[numer] = true;
        let id = document.getElementById("k" + piewszaKarta);
        id.src = tyl;
        id = document.getElementById("k" + numer);
        id.src = tyl;
        CzyPierwsza = true;
        }, 1000);

    }
}
function StartGame(){
    let temptab = [k1,k1,k2,k2,k3,k3];
    temptab.sort(() => (Math.random() - 0.5));
    tabKart = temptab.slice();
    for(let i = 0; i < tabKart.length; i++){
        let id = document.getElementById("k" + (i));
        //id.src = tabKart[i];
        CzyAktywna[i] = true;
    }
}