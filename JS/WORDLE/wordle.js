let zagadka = "ALLAH";
let nrWiersza = 0;
let proby = 5;

function StartGame(){
    console.log("Game started");
}

function Sprawdz(){
    let input = document.getElementById("input").value.toUpperCase();
    console.log(input);
    document.getElementById("input").value = "";
    document.getElementById("buttonsprawdz").disabled = true;

    let tbl = document.getElementById("thisTable");

    for(let i = 0; i < input.length; i++){
        tbl.rows[nrWiersza].cells.item(i).setAttribute("id", "cell"+nrWiersza+i);
        document.getElementById("cell"+nrWiersza+i).innerHTML = input[i];
    }
    let tempzagadka = zagadka;
    for ( let i =0; i<input.length; i++){
        if(tempzagadka[i]==input[i]){
            document.getElementById('cell'+nrWiersza+i).style.backgroundColor= 'green';
            tempzagadka[i] = "*"
        }
        else{
            tempzagadka+= zagadka[i]
        }
    }
    let t = tempzagadka;
    tempzagadka = '';
    for( let i =0; i<input.length; i++){
        if(input[i] == tempzagadka[i]){
            document.getElementById('cell'+nrWiersza+i).style.backgroundColor= 'yellow';
            break;
        }
        
    }

    nrWiersza++;
    proby--;
    if(proby == 0){
        alert("Koniec gry! Prawidłowe słowo to: " + zagadka);
        location.reload();
    }
    
}

function SprawdzEnable(){
    let input = document.getElementById("input").value.toUpperCase();
    console.log(input);
    document.getElementById("buttonsprawdz").disabled = (input.length != 5);

}

function Tabela(){
    let tbl = document.getElementById("thisTable");
    let i = 0;
    let j = 0;
    tbl.rows[i].cells.item(j).setAttribute("id", "cell"+i+j);
}