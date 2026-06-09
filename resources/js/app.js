import Cart from './cart.js';

window.Cart = Cart;

const CROSS_SVG = `<svg width="18" height="18" viewBox="0 0 18 18" fill="none" xmlns="http://www.w3.org/2000/svg">
  <path d="M13.5 4.5L4.5 13.5" stroke="#1A1A1A" stroke-width="1.33333" stroke-linecap="round" stroke-linejoin="round"/>
  <path d="M4.5 4.5L13.5 13.5" stroke="#1A1A1A" stroke-width="1.33333" stroke-linecap="round" stroke-linejoin="round"/>
</svg>`;

function fmt(n) {
    return Math.round(n) + '₴';
}

function imgSrc(image) {
    return image ? '/products/' + image : '/images/image.png';
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

    initProductPage();
});
