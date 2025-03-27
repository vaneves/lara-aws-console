document.addEventListener('DOMContentLoaded', function () {
  const menuToggleButton = document.getElementById('mobile-menu-toggle');
  const menuOpenIcon = document.getElementById('mobile-menu-open-icon');
  const menuClosedIcon = document.getElementById('mobile-menu-closed-icon');
  const menu = document.getElementById('mobile-menu');

  menuToggleButton.addEventListener('click', function () {
    menu.classList.toggle('hidden');
    menuOpenIcon.classList.toggle('hidden');
    menuClosedIcon.classList.toggle('hidden');
    console.log('bbb')
  });
});