const CART_KEY = 'pelovit_cart';

const Cart = {
    get() {
        try {
            return JSON.parse(localStorage.getItem(CART_KEY) || '[]');
        } catch {
            return [];
        }
    },

    _save(items) {
        localStorage.setItem(CART_KEY, JSON.stringify(items));
        this._updateBadge();
    },

    add(product) {
        const items = this.get();
        const existing = items.find(i => i.id === product.id);
        if (existing) {
            existing.qty += 1;
        } else {
            items.push({
                id: product.id,
                name: product.name,
                price: product.price,
                image: product.image,
                slug: product.slug,
                qty: 1,
            });
        }
        this._save(items);
    },

    remove(id) {
        this._save(this.get().filter(i => i.id !== id));
    },

    update(id, qty) {
        const items = this.get();
        const item = items.find(i => i.id === id);
        if (item) {
            item.qty = Math.max(1, qty);
            this._save(items);
        }
    },

    clear() {
        localStorage.removeItem(CART_KEY);
        this._updateBadge();
    },

    count() {
        return this.get().reduce((sum, i) => sum + (i.qty || 1), 0);
    },

    total() {
        return this.get().reduce((sum, i) => sum + parseFloat(i.price) * (i.qty || 1), 0);
    },

    _updateBadge() {
        const badge = document.getElementById('cart-count');
        if (!badge) return;
        const c = this.count();
        badge.textContent = c;
        badge.classList.toggle('d-none', c === 0);
    },
};

export default Cart;
