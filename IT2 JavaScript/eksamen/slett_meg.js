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


function lagMeny(){
    var meny = document.getElementById("meny");
    var liste = document.createElement("UL");
    //liste.setAttribute("","");
    liste.innerHTML ='<li><a href="#">Hva er geometri</a></li>'+
                    '<li><a href="#">Figurer</a></li>' +
                    '<li><a href="#">Kontakt oss</a></li>' +
                    '<li><a href="#">Figurspill</a></li>';
    meny.appendChild(liste);
}