export default function initCategoryNavigation() {
    const container = document.querySelector('.block-category-navigation');
    if (!container) return;

    const industryList = container.querySelector('#industryList');
    const cardImage = container.querySelector('#cardImage');
    const cardTitle = container.querySelector('#cardTitle');
    const cardDesc  = container.querySelector('#cardDesc');
    const cardLink  = container.querySelector('#cardLink'); // Твоя кнопка/лінк всередині
    const industryCard = container.querySelector('#industryCard'); // Тег <a> навколо всієї картки

    function updateCard(data) {
        if (!cardImage) return;

        cardImage.style.opacity = '0';
        setTimeout(() => {
            cardImage.src = data.image;
            cardImage.alt = data.title;
            
            // Оновлюємо посилання навколо всієї картки
            if (industryCard) {
                industryCard.href = data.link;
            }

            if (cardTitle) {
                const arrow = cardTitle.querySelector('.arrow-icon');
                cardTitle.textContent = data.title + ' ';
                if (arrow) cardTitle.appendChild(arrow);
            }
            
            if (cardDesc) cardDesc.textContent = data.desc;
            
            // Оновлюємо посилання в кнопці (якщо вона є окремо)
            if (cardLink) cardLink.href = data.link;

            cardImage.onload = () => cardImage.style.opacity = '1';
            if (cardImage.complete) cardImage.style.opacity = '1';
        }, 200);
    }

    industryList.addEventListener('click', function(e) {
        const targetLi = e.target.closest('li');
        if (!targetLi) return;

        e.stopPropagation();

        // 1. Клік по ПІДПУНКТУ
        if (targetLi.classList.contains('category-navigation__subitem')) {
            container.querySelectorAll('.category-navigation__subitem').forEach(s => s.classList.remove('active'));
            targetLi.classList.add('active');
            updateCard(targetLi.dataset);
            return;
        }

        // 2. Клік по ОСНОВНОМУ ПУНКТУ
        if (targetLi.classList.contains('category-navigation__nav-item')) {
            container.querySelectorAll('.category-navigation__nav-item').forEach(li => li.classList.remove('active'));
            container.querySelectorAll('.category-navigation__subitem').forEach(sub => sub.classList.remove('active'));
            
            targetLi.classList.add('active');
            updateCard(targetLi.dataset);
        }
    });
}