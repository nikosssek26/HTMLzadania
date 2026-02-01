let cart = JSON.parse(localStorage.getItem('adminPanelCart')) || [];

function addToCart(name, price) {
    cart.push({ name: name, price: price });
    saveCart();
    renderCart();
    
    alert("Added " + name + " to cart!");
}

function removeFromCart(index) {
    cart.splice(index, 1);
    saveCart();
    renderCart();
}

function clearCart() {
    if(confirm("Empty your cart?")) {
        cart = [];
        saveCart();
        renderCart();
    }
}

function clearCart2() {
        cart = [];
        saveCart();
        renderCart();
}

function saveCart() {
    localStorage.setItem('adminPanelCart', JSON.stringify(cart));
}

function renderCart() {
    const listElement = document.getElementById('cart-items-list');
    const totalElement = document.getElementById('cart-total-price');
    const countBadge = document.getElementById('cart-count');
    
    if (!listElement) return;

    listElement.innerHTML = '';
    let total = 0;

    cart.forEach((item, index) => {
        total += item.price;
        listElement.innerHTML += `
            <tr>
                <td><i class="fa-solid fa-server me-2 accenttextcolor"></i> ${item.name}</td>
                <td class="fw-bold">${item.price.toFixed(2)}$</td>
                <td>
                    <button class="btn btn-sm btn-outline-danger" onclick="removeFromCart(${index})">
                        <i class="fa-solid fa-trash"></i>
                    </button>
                </td>
            </tr>
        `;
    });

    if (cart.length === 0) {
        listElement.innerHTML = '<tr><td colspan="3" class="text-center text-muted">Your cart is empty.</td></tr>';
    }

    totalElement.innerText = total.toFixed(2) + "$";
    
    if (cart.length > 0) {
        countBadge.innerText = cart.length;
        countBadge.style.display = 'inline-block';
    } else {
        countBadge.style.display = 'none';
    }
}

function checkout() {
    if (cart.length === 0) {
        alert("Cart is empty!");
        return;
    }
    cart = [];
    alert("Connecting to secure payment gateway..."); 
}

document.addEventListener('DOMContentLoaded', renderCart);