document.addEventListener("DOMContentLoaded",function(){
    menu = document.querySelector("#menu")

    setInterval(function(){
        let randcol1 = getRandomInt(244, 210)
        let randcol2 = getRandomInt(176, 140)
        let randcol3 = getRandomInt(39, 15)
        menu.style.backgroundColor = "rgb(" + randcol1 + "," + randcol2 + "," + randcol3 + ")"
        menu.style.boxShadow = "0px -3px 20px 20px rgb(" + randcol1 + " " + randcol2 + " " + randcol3 + ")";
    }, 1000);
})

function getRandomInt(min, max) {
    return Math.random() * (max - min) + min;
  }