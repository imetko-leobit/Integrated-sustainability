document.addEventListener('DOMContentLoaded', () => {

    const DESKTOP_BREAKPOINT = '(min-width: 1200px)';

    // 2. Функція для перевірки, чи це десктоп
    const isDesktop = () => window.matchMedia(DESKTOP_BREAKPOINT).matches;

    const rotatorContainer = document.querySelector('.js-project-card-rotator');
    if (!rotatorContainer) return;

    const rotationSequence = ['P1', 'P2', 'P3', 'P4', 'P5']; // P1 -> P2 -> P3 -> P4 -> P5 -> P1
    
    const positionToClass = {
        'P1': 'card__container--full',
        'P2': 'card__container--half-simple',
        'P3': 'card__container--small-left',
        'P4': 'card__container--small-right',
        'P5': 'card__container--half',
    };

    const cards = Array.from(rotatorContainer.querySelectorAll('.card__container'));
    const interval = parseInt(rotatorContainer.dataset.rotationInterval, 10) || 7000;

    const rotateCards = () => {
        cards.forEach(card => {
            let currentPos = card.dataset.position;
            let currentIndex = rotationSequence.indexOf(currentPos);
            let nextIndex = (currentIndex + 1) % rotationSequence.length;
            let nextPos = rotationSequence[nextIndex];
            let nextClass = positionToClass[nextPos];

            Object.values(positionToClass).forEach(cls => {
                card.classList.remove(cls);
            });
            
            card.classList.add(nextClass);
            
            card.dataset.position = nextPos;
        });
    };

    if (isDesktop()) {
        setInterval(rotateCards, interval);
    }
});