const $body = document.body;
const $iconSwitcher = document.querySelector('[data-js-icon-switcher]');
const $iconRow = document.querySelector('[data-js-icon-row]');
const $displayTab = document.querySelector('[data-js-display-tab]');
const $iconGrid = document.querySelector('[data-js-icon-grid]');

$iconSwitcher.addEventListener('change', function(event){
  (event.target.checked) ? $body.setAttribute('data-theme', 'dark') : $body.removeAttribute('data-theme');
});

$iconRow.addEventListener('change', function(event){
  $displayTab.setAttribute('data-post', 'full');
  $iconGrid.setAttribute('data-state', 'muted');
  $iconRow.setAttribute('data-state', 'active');
});

$iconGrid.addEventListener('change', function(event){
  $displayTab.removeAttribute('data-post');
  $iconGrid.setAttribute('data-state', 'active');
  $iconRow.setAttribute('data-state', 'muted');
});