export default function initAccordion() {
    const triggers = document.querySelectorAll('.js-accordion-trigger');
  
    triggers.forEach(trigger => {
        const handleClick = (e) => {
            e.preventDefault();
            const item = trigger.closest('.accordion-item');
            const content = item.querySelector('.accordion-item__content');
            const container = item.closest('.js-accordion-container');
            
            // Check if this accordion should have "one-open-at-a-time" behavior
            const isExclusive = container && container.classList.contains('js-accordion-exclusive');
            
            if (item.classList.contains('is-open')) {
                content.style.maxHeight = null;
                setTimeout(() => { if (!item.classList.contains('is-open')) content.style.display = 'none'; }, 300);
                item.classList.remove('is-open');
            } else {
                // If exclusive mode, close all other items in the same container
                if (isExclusive) {
                    const allItems = container.querySelectorAll('.accordion-item');
                    allItems.forEach(otherItem => {
                        if (otherItem !== item && otherItem.classList.contains('is-open')) {
                            const otherContent = otherItem.querySelector('.accordion-item__content');
                            otherContent.style.maxHeight = null;
                            setTimeout(() => { 
                                if (!otherItem.classList.contains('is-open')) {
                                    otherContent.style.display = 'none';
                                }
                            }, 300);
                            otherItem.classList.remove('is-open');
                        }
                    });
                }
                
                content.style.display = 'block';
                setTimeout(() => {
                  content.style.maxHeight = content.scrollHeight + 'px'; 
                }, 10);
                item.classList.add('is-open');
            }
        };
  
        trigger.removeEventListener('click', trigger._currentHandler);
        trigger.addEventListener('click', handleClick);
        trigger._currentHandler = handleClick; 
    });
  
    document.querySelectorAll('.accordion-item.is-open .accordion-item__content').forEach(content => {
        content.style.display = 'block';
        content.style.maxHeight = content.scrollHeight + 'px';
    });
  };