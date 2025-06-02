async function loadPosts(data = {}) {
  try {
    const response = await fetch('/wp-json/labplus/v1/load-posts', {
      method: 'POST',
      headers: {
        'Content-Type': 'application/json',
      },
      body: JSON.stringify(data),
    });

    if (response.status === 204) {
      console.log('No posts found');
      return [];
    }

    const posts = await response.json();
    return posts;
  } catch (error) {
    console.error('Error loading posts:', error);
    return [];
  }
}

export default () => {
  const termsList = document.querySelector('.archive-terms__list');
  if (!termsList) {
    return;
  }

  const paginationWrapper = document.querySelector('.pagination');

  const { taxonomy, posttype } = termsList.dataset;

  const wrapper = document.querySelector('.archive-posts');

  const { paged } = wrapper.dataset;

  termsList.addEventListener('click', (e) => {
    e.preventDefault();

    const { target } = e;
    if (!target.classList.contains('archive-terms__button')) {
      return;
    }

    const { term } = target.dataset;
    if (!term) {
      return;
    }

    const currentItemWrapper = target.closest('.archive-terms__item');
    const activeItemWrapper = document.querySelector(
      '.archive-terms__item--active'
    );

    if (currentItemWrapper === activeItemWrapper) {
      return;
    }

    wrapper.classList.add('archive-posts--loading');

    loadPosts({
      taxonomy,
      posttype,
      term: Number(term),
      paged: paged,
    })
      .then(({ content, items, pagination }) => {
        if (items.length === 0) {
          wrapper.innerHTML = content;
          return;
        }

        wrapper.innerHTML = '';

        items.forEach((item) => {
          wrapper.insertAdjacentHTML('beforeend', item);
        });

        paginationWrapper.innerHTML = pagination ?? '';

        currentItemWrapper.classList.add('archive-terms__item--active');
        activeItemWrapper.classList.remove('archive-terms__item--active');
      })
      .finally(() => {
        wrapper.classList.remove('archive-posts--loading');
      });
  });
};
