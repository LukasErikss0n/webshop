let productImg = document.getElementsByClassName(".img-start-side");
let infoSide = document.getElementsByClassName(".info-side");
let link = document.getElementsByClassName(".go-back");


console.log(productImg);


document.body.onclick = function (event) {
    if (event.target.classList.contains("img-start-side")) {
        event.target.parentElement.nextElementSibling.closest(".info-side").style.display = "flex";
      //fixa så att man kan gå ut från produkten 
    }

}