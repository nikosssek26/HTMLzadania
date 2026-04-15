var ilosczl = 0;
function oblicz() {
    var iloscgalek = parseInt(document.getElementById("iloscgalek").value);
    if (isNaN(iloscgalek) || iloscgalek < 1) {
        alert("Proszę wprowadzić poprawną ilość gałek."); return;
    }
    var ilosczl = iloscgalek * 6;
    var rozki = document.getElementsByName("rozek");
    if (rozki[0].checked)
      ilosczl += 0;

    else if (rozki[1].checked) 
      ilosczl += 2

    var dodatek = document.getElementsByName("dodatek");
    if (dodatek[0].checked)
      ilosczl += 1;

    if (dodatek[1].checked)
      ilosczl += 2; 

    if (dodatek[2].checked)
      ilosczl += 3; 

  alert("Do zapłaty: " + ilosczl + " zł");
}