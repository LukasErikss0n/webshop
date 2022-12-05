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


//const checkBox = document.getElementsByClassName("checkbox");
const btn = document.querySelector('#btn');

btn.addEventListener('click', (event) => {
  let checkboxes = document.querySelectorAll('input[name="del/status"]:checked');

  let values = [];
  checkboxes.forEach((checkbox) => {
      if(checkbox.checked === true){
       values.push(checkbox.value);

       JSON.stringify(values)
       //console.log(values)

      }
      
  });
  alert(values);
});    

//console.log(checkBox.values)