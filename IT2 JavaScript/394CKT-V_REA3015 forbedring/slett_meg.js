function slett(boks){
    boks.animate(animasjon, kontrollobjekt);
    setTimeout(function(){boks.style.display='none'}, 1000);
}

var animasjon = [
    {opacity:1},
    {opacity:0}
];

var kontrollobjekt = {
    duration: 1000,
    easing:'ease',
    fill:'forwards'
}


lagMeny()
function lagMeny(){
    var meny = document.getElementById("meny");
    var menyInfo = document.getElementById("menyInfo");
    var liste = document.createElement("UL");
    //liste.setAttribute("","");
    liste.innerHTML ='<li><a href="Index_oppgave1.html">Hovedside</a></li>'+
                    '<li><a href="oppgave2.html">Bestill biletter</a></li>' +
                    '<li><a href="oppgave3.html">Test kunnskap</a></li>';
    meny.appendChild(liste);
    
    var liste = document.createElement("DIV");
    liste.setAttribute("id", "fastRad");
    liste.innerHTML = '<div onclick="finn(0)"><img src="./media/aapningstider.jpg"></div>'+
                    '<div onclick="finn(1)"><img src="./media/priser.jpg"></div>'+
                    '<div onclick="finn(2)"><img src="./media/informasjon.jpg"></div>';
    menyInfo.appendChild(liste);
}

var infoTekst = [
    {overskrift: "Åpningstider:", info:"Tirsdag – søndag 11.00-16.00"},
    {overskrift: "Billetter:", info:"Voksen: 120 kr <br>Student/honnør: 100 kr <br>Barn (0-15 år): Gratis"},
    {overskrift: "Informasjon:", info:"Besøksadresse: Lade allé 60, 7041 Trondheim 73 87 02 80 post@ringve.no <br>Postadresse:  Postboks 6289 Torgarden, 7489 Trondheim"},
];

var infoBoks = document.getElementById("infoBoks");
function finn(tall){
                infoBoks.innerHTML = "";
                var div = document.createElement("div");
                div.setAttribute("class", "hovedInnhold");
                div.innerHTML = "<div class='steng' onclick='slett(this.parentElement)'>Trykk for å lukke</div>";
                div.innerHTML += "<h1>" + infoTekst[tall].overskrift + "</h1>";
                div.innerHTML += "<p>" + infoTekst[tall].info + "</p>";
                infoBoks.appendChild(div);
            }