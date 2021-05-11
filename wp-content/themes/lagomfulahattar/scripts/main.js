window.addEventListener("load", initSite)


function initSite() {
  
    createArrow()
   
   // flipArrow()
    console.log("innit done blaha")
}


let snapWrap = document.getElementById("snapWrap")
let main = document.getElementsByTagName("main")[0]
let arrow = document.getElementById("arrow")
let body = document.getElementsByTagName("BODY")[0];
let productContainers = document.getElementsByClassName("wc-block-grid__products");



function createArrow() {
    let container = document.getElementsByClassName("wc-block-grid__products")
    for(let i = 0; i < container.length; i++) {
        let children = container[i].childNodes
        if(children.length > 3) {
            let topParent = container[i].parentNode.parentNode.parentNode
            let arrow = document.createElement("i")
            arrow.classList = "fas fa-arrow-down bounce"
            topParent.appendChild(arrow)
            flipArrow(children)
      }
}

}

function flipArrow(children) {
  let lastChild = children[children.length-1]
  let notLastChild = children[children.length-4]
  objectInView(lastChild, "fas fa-arrow-down rotate")
  objectInView(notLastChild, "fas fa-arrow-down bounce")
} 

function objectInView(param, addClass) {
    
    let observer = new IntersectionObserver((entries, observer) => { 
      entries.forEach(entry => {
        if(entry.isIntersecting){
                let parent = entry.target.parentNode.parentNode.parentNode.parentNode
                let childrenOfParent = parent.childNodes
                let arrow = childrenOfParent[childrenOfParent.length-1]
             //   console.log("arrow: ", arrow)
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