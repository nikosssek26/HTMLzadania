function Zmien(nr) {
  var tytul = "";
  var opis = "";
  if (nr == 1) {
    tytul = "Żubr";
    opis = "Pozwólcie przedstawić sobie: Pan żubr we własnej osobie. No, pokaż się, żubrze. Zróbże Minę uprzejmą, żubrze. ";
  } else if (nr == 2) {
    tytul = "Wilk";
    opis = "Powiem ci w słowach kilku, Co myślę o tym wilku: Gdyby nie był na obrazku, Zaraz by cię zjadł, głuptasku. ";
  } else if (nr == 3) {
    tytul = "Małpa";
    opis = "Małpy skaczą niedościgle, Małpy robią małpie figle, Niech pan spojrzy na pawiana: Co za małpa, proszę pana! I gra w szachy i go pół dnia nie ma w szkole ";
  } else if (nr == 4) {
    tytul = "Dzik";
    opis = "Dzik jest dziki, dzik jest zły, Dzik ma bardzo ostre kły. Kto spotyka w lesie dzika, Ten na drzewo szybko zmyka. ";
  } else if (nr == 5) {
    tytul = "Papuga";
    opis = "„Papużko, papużko, Powiedz mi coś na uszko”. „Nic nie powiem, boś ty plotkarz, Powtórzysz każdemu, kogo spotkasz”.  ";
  }
    document.getElementById("tytul").textContent = tytul;
    document.getElementById("opis").textContent = opis;
}
