import initPerformanceGrid from '../modules/PerformanceGrid';

const elements = document.querySelectorAll('.performance-grid');

elements.forEach(element => {
    new initPerformanceGrid(element);
});