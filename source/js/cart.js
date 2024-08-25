document.getElementById('cart-icon').addEventListener('click', () => {
    document.getElementById('cart-sidebar').classList.toggle('open');
});

document.getElementById('close-cart').addEventListener('click', () => {
    document.getElementById('cart-sidebar').classList.remove('open');
});


let cart = JSON.parse(localStorage.getItem('cart')) || [];


document.querySelectorAll('.btn[data-id]').forEach(button => {
    button.addEventListener('click', (event) => {
        const productId = event.target.getAttribute('data-id');
        const productName = event.target.getAttribute('data-name');
        const productPrice = parseFloat(event.target.getAttribute('data-price'));
        addToCart(productId, productName, productPrice);
    });
});

function addToCart(productId, productName, productPrice) {
    const existingItem = cart.find(item => item.id === productId);
    if (existingItem) {
        existingItem.quantity += 1;
    } else {
        cart.push({ id: productId, name: productName, price: productPrice, quantity: 1 });
    }
    saveCart();
    renderCart();
}

function removeFromCart(productId) {
    cart = cart.filter(item => item.id != productId); 
    saveCart();
    renderCart();
}

function saveCart() {
    localStorage.setItem('cart', JSON.stringify(cart));
}

function renderCart() {
    const cartItemsContainer = document.getElementById('cart-items');
    cartItemsContainer.innerHTML = '';
    let total = 0;

    cart.forEach(item => {
        const itemTotal = item.price * item.quantity;
        total += itemTotal;

        const cartItem = document.createElement('div');
        cartItem.classList.add('cart-item');
        cartItem.innerHTML = `
            <h6>${item.name} (x${item.quantity})</h6>
            <div>
                <span>Rs ${itemTotal.toFixed(2)}</span>
                <button onclick="removeFromCart(${item.id})">&times;</button>
            </div>
        `;
        cartItemsContainer.appendChild(cartItem);
    });

    document.getElementById('cart-total').textContent = `Rs ${total.toFixed(2)}`;
}


renderCart();