const WISHLIST_KEY = 'pelovit_wishlist';

const Wishlist = {
    get() {
        try {
            return JSON.parse(localStorage.getItem(WISHLIST_KEY) || '[]');
        } catch {
            return [];
        }
    },

    _save(items) {
        localStorage.setItem(WISHLIST_KEY, JSON.stringify(items));
        this._updateBadge();
    },

    has(id) {
        return this.get().some(i => i.id === id);
    },

    toggle(product) {
        const items = this.get();
        const idx = items.findIndex(i => i.id === product.id);
        if (idx >= 0) {
            items.splice(idx, 1);
        } else {
            items.push({ id: product.id, name: product.name, price: product.price, image: product.image, slug: product.slug });
        }
        this._save(items);
        return idx < 0;
    },

    remove(id) {
        this._save(this.get().filter(i => i.id !== id));
    },

    count() {
        return this.get().length;
    },

    _updateBadge() {
        const badge = document.getElementById('wishlist-count');
        if (!badge) return;
        const c = this.count();
        badge.textContent = c;
        badge.classList.toggle('d-none', c === 0);
    },
};

export default Wishlist;
