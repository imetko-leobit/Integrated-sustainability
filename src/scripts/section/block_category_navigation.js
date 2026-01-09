import InitCategoryNavigation from '../modules/CategoryNavigation';

const elements = document.querySelectorAll('.block-category-navigation');

elements.forEach(element => {
    new InitCategoryNavigation(element);
});