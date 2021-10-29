document.addEventListener("DOMContentLoaded",function(){
    slide1 = document.querySelector("#slide1")
    slide2 = document.querySelector("#slide2")
    slide3 = document.querySelector("#slide3")
    slide4 = document.querySelector("#slide4")
    slide5 = document.querySelector("#slide5")
    let slideslot = 1

    setTimeout(function(){
        slide5.style.display = "unset"
    }, 1000);
    setInterval(function(){
        slideslot++
        if(slideslot == 6)
            slideslot = 1
        if(slideslot == 1)
        {
            slide1.className = ""
            slide1.classList.add("slot1")
            slide2.className = ""
            slide2.classList.add("slot2")
            slide3.className = ""
            slide3.classList.add("slot3")
            slide4.className = ""
            slide4.classList.add("slot4")
            slide5.className = ""
            slide5.classList.add("slot0")
            setTimeout(function(){
                slide5.style.display = "unset"
            }, 1000);
            setTimeout(function(){
                slide4.style.display = "none"
            }, 1000);
        }
        if(slideslot == 2)
        {
            slide1.className = ""
            slide1.classList.add("slot2")
            slide2.className = ""
            slide2.classList.add("slot3")
            slide3.className = ""
            slide3.classList.add("slot4")
            slide4.className = ""
            slide4.classList.add("slot0")
            slide5.className = ""
            slide5.classList.add("slot1")
            setTimeout(function(){
                slide4.style.display = "unset"
            }, 1000);
            setTimeout(function(){
                slide3.style.display = "none"
            }, 1000);
        }
        if(slideslot == 3)
        {
            slide1.className = ""
            slide1.classList.add("slot3")
            slide2.className = ""
            slide2.classList.add("slot4")
            slide3.className = ""
            slide3.classList.add("slot0")
            slide4.className = ""
            slide4.classList.add("slot1")
            slide5.className = ""
            slide5.classList.add("slot2")
            setTimeout(function(){
                slide3.style.display = "unset"
            }, 1000);
            setTimeout(function(){
                slide2.style.display = "none"
            }, 1000);
        }
        if(slideslot == 4)
        {
            slide1.className = ""
            slide1.classList.add("slot4")
            slide2.className = ""
            slide2.classList.add("slot0")
            slide3.className = ""
            slide3.classList.add("slot1")
            slide4.className = ""
            slide4.classList.add("slot2")
            slide5.className = ""
            slide5.classList.add("slot3")
            setTimeout(function(){
                slide2.style.display = "unset"
            }, 1000);
            setTimeout(function(){
                slide1.style.display = "none"
            }, 1000);
        }
        if(slideslot == 5)
        {
            slide1.className = ""
            slide1.classList.add("slot0")
            slide2.className = ""
            slide2.classList.add("slot1")
            slide3.className = ""
            slide3.classList.add("slot2")
            slide4.className = ""
            slide4.classList.add("slot3")
            slide5.className = ""
            slide5.classList.add("slot4")
            setTimeout(function(){
                slide1.style.display = "unset"
            }, 1000);
            setTimeout(function(){
                slide5.style.display = "none"
            }, 1000);
        }
    }, 100000000);
})