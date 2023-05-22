let goBack = document.getElementsByClassName("go-back");






//gör så att man kan klicka på olika saker på produkten för att få mer info om den, tar sedan idet utifrån valuet som finns 
const title = document.querySelectorAll('.title');

title.forEach(img => {
  img.addEventListener('click', handleClick);
});

const price = document.querySelectorAll('.price');

price.forEach(img => {
  img.addEventListener('click', handleClick);
});

const productImgs = document.querySelectorAll('.img-start-side');

productImgs.forEach(img => {
  img.addEventListener('click', handleClick);
});
function handleClick(event) {
  const value = event.target.getAttribute('value');
  window.location.href = "product-spec.php?id=" + value;
}



