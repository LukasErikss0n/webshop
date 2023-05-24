let productImgs = document.getElementsByClassName("img-start-side");
let goBack = document.getElementsByClassName("go-back");




for (let index = 0; index < productImgs.length; index++) {
  const element = productImgs[index];
  element.addEventListener("click", function(event) {
    event.target.parentElement.nextElementSibling.closest(".info-side").style.display = "flex";
    document.body.style.overflow = "hidden"
    
  })
  
}

for (let index = 0; index < goBack.length; index++) {
  const element = goBack[index];

  element.addEventListener("click", function(event){
    event.target.parentElement.style.display = "none";
    document.body.style.overflowY = "scroll"
    
  })
}

let choose = document.getElementById("btn-status")

choose.addEventListener("click", function(event){
 event.target.parentElement.nextElementSibling.nextElementSibling.style.display = "flex"
})


let delConfirm = document.getElementById("btn")

delConfirm.addEventListener("click", function(event){
  event.target.parentElement.nextElementSibling.style.display = "flex"
})





function askUser() {
  const element = document.activeElement;

  if(element.classList.contains("btn-confirm")){
    return true  
  }else if(element.classList.contains("btn-abort")){
    return true
  }
  

};    


