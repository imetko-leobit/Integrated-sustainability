export default function initAccordion() {
    const containers = document.querySelectorAll('.js-accordion-container');
  
    containers.forEach(container => {
        const triggers = container.querySelectorAll('.js-accordion-trigger');
        
        triggers.forEach(trigger => {
            const handleClick = (e) => {
                e.preventDefault();
                const item = trigger.closest('.accordion-item');
                const content = item.querySelector('.accordion-item__content');
                const isCurrentlyOpen = item.classList.contains('is-open');
                
                // Close all items in the same container
                container.querySelectorAll('.accordion-item').forEach(otherItem => {
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
                
                // Toggle current item
                if (isCurrentlyOpen) {
                    content.style.maxHeight = null;
                    setTimeout(() => { 
                        if (!item.classList.contains('is-open')) {
                            content.style.display = 'none'; 
                        }
                    }, 300);
                    item.classList.remove('is-open');
                } else {
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
    });
  
    // Initialize open items
    document.querySelectorAll('.accordion-item.is-open .accordion-item__content').forEach(content => {
        content.style.display = 'block';
        content.style.maxHeight = content.scrollHeight + 'px';
    });
  };