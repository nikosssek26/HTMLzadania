let zagadka = "DOMEK";

function StartGame(){
    console.log("Game started");
}

function Sprawdz(){
    let input = document.getElementById("input").value.toUpperCase();
    console.log(input);
    
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
    document.getElementById("cell"+i+j).style.backgroundColor = "green";
    document.getElementById("cell"+i+j).innerHTML = "A";
}