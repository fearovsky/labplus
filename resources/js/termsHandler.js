async function loadPosts(data = {}) {
  try {
    const response = await fetch('/wp-json/labplus/v1/load-posts', {
      method: 'POST',
      headers: {
        'Content-Type': 'application/json',
      },
      body: JSON.stringify(data),
    });

    const posts = await response.json();
    return posts;
  } catch (error) {
    console.error('Error loading posts:', error);
    return [];
  }
}

function ensurePaginationWrapper(wrapper) {
  let paginationWrapper = document.querySelector('.pagination'); // Adjust selector as needed

  if (!paginationWrapper) {
    paginationWrapper = document.createElement('div');
    paginationWrapper.className = 'pagination';
    wrapper.insertAdjacentElement('afterend', paginationWrapper);
  }

  return paginationWrapper;
}

export default () => {
  const termsList = document.querySelector('.archive-terms__list');
  if (!termsList) {
    return;
  }

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
      .then(({ content, items, pagination, message }) => {
        currentItemWrapper.classList.add('archive-terms__item--active');
        activeItemWrapper.classList.remove('archive-terms__item--active');

        if (!items || items.length === 0 || message) {
          wrapper.innerHTML = message;
          return;
        }

        wrapper.innerHTML = '';

        items.forEach((item) => {
          wrapper.insertAdjacentHTML('beforeend', item);
        });

        if (pagination) {
          const paginationWrapper = ensurePaginationWrapper(wrapper);
          paginationWrapper.innerHTML = pagination ?? '';
        }
      })
      .finally(() => {
        wrapper.classList.remove('archive-posts--loading');
      });
  });
};
