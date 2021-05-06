window.addEventListener("load", initSite)


function initSite() {
  //  scrollFunction()
    flipArrow()
    console.log("innit done blaha")
}


let snapWrap = document.getElementById("snapWrap")
let main = document.getElementsByTagName("main")[0]
let arrow = document.getElementById("arrow")
let body = document.getElementsByTagName("BODY")[0];
let productContainers = document.getElementsByClassName("wc-block-grid__products");



function flipArrow() {
    for(let i = 0; i < productContainers.length; i++) {
        let children = productContainers[i].childNodes
        let lastChild = children[children.length-1]
        let notLastChild = children[children.length-4]
        objectInView(notLastChild, "fas fa-arrow-down")
        objectInView(lastChild, "fas fa-arrow-down transformers") 
    }

}



function objectInView(param, addClass) {
    
    let observer = new IntersectionObserver((entries, observer) => { 
      entries.forEach(entry => {
        if(entry.isIntersecting){
                let parent = entry.target.parentNode.parentNode.parentNode.parentNode
                let childrenOfParent = parent.childNodes
                let arrow = childrenOfParent[3]
                arrow.classList = addClass
        }
    });
    }, {threshold: 0.8});
    { observer.observe(param) };
}








/* 
function scrollFunction(param) {
    
    let observer = new IntersectionObserver((entries, observer) => { 
      entries.forEach(entry => {
          let parent = entry.target.parentNode.parentNode.parentNode.parentNode
          let childrenOfParent = parent.childNodes
          let arrow = childrenOfParent[3]

        if(entry.isIntersecting){
            console.log(entry.target)
            arrow.classList = "fas fa-arrow-down transformers"
            console.log(arrow)
     }
        else {
            console.log(entry.target)
            arrow.classList = "fas fa-arrow-down"
            console.log(arrow)

        }
      });
    }, {threshold: 0.8});
    { observer.observe(param) };
} */