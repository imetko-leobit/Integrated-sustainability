export default function initAccordion() {
    const containers = document.querySelectorAll('.js-accordion-container');

    containers.forEach(container => {
        const items = container.querySelectorAll('.accordion-item');

        // Ініціалізація: перший відкритий
        items.forEach((item, index) => {
            const content = item.querySelector('.accordion-item__content');
            content.style.overflow = 'hidden';
            content.style.transition = 'max-height 0.3s ease';

            if (index === 0 || item.classList.contains('is-open')) {
                item.classList.add('is-open');
                content.style.maxHeight = content.scrollHeight + 'px';
            } else {
                content.style.maxHeight = '0';
            }
        });

        // Обробка кліку
        container.addEventListener('click', e => {
            const trigger = e.target.closest('.js-accordion-trigger');
            if (!trigger) return;

            const item = trigger.closest('.accordion-item');
            const content = item.querySelector('.accordion-item__content');
            const isOpen = item.classList.contains('is-open');

            // Закриваємо всі інші
            items.forEach(otherItem => {
                if (otherItem !== item) {
                    const otherContent = otherItem.querySelector('.accordion-item__content');
                    otherContent.style.maxHeight = '0';
                    otherItem.classList.remove('is-open');
                }
            });

            if (isOpen) {
                content.style.maxHeight = '0';
                item.classList.remove('is-open');
            } else {
                // Встановлюємо maxHeight після repaint
                requestAnimationFrame(() => {
                    content.style.maxHeight = content.scrollHeight + 'px';
                    item.classList.add('is-open');
                });
            }
        });
    });
}
