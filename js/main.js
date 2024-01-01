//LIGHT MODE
document.documentElement.setAttribute('data-theme', 'light');
if (window.matchMedia && window.matchMedia('(prefers-color-scheme: dark)').matches) {
    // If the current color scheme is dark, change it to light
    document.documentElement.setAttribute('data-theme', 'light');
  }

//FULL SCREEN CAROUSEL
let fullScreenCarousel = $(".full-screen-carousel-area")
$(document).ready(function(){
    // FULL SCREEN CAROUSEL INIT
    let fullScreenCarouselContol = document.getElementsByClassName("carousel-control");
    fullScreenCarousel.owlCarousel({
        items:1,
        loop:true
    });

    //FULL SCREEN CAROUSEL PREV
    fullScreenCarouselContol[0].addEventListener('click',()=>{
        fullScreenCarousel.trigger('prev.owl');
    })

    //FULL SCREEN CAROUSEL NEXT
    fullScreenCarouselContol[1].addEventListener('click',()=>{
        fullScreenCarousel.trigger('next.owl');
    })
});

//MENU BTN
let body = document.getElementsByTagName('html')[0]
let hamburgerMenuStatus = 0
let hamburgerMenu = document.getElementsByClassName("hamburger-menu")[0]
let hamburgerMenuLine = document.getElementsByClassName("hamburger-menu-line")
let hamburgerMenuLineAnimation = gsap.timeline()
let mobileMenu = document.getElementsByClassName("mobile-navigation-cont")[0]
let mobileMenuItemsItems = document.getElementsByClassName("mobile-navigation-list")[0]
hamburgerMenuLineAnimation.pause()


hamburgerMenuLineAnimation.to(hamburgerMenuLine[1],{
    width:"0%",
    duration:0.25
})
hamburgerMenuLineAnimation.to(hamburgerMenuLine[0],{
    top:"50%",
    y:"50%",
    height:"3px",
    rotate:90,
    scale:0.6,
    duration:0.5,
    delay:-0.25
})
hamburgerMenuLineAnimation.to(hamburgerMenuLine[2],{
    top:"50%",
    y:"50%",
    height:"3px",
    rotate:0,
    scale:0.6,
    duration:0.5,
    delay:-0.5
})
hamburgerMenuLineAnimation.to(mobileMenu,{
    display:"block",
    opacity:1,
    delay:-0.5
})
hamburgerMenuLineAnimation.from(mobileMenuItemsItems,{
    opacity:0,
    duration:0.25
})


window.addEventListener("resize",()=>{
    hamburgerMenuLineAnimation.reverse()
    hamburgerMenuStatus = 0
    body.style.setProperty('overflow-y','visible')
})
hamburgerMenu.addEventListener('click',()=>{
    if (hamburgerMenuStatus == 0){
        hamburgerMenuLineAnimation.restart()
        hamburgerMenuStatus = 1
        body.style.setProperty('overflow-y','hidden')

    }
    else{
        if(hamburgerMenuLineAnimation.isActive()){
            hamburgerMenuLineAnimation.pause()
        }
        else{
            hamburgerMenuLineAnimation.reverse()
            hamburgerMenuStatus = 0
            body.style.setProperty('overflow-y','visible')

        }
    }
})

// //BIONIC TEXT
// let bionicTextActivate = ()=>{
//     let bionicTextContainer = document.getElementsByClassName("bionicTextContainer")
//     let bionicTextElement = document.getElementsByClassName("bionicText")

//     for (bionicTextItemsCount = 0; bionicTextItemsCount < bionicTextElement.length; bionicTextItemsCount++){
//         let bionicTextElementCache = bionicTextElement[bionicTextItemsCount].innerText
//         let bionicTextElementArrayCache = bionicTextElementCache.split(" ")
//         let bionicTextElementArrayCache2 = []

//         for (textElement of bionicTextElementArrayCache){
//             let textElementArrayCache = textElement.split("")
//             if(textElementArrayCache.length > 0){
//                 let bionicTextLength =  Math.floor(textElementArrayCache.length / 2)+1
//                 let firstArrayElements = textElementArrayCache.slice(0,bionicTextLength)
//                 firstArrayElements = firstArrayElements.join("~")
//                 firstArrayElements = firstArrayElements.replace(/~/g,"")

