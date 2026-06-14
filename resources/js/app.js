import Cart from './cart.js';
import Wishlist from './wishlist.js';

window.Cart = Cart;
window.Wishlist = Wishlist;

const CROSS_SVG = `<svg width="18" height="18" viewBox="0 0 18 18" fill="none" xmlns="http://www.w3.org/2000/svg">
  <path d="M13.5 4.5L4.5 13.5" stroke="#1A1A1A" stroke-width="1.33333" stroke-linecap="round" stroke-linejoin="round"/>
  <path d="M4.5 4.5L13.5 13.5" stroke="#1A1A1A" stroke-width="1.33333" stroke-linecap="round" stroke-linejoin="round"/>
</svg>`;

const HEART_OUTLINE = `<svg width="23" height="21" viewBox="0 0 23 21" fill="none" xmlns="http://www.w3.org/2000/svg"><path d="M20.0152 10.764L11.2652 19.43L2.51516 10.764C1.93802 10.2024 1.48341 9.52732 1.17997 8.78138C0.876525 8.03544 0.730818 7.23475 0.752023 6.42973C0.773228 5.62471 0.960886 4.8328 1.30318 4.10387C1.64547 3.37494 2.13499 2.72477 2.7409 2.19432C3.34681 1.66386 4.05599 1.26461 4.82378 1.0217C5.59157 0.778794 6.40134 0.69749 7.20209 0.78291C8.00285 0.868331 8.77724 1.11862 9.47652 1.51803C10.1758 1.91744 10.7848 2.45731 11.2652 3.10364C11.7476 2.462 12.3573 1.92685 13.0561 1.53168C13.7549 1.13651 14.5277 0.889833 15.3262 0.807082C16.1248 0.724331 16.9318 0.807289 17.6967 1.05077C18.4617 1.29424 19.1682 1.69299 19.772 2.22207C20.3758 2.75114 20.8638 3.39914 21.2057 4.12552C21.5475 4.85189 21.7357 5.64101 21.7585 6.44347C21.7813 7.24593 21.6383 8.04447 21.3383 8.7891C21.0383 9.53373 20.5879 10.2084 20.0152 10.771" stroke="#422928" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"/></svg>`;

const HEART_FILLED = `<svg width="23" height="21" viewBox="0 0 23 21" fill="none" xmlns="http://www.w3.org/2000/svg"><path d="M20.0152 10.764L11.2652 19.43L2.51516 10.764C1.93802 10.2024 1.48341 9.52732 1.17997 8.78138C0.876525 8.03544 0.730818 7.23475 0.752023 6.42973C0.773228 5.62471 0.960886 4.8328 1.30318 4.10387C1.64547 3.37494 2.13499 2.72477 2.7409 2.19432C3.34681 1.66386 4.05599 1.26461 4.82378 1.0217C5.59157 0.778794 6.40134 0.69749 7.20209 0.78291C8.00285 0.868331 8.77724 1.11862 9.47652 1.51803C10.1758 1.91744 10.7848 2.45731 11.2652 3.10364C11.7476 2.462 12.3573 1.92685 13.0561 1.53168C13.7549 1.13651 14.5277 0.889833 15.3262 0.807082C16.1248 0.724331 16.9318 0.807289 17.6967 1.05077C18.4617 1.29424 19.1682 1.69299 19.772 2.22207C20.3758 2.75114 20.8638 3.39914 21.2057 4.12552C21.5475 4.85189 21.7357 5.64101 21.7585 6.44347C21.7813 7.24593 21.6383 8.04447 21.3383 8.7891C21.0383 9.53373 20.5879 10.2084 20.0152 10.771" stroke="#422928" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round" fill="#422928"/></svg>`;

function fmt(n) {
    return Math.round(n) + '₴';
}

function imgSrc(image) {
    return image ? '/' + image : '/images/image.png';
}

// ── Wishlist buttons ───────────────────────────────────────────────────────

function initWishlistToggles() {
    document.querySelectorAll('.wishlist-toggle').forEach(btn => {
        const id = parseInt(btn.dataset.id);
        btn.innerHTML = Wishlist.has(id) ? HEART_FILLED : HEART_OUTLINE;
        btn.classList.toggle('active', Wishlist.has(id));

        btn.addEventListener('click', () => {
            const added = Wishlist.toggle({
                id,
                name:  btn.dataset.name,
                price: parseFloat(btn.dataset.price),
                image: btn.dataset.image,
                slug:  btn.dataset.slug,
            });
            btn.innerHTML = added ? HEART_FILLED : HEART_OUTLINE;
            btn.classList.toggle('active', added);
        });
    });
}

// ── Wishlist page ──────────────────────────────────────────────────────────

