let productImgs = document.getElementsByClassName("img-start-side");
let goBack = document.getElementsByClassName("go-back");
let title = document.getElementsByClassName("title")




for (let index = 0; index < title.length; index++) {
  const element = title[index];
  element.addEventListener("click", function(event) {
    event.target.parentElement.parentElement.nextElementSibling.style.display = "flex";
    document.body.style.overflow = "hidden"

    
  })
  
}


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
