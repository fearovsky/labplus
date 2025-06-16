export default () => {
  const nav = document.querySelector('.nav');
  if (!nav) {
    return;
  }

  const hamburger = document.querySelector('.hamburger');

  const navListener = (e) => {
    const { target } = e;
    const wrapper = target.closest('.menu-item');

    if (!wrapper || !wrapper.classList.contains('menu-item-has-children')) {
      return;
    }

    e.preventDefault();
    wrapper.classList.toggle('menu-item--active');
  };

  const toggleHamburger = () => {
    hamburger.classList.toggle('hamburger--active');
    nav.classList.toggle('nav--active');
  };

  nav.addEventListener('click', navListener);
  hamburger.addEventListener('click', toggleHamburger);
};
