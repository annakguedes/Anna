const labels = document.querySelectorAll('.form-control label')

labels.forEach(label => {
  label.innerHTML = label.innerText
  .split('')
  .map((letter, idx) => `<span style="transition-delay:${idx*30}ms">${letter}</span>`)
  .join('')
})


let navbar = document.querySelector('.navbar');

document.querySelector('#inicio-btn').onclick = () =>{
    navbar.classList.toggle('active');
    searchForm.classList.remove('active');
    cartItem.classList.remove('active');
}

let searchForm = document.querySelector('.search-form');

document.querySelector('#search-btn').onclick = () =>{
    searchForm.classList.toggle('active');
    navbar.classList.remove('active');
    cartItem.classList.remove('active');
}

let cartItem = document.querySelector('.cart-items-container');

document.querySelector('#cart-btn').onclick = () =>{
    cartItem.classList.toggle('active');
    navbar.classList.remove('active');
    searchForm.classList.remove('active');
}

window.onscroll = () =>{
    navbar.classList.remove('active');
    searchForm.classList.remove('active');
    cartItem.classList.remove('active');
}