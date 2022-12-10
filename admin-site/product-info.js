let productImgs = document.getElementsByClassName("img-start-side");
let infoSide = document.getElementsByClassName(".info-side");
let link = document.getElementsByClassName(".info-side");
let goBack = document.getElementsByClassName("go-back");

//let uploadBtn = document.getElementById("#upload-btn");



for (let index = 0; index < productImgs.length; index++) {
  const element = productImgs[index];
  element.addEventListener("click", function(event) {
    event.target.parentElement.nextElementSibling.closest(".info-side").style.display = "flex";
    //event.target.closest(`div`).style.display = "none"
    document.body.style.overflow = "hidden"
    
  })
  
}

for (let index = 0; index < goBack.length; index++) {
  const element = goBack[index];

  element.addEventListener("click", function(event){
    event.target.parentElement.style.display = "none";
    document.body.style.overflow = "scroll"
    
  })
}

let choose = document.getElementById("btn-status")

choose.addEventListener("click", function(event){
 event.target.parentElement.nextElementSibling.style.display = "flex"
})






function askUser() {

  let checkboxes = document.querySelectorAll('input[name="del/status"]:checked');
    

  const element = document.activeElement;
  //console.log(element)

  if(element.classList.contains("btn")){
    let answer = confirm("Vill du ta bort eller ändra status?")
    return answer  
  }else{
    
  }
  //let checkboxes = document.querySelectorAll('input[name="del/status"]:checked');
  

};    