function renderWishlistPage() {
    const container = document.getElementById('wishlist-items');
    if (!container) return;

    const items = Wishlist.get();
    const emptyMsg = document.getElementById('wishlist-empty-msg');

    if (items.length === 0) {
        container.innerHTML = '';
        if (emptyMsg) emptyMsg.classList.remove('d-none');
        return;
    }

    if (emptyMsg) emptyMsg.classList.add('d-none');

    container.innerHTML = items.map(item => `
<div class="col-md-3 col-6">
  <div class="product-card card border-0 shadow-sm rad-16">
    <button class="like wishlist-toggle active" style="background:none;border:none;cursor:pointer;"
      data-id="${item.id}" data-name="${item.name}" data-price="${item.price}" data-image="${item.image || ''}" data-slug="${item.slug}">
      ${HEART_FILLED}
    </button>
    <a href="/product/${item.slug}">
      <img src="${imgSrc(item.image)}" class="card-img-top" alt="${item.name}">
    </a>
    <div class="card-body">
      <h6 class="card-title">
        <a href="/product/${item.slug}" class="text-decoration-none text-dark">${item.name}</a>
      </h6>
      <div class="wrapper__price_buy">
        <h4 class="price">${fmt(parseFloat(item.price))}</h4>
        <button class="btn buy rad-12 catalog-add-btn"
          data-id="${item.id}" data-name="${item.name}" data-price="${item.price}" data-image="${item.image || ''}" data-slug="${item.slug}">
          <span>Купити</span>
        </button>
      </div>
    </div>
  </div>
</div>`).join('');

    // Init wishlist toggles on freshly rendered items
    container.querySelectorAll('.wishlist-toggle').forEach(btn => {
        btn.addEventListener('click', () => {
            Wishlist.toggle({ id: parseInt(btn.dataset.id), name: btn.dataset.name, price: parseFloat(btn.dataset.price), image: btn.dataset.image, slug: btn.dataset.slug });
            renderWishlistPage();
        });
    });

    // Init add-to-cart buttons
    container.querySelectorAll('.catalog-add-btn').forEach(btn => {
        btn.addEventListener('click', () => {
            Cart.add({ id: parseInt(btn.dataset.id), name: btn.dataset.name, price: parseFloat(btn.dataset.price), image: btn.dataset.image, slug: btn.dataset.slug });
            const saved = btn.innerHTML;
            btn.textContent = '✓';
            btn.disabled = true;
            setTimeout(() => { btn.innerHTML = saved; btn.disabled = false; }, 1500);
        });
    });
}

// ── Cart page ──────────────────────────────────────────────────────────────

function renderCartPage() {
    const container = document.getElementById('dynamic-cart-items');
    if (!container) return;

    const items = Cart.get();
    const emptyMsg = document.getElementById('cart-empty-msg');
    const subtotalEl = document.getElementById('cart-subtotal');
    const totalEl = document.getElementById('cart-total');

    if (items.length === 0) {
        container.innerHTML = '';
        if (emptyMsg) emptyMsg.classList.remove('d-none');
        if (subtotalEl) subtotalEl.textContent = '0₴';
        if (totalEl) totalEl.textContent = '0₴';
        return;
    }

    if (emptyMsg) emptyMsg.classList.add('d-none');

    container.innerHTML = items.map(item => `
<div class="cart-item d-flex align-items-center gap-3 bg-white p-2-5 rad-16" data-id="${item.id}">
  <img src="${imgSrc(item.image)}" alt="${item.name}" class="product-img">
  <div class="flex-grow-1">
    <h6>${item.name}</h6>
    <div class="d-flex align-items-center gap-2 mt-2 rad-12 count_rates">
      <button class="btn btn-sm cart-dec" data-id="${item.id}">-</button>
      <span class="mx-2 cart-qty">${item.qty}</span>
      <button class="btn btn-sm cart-inc" data-id="${item.id}">+</button>
    </div>
  </div>
  <div class="text-end d-flex flex-column">
    <button class="btn btn-link text-danger cart-remove-btn" data-id="${item.id}">
      <i class="cross">${CROSS_SVG}</i>
    </button>
    <div class="fw-medium">${fmt(parseFloat(item.price) * item.qty)}</div>
  </div>
</div>`).join('');

    container.querySelectorAll('.cart-inc').forEach(btn =>
        btn.addEventListener('click', () => {
            const id = parseInt(btn.dataset.id);
            const item = Cart.get().find(i => i.id === id);
            if (item) { Cart.update(id, item.qty + 1); renderCartPage(); }
        })
    );

    container.querySelectorAll('.cart-dec').forEach(btn =>
        btn.addEventListener('click', () => {
            const id = parseInt(btn.dataset.id);
            const item = Cart.get().find(i => i.id === id);
            if (item) { Cart.update(id, item.qty - 1); renderCartPage(); }
        })
    );

    container.querySelectorAll('.cart-remove-btn').forEach(btn =>
        btn.addEventListener('click', () => {
            window._pendingRemoveId = parseInt(btn.dataset.id);
            bootstrap.Modal.getOrCreateInstance(document.getElementById('infoModal')).show();
        })
    );

    const total = Cart.total();
    if (subtotalEl) subtotalEl.textContent = fmt(total);
    if (totalEl) totalEl.textContent = fmt(total);
}

