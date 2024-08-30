let totalValue = 0;

function addToCart(itemName, itemPrice) {
    const cart = document.getElementById('cart');
    const totalValueElement = document.getElementById('total-value');
    const emptyCartMessage = document.getElementById('empty-cart-message');

    // Remover a mensagem de carrinho vazio, se presente
    if (emptyCartMessage) {
        emptyCartMessage.style.visibility = 'hidden';
    }

    // Criar a estrutura do item no carrinho
    const cartItem = document.createElement('div');
    cartItem.className = 'cart-item';

    const itemText = document.createElement('p');
    itemText.textContent = `${itemName} - R$${itemPrice.toFixed(2)}`;

    const deleteButton = document.createElement('button');
    deleteButton.innerHTML = '🗑️'; // Ícone de lixo
    deleteButton.onclick = function() {
        removeFromCart(cartItem, itemPrice);
    };

    cartItem.appendChild(itemText);
    cartItem.appendChild(deleteButton);
    cart.appendChild(cartItem);

    // Atualizar o valor total
    totalValue += itemPrice;
    totalValueElement.textContent = totalValue.toFixed(2);
}

function removeFromCart(cartItem, itemPrice) {
    const cart = document.getElementById('cart');
    const totalValueElement = document.getElementById('total-value');

    // Remover o item do carrinho
    cart.removeChild(cartItem);

    // Atualizar o valor total
    totalValue -= itemPrice;
    totalValueElement.textContent = totalValue.toFixed(2);

    // Mostrar mensagem se o carrinho estiver vazio
    if (cart.children.length === 0) {
        const emptyCartMessage = document.getElementById('empty-cart-message');
        emptyCartMessage.style.visibility = 'visible';
    }
}