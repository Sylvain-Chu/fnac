document.addEventListener("DOMContentLoaded",function(){
    menu = document.querySelector("#menubar")
    title = document.querySelector("#titleaffiche")

    setInterval(function(){
        let randcol1 = getRandomInt(255, 255)
        let randcol2 = getRandomInt(162, 136)
        let randcol3 = getRandomInt(35, 0)
        menu.style.backgroundColor = "rgb(" + randcol1 + "," + randcol2 + "," + randcol3 + ")"
        menu.style.boxShadow = "0px -3px 20px 20px rgb(" + randcol1 + " " + randcol2 + " " + randcol3 + ")";
        title.style.color = "rgb(" + randcol1 + "," + randcol2 + "," + randcol3 + ")"
    }, 1000);
})

function getRandomInt(min, max) {
    return Math.random() * (max - min) + min;
  }