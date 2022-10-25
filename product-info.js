let productImgs = document.getElementsByClassName("img-start-side");
let infoSide = document.getElementsByClassName(".info-side");
let link = document.getElementsByClassName(".info-side");


console.log(productImgs);

for (let index = 0; index < productImgs.length; index++) {
  const element = productImgs[index];
  element.addEventListener("click", function(event) {
    event.target.parentElement.nextElementSibling.closest(".info-side").style.display = "flex";
    //alert("Klickade på bilden")
  })
  
}


for (let index = 0; index < link.length; index++) {
  const element = link[index];

  element,addEventListener("click", function(event){
    if(event.target.chiledElement(".info-side")){
      
      console.log("klickad")
    }
  })
  
}