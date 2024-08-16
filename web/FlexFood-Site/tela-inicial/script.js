let cart = [];

function addToCart(item, price) {
    cart.push({ item: item, price: price });
    displayCart();
}

function displayCart() {
    const cartDiv = document.getElementById('cart');
    cartDiv.innerHTML = '';

    if (cart.length === 0) {
        cartDiv.innerHTML = '<p>O carrinho está vazio.</p>';
        return;
    }

    let total = 0;
    cart.forEach((cartItem, index) => {
        total += cartItem.price;
        cartDiv.innerHTML += `<p>${cartItem.item} - R$${cartItem.price.toFixed(2)} <button onclick="removeFromCart(${index})">Remover</button></p>`;
    });

    cartDiv.innerHTML += `<p>Total: R$${total.toFixed(2)}</p>`;
}

function removeFromCart(index) {
    cart.splice(index, 1);
    displayCart();
}
