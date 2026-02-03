export default function initInsightAccordion() {
    const container = document.querySelector('.js-accordion-container');
    if (!container) return;

    const items = container.querySelectorAll('.accordion-item');

    items.forEach((item, index) => {
        const content = item.querySelector('.accordion-item__content');
        content.style.overflow = 'hidden';
        content.style.transition = 'max-height 0.3s ease';

        const expandBtn = item.querySelector('.accordion-item__expand-btn'); // кнопка “Збільшити текст”

        // Ініціалізація: перший відкритий
        if (index === 0 || item.classList.contains('is-open')) {
            item.classList.add('is-open');
            content.style.maxHeight = content.scrollHeight + 'px';
            if (expandBtn) expandBtn.style.display = 'none'; // приховуємо кнопку
        } else {
            content.style.maxHeight = '0';
        }
    });

    container.addEventListener('click', e => {
        const trigger = e.target.closest('.js-accordion-trigger');
        if (!trigger) return;

        const item = trigger.closest('.accordion-item');
        const content = item.querySelector('.accordion-item__content');
        const expandBtn = item.querySelector('.accordion-item__expand-btn');
        const isOpen = item.classList.contains('is-open');

        // Закриваємо всі інші
        items.forEach(otherItem => {
            if (otherItem !== item) {
                const otherContent = otherItem.querySelector('.accordion-item__content');
                const otherBtn = otherItem.querySelector('.accordion-item__expand-btn');
                otherContent.style.maxHeight = '0';
                otherItem.classList.remove('is-open');
                if (otherBtn) otherBtn.style.display = ''; // показуємо кнопку, якщо була прихована
            }
        });

        if (isOpen) {
            content.style.maxHeight = '0';
            item.classList.remove('is-open');
            if (expandBtn) expandBtn.style.display = ''; // показуємо кнопку
        } else {
            requestAnimationFrame(() => {
                content.style.maxHeight = content.scrollHeight + 'px';
                item.classList.add('is-open');
                if (expandBtn) expandBtn.style.display = 'none'; // приховуємо кнопку
            });
        }
    });
}
