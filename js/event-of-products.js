let goBack = document.getElementsByClassName("go-back");






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