// ── Order page ─────────────────────────────────────────────────────────────

function syncOrderHiddenInputs() {
    const items = Cart.get();
    const itemsInput = document.getElementById('order-items-input');
    const totalInput = document.getElementById('order-total-input');
    if (itemsInput) itemsInput.value = JSON.stringify(items);
    if (totalInput) totalInput.value = Cart.total().toFixed(2);
}

function renderOrderPage() {
    const container = document.getElementById('order-items-container');
    const totalDisplay = document.getElementById('order-total-display');
    const subtotalDisplay = document.getElementById('order-subtotal-display');

    const items = Cart.get();

    if (container) {
        container.innerHTML = items.length === 0
            ? '<p class="text-muted py-2">Кошик порожній</p>'
            : items.map(item => `
<div class="cart-item d-flex align-items-center gap-3 bg-white p-2-5 rad-16">
  <img src="${imgSrc(item.image)}" alt="${item.name}" class="product-img">
  <div class="flex-grow-1">
    <h6>${item.name}</h6>
    <small class="text-muted">${item.qty} шт.</small>
  </div>
  <div class="fw-medium">${fmt(parseFloat(item.price) * item.qty)}</div>
</div>`).join('');
    }

    const total = Cart.total();
    if (subtotalDisplay) subtotalDisplay.textContent = fmt(total);
    if (totalDisplay) totalDisplay.textContent = fmt(total);

    syncOrderHiddenInputs();
}

// ── Product page ───────────────────────────────────────────────────────────

function initProductPage() {
    const dataEl = document.getElementById('product-data');
    if (!dataEl) return;

    let product;
    try { product = JSON.parse(dataEl.textContent); } catch { return; }

    const counterValue = document.querySelector('.counter .value');
    const addBtn = document.querySelector('.add_incart');

    document.querySelector('.counter .minus')?.addEventListener('click', () => {
        const v = parseInt(counterValue.textContent);
        if (v > 1) counterValue.textContent = v - 1;
    });

    document.querySelector('.counter .plus')?.addEventListener('click', () => {
        counterValue.textContent = parseInt(counterValue.textContent) + 1;
    });

    if (addBtn) {
        addBtn.addEventListener('click', () => {
            const qty = parseInt(counterValue?.textContent || '1');
            for (let i = 0; i < qty; i++) Cart.add(product);
            const saved = addBtn.innerHTML;
            addBtn.textContent = 'Додано до кошика ✓';
            addBtn.disabled = true;
            setTimeout(() => { addBtn.innerHTML = saved; addBtn.disabled = false; }, 2000);
        });
    }
}

// ── Bootstrap ──────────────────────────────────────────────────────────────

document.addEventListener('DOMContentLoaded', () => {
    Cart._updateBadge();
    Wishlist._updateBadge();

    // Delete confirm
    const confirmDeleteBtn = document.getElementById('confirmDeleteBtn');
    if (confirmDeleteBtn) {
        confirmDeleteBtn.addEventListener('click', () => {
            if (window._pendingRemoveId != null) {
                Cart.remove(window._pendingRemoveId);
                window._pendingRemoveId = null;
                bootstrap.Modal.getInstance(document.getElementById('infoModal'))?.hide();
                renderCartPage();
            }
        });
    }

    if (document.getElementById('dynamic-cart-items')) renderCartPage();

    const orderForm = document.getElementById('order-form');
    if (orderForm) {
        renderOrderPage();
        orderForm.addEventListener('submit', syncOrderHiddenInputs);
    }

    if (document.getElementById('wishlist-items')) renderWishlistPage();

    initProductPage();
    initWishlistToggles();

    document.querySelectorAll('.catalog-add-btn').forEach(btn => {
        btn.addEventListener('click', () => {
            Cart.add({
                id:    parseInt(btn.dataset.id),
                name:  btn.dataset.name,
                price: parseFloat(btn.dataset.price),
                image: btn.dataset.image,
                slug:  btn.dataset.slug,
            });
            const saved = btn.innerHTML;
            btn.textContent = '✓';
            btn.disabled = true;
            setTimeout(() => { btn.innerHTML = saved; btn.disabled = false; }, 1500);
        });
    });
});
