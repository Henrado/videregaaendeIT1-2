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