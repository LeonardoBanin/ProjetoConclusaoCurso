const pricePerItem = 4.99;
let quantity = 1;

// Referências dos elementos
const quantityDisplay = document.getElementById('quantity');
const itemPriceDisplay = document.getElementById('item-price');
const totalPriceDisplay = document.getElementById('total-price');

// Botões
const subtractBtn = document.getElementById('subtract');
const addBtn = document.getElementById('add');
const deleteItemBtn = document.getElementById('delete-item');

// Função para atualizar a quantidade e o preço total
function updatePrice() {
    const totalItemPrice = (pricePerItem * quantity).toFixed(2);
    quantityDisplay.textContent = quantity;
    itemPriceDisplay.textContent = `R$ ${totalItemPrice}`;
    totalPriceDisplay.textContent = `R$ ${totalItemPrice}`;
}

// Adicionar item
addBtn.addEventListener('click', () => {
    quantity++;
    updatePrice();
});

// Remover item
subtractBtn.addEventListener('click', () => {
    if (quantity > 1) {
        quantity--;
        updatePrice();
    }
});

// Remover produto do carrinho
deleteItemBtn.addEventListener('click', () => {
    quantity = 0;
    updatePrice();
    document.querySelector('.cart-item').style.display = 'none';
    totalPriceDisplay.textContent = 'R$ 0,00';
});
