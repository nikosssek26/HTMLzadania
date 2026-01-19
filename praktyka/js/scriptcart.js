// Inicjalizacja koszyka z pamięci przeglądarki
let cart = JSON.parse(localStorage.getItem('adminPanelCart')) || [];

// Funkcja dodawania produktu
function addToCart(name, price) {
    cart.push({ name: name, price: price });
    saveCart();
    renderCart();
    
    // Wizualne potwierdzenie (opcjonalne)
    alert("Added " + name + " to cart!");
}

// Funkcja usuwania produktu
function removeFromCart(index) {
    cart.splice(index, 1);
    saveCart();
    renderCart();
}

// Czyszczenie koszyka
function clearCart() {
    if(confirm("Empty your cart?")) {
        cart = [];
        saveCart();
        renderCart();
    }
}

// Zapisywanie do localStorage
function saveCart() {
    localStorage.setItem('adminPanelCart', JSON.stringify(cart));
}

// Wyświetlanie koszyka i aktualizacja UI
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
    
    // Aktualizacja licznika na pasku bocznym
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
    alert("Connecting to secure payment gateway...");
}

// Uruchom renderowanie po załadowaniu strony
document.addEventListener('DOMContentLoaded', renderCart);

// Dodaj 'main-content-cart' do tablicy sekcji w Twojej funkcji showContent
// Zaktualizuj funkcję showContent w scripts.js, aby zawierała nową sekcję:
// const sections = ['main-content', 'main-content-stats', 'main-content-users', 'main-content-settings', 'main-content-buy', 'main-content-cart'];