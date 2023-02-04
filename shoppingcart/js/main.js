$.ajax({
	type: 'post',
	url: '../../obtenerlibros.php',
  
	success: function (response) {
	 // We get the element having id of display_info and put the response inside it
		 alert(response);
	}
	});




//  $(document).ready(function () {
//  	$.ajax({
//   type: 'GET',
//   url: './obtenerlibros.php',
//   dataType: 'json',
//   success: function (data) {
//     console.log(data);
//   }
// });
//  });	




//variables
const cartBtn = document.querySelector('.cart-btn');
const closeBtn = document.querySelector('.close-cart');
const clearBtn = document.querySelector('.clear-cart');
const cartDOM = document.querySelector('.cart');
const cartOverlay = document.querySelector('.cart-overlay');
const cartItems = document.querySelector('.cart-items');
const cartTotal = document.querySelector('.cart-total');
const cartContent = document.querySelector('.cart-content');
const productsDOM = document.querySelector('.products-center');

let cart = [];

class Productos{
	async getProductos(){
		try{
			let result = await fetch('productos.json');




			let data = await result.json();
			let productos = data.items;
			productos = productos.map(item => {
				const {title, price} = item.fields;
				const {id} = item.sys
				const image = item.fields.image.fields.file.url;
				return {title, price, id,image}
			});
			return productos;
		}catch(error){
			console.log(error);
		}

		
	}
} 

class UI{

}

class Storage{

}

document.addEventListener("DOMContentLoaded",()=>{
	const ui = new UI();
	const productos = new Productos();

	productos.getProductos().then(data=> console.log(data));
})