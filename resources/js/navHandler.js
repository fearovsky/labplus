export default () => {
  const navList = document.querySelector('.nav__list');
  if (!navList) {
    return;
  }

  const navListener = (e) => {
    const { target } = e;
    const wrapper = target.closest('.menu-item');

    if (!wrapper || !wrapper.classList.contains('menu-item-has-children')) {
      return;
    }

    e.preventDefault();
    wrapper.classList.toggle('menu-item--active');
  };

  navList.addEventListener('click', navListener);
};