//                 let allArrayElements = textElementArrayCache.slice(bionicTextLength)
//                 allArrayElements = allArrayElements.join("~")
//                 allArrayElements = allArrayElements.replace(/~/g,"")

//                 let modifiedArrayElements = "<span class='bionicTextFg'>"+firstArrayElements+"</span>"+"<span class='bionicTextBg'>"+allArrayElements+"</span>"

//                 bionicTextElementArrayCache2.push(modifiedArrayElements)

//             }
//             else{}

//             bionicTextElement[bionicTextItemsCount].innerHTML = bionicTextElementArrayCache2.join(" ")

//         }
//     }

// }

// bionicTextActivate()



// let bionicReadingBtn = document.getElementById("bionicReadingBtn")
// let bionicReadingMode = false

// let bionicReadingAnimation = gsap.timeline()
// bionicReadingAnimation.pause()
// bionicReadingAnimation.to(".bionicTextFg",{
//     opacity:0,
//     duration:1
// })
// bionicReadingAnimation.to(".bionicTextBg",{
//     opacity:0.5,
//     duration:2
// },"-=1")
// bionicReadingAnimation.to(".bionicTextFg",{
//     fontWeight:600,
//     duration:0.01
// },"-=1.25")
// bionicReadingAnimation.to(".bionicTextFg",{
//     opacity:1,
//     duration:2
// },"-=1")

// let bionicReadingIconAnimation = gsap.timeline()
// bionicReadingIconAnimation.pause()
// bionicReadingIconAnimation.set(".bottom-icon2",{y:"10px",opacity:0})
// bionicReadingIconAnimation.to(".bottom-icon1",{y:"-10px",opacity:0, duration:0.5})
// bionicReadingIconAnimation.set(".bottom-icon1",{display:"none"})
// bionicReadingIconAnimation.set(".bottom-icon2",{display:"block"})
// bionicReadingIconAnimation.to(".bottom-icon2",{y:"1px",opacity:1, duration:0.5})







// bionicReadingBtn.addEventListener("click",()=>{
//     if(bionicReadingMode == false){
//         bionicReadingMode = true
//         bionicReadingIconAnimation.restart()
//         bionicReadingAnimation.restart()
//         setTimeout(()=>{document.getElementsByClassName('post-navigation-area-bottom-status')[0].innerText="ON"},1000)
//     }
//     else{
//         bionicReadingMode = false
//         bionicReadingIconAnimation.reverse()
//         bionicReadingAnimation.reverse()
//         setTimeout(()=>{document.getElementsByClassName('post-navigation-area-bottom-status')[0].innerText="OFF"},1000)
//     }

// })


//MOBILE NAVIGATION
let navigationBtn = document.getElementById("navigationBtn")
let navigationControlArea = document.getElementsByClassName("post-navigation-area-bg-control")[0]
let mobileNavigationNavigationAnimation = gsap.timeline()
mobileNavigationNavigationAnimation.pause()

mobileNavigationNavigationAnimation.set(".post-navigation-area-cont",{
    width: "calc(100% - 5vw)",
    height: "90%"
})

mobileNavigationNavigationAnimation.to(".post-navigation-area-fg-cont",{
    scale:0.25,
    duration:0.25
})
mobileNavigationNavigationAnimation.set(".post-navigation-area-bg",{display:"block"})
mobileNavigationNavigationAnimation.to(".post-navigation-area-bg",{
    height:"auto",
    opacity:1,
    duration:0.35
},"-=0.25")

navigationBtn.addEventListener("click",()=>{
    mobileNavigationNavigationAnimation.restart()
})
navigationControlArea.addEventListener("click",()=>{
    //alert('x')
    mobileNavigationNavigationAnimation.reverse()
})

//Navigation Items
let navigationItems = document.getElementsByClassName("post-anchor")
//post-navigation-area
let navigationArea = document.getElementsByClassName("post-navigation-area-top")[0]

for (let cc = 0; cc < navigationItems.length - 1; cc++){
    if(navigationItems[cc].id !== ""){
        let anchor = document.createElement('a')
        anchor.className="post-navigation-area-link"
        anchor.href="#"+navigationItems[cc].id
        let anchorText = document.createElement('p')
        anchorText.className="post-navigation-area-link-text textColor"
        anchorText.textContent = navigationItems[cc].id
        anchor.appendChild(anchorText)
        navigationArea.appendChild(anchor)
    }
}