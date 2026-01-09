export default function initAccordion() {
    const triggers = document.querySelectorAll('.js-accordion-trigger');
  
    triggers.forEach(trigger => {
        const handleClick = (e) => {
            e.preventDefault();
            const item = trigger.closest('.accordion-item');
            const content = item.querySelector('.accordion-item__content');
            
            if (item.classList.contains('is-open')) {
                content.style.maxHeight = null;
                setTimeout(() => { if (!item.classList.contains('is-open')) content.style.display = 'none'; }, 300);
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
  
    document.querySelectorAll('.accordion-item.is-open .accordion-item__content').forEach(content => {
        content.style.display = 'block';
        content.style.maxHeight = content.scrollHeight + 'px';
    });
  };