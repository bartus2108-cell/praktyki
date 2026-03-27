const API_URL = 'api.php';

async function fetchProducts(){
    const response = await fetch(API_URL + "?action=get_products");
    const products = await response.json();
    displayProducts(products);
}

async function addToCart(productId){
    const response = await fetch(API_URL + `?action=add_to_cart&product_id=${productId}`);
    const result = await response.json();
    updateCart(result.cart);
}

function displayProducts(products){
    const productsDiv = document.getElementById("products");
    productsDiv.innerHTML = "<h2>Produkty</h2>";
    products.forEach(product => {
        productsDiv.innerHTML += `<p>${product.name} - ${product.price} PLN <button onclick="addToCart(${product.id})">Dodaj do koszyka</button></p>`;
    });
}

function updateCart(cart){
    const cartDiv = document.getElementById("cart");
    cartDiv.innerHTML = "<h2>Koszyk</h2>";
    cart.forEach(item => {
        cartDiv.innerHTML += `<p>${item.name} - ${item.price} PLN</p>`;
    });
}

fetchProducts();