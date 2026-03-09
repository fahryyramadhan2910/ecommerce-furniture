import Alpine from 'alpinejs';
import './bootstrap';

window.Alpine = Alpine;

// Cart management
Alpine.store('cart', {
    count: parseInt(localStorage.getItem('cartCount') || '0'),
    updateCount(n) {
        this.count = n;
        localStorage.setItem('cartCount', n);
    }
});

Alpine.start();
