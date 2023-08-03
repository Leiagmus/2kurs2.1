const buybuttonn = document.querySelectorAll('.product__btn');
const cartProductsList+ document.querySelector('.cart-content__list');
const cart = document.querySelector('.cart');
const cartQuantity = document.querySelector('.cart__quantity');
const fullPrice = document.querySelector('.fullprice'); 
let price = 0;

const randomId = () => {
	return Math.random().toString(36).substring(2, 15) + Math.random().toString(36).substring(2, 15);
};

const priceWithoutSpaces = (str) => {
	
	return str.replace(/\s/g, '');
};

const normalPrice = (str) => {
	return String(str).replace(/(\d)(?=(\d\d\d)+([^\d]|$))/g, '$1');
	
};

const generateCartProduct = (img, title, price, id) =>{
	
	return '
	<li class= "cart-content__item" data = simplebar>
						<article class="cart-content__product cart-product" data-id="${id}">
							<img src="${img}" alt="" class="cart-product__img">
							<div class="cart-product__text"></div>
							<h3 class="cart-product__title">${title}</h3>
							<span class="cart-product__price">${price}</span>
							<button class="cart-product__delete" aria-label="Удалить Товар" ></button>
					</article>
					</li>
	
	';
	
}