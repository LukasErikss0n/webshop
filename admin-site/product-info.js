let productImgs = document.getElementsByClassName("img-start-side");
let infoSide = document.getElementsByClassName(".info-side");
let link = document.getElementsByClassName(".info-side");
let goBack = document.getElementsByClassName("go-back");



for (let index = 0; index < productImgs.length; index++) {
  const element = productImgs[index];
  element.addEventListener("click", function(event) {
    event.target.parentElement.nextElementSibling.closest(".info-side").style.display = "flex";
  })
  
}

for (let index = 0; index < goBack.length; index++) {
  const element = goBack[index];

  element.addEventListener("click", function(event){
    event.target.parentElement.style.display = "none";
  })
}


function askUser() {
  let checkboxes = document.querySelectorAll('input[name="del/status"]:checked');
  let answer = confirm("Vill du ta bort?")
  return answer
  

};    