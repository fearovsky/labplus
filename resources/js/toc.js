const generateTableOfContents = (tocPlace = '.table-of-content') => {
  const tocContainer = document.querySelector(tocPlace);
  if (!tocContainer) {
    return;
  }

  const contentContainer = document.querySelector('.single-post-builder');
  if (!contentContainer) {
    return;
  }

  const headings = contentContainer.querySelectorAll('h1, h2, h3');
  if (headings.length === 0) {
    return;
  }

  tocContainer.innerHTML = '';

  const tocList = document.createElement('ul');
  tocList.className = 'toc-list';

  headings.forEach((heading, index) => {
    if (!heading.id) {
      const headingText = heading.textContent.trim();
      const id = headingText
        .toLowerCase()
        .replace(/[^\w\s-]/g, '')
        .replace(/\s+/g, '-')
        .replace(/-+/g, '-')
        .trim();
      heading.id = id || `heading-${index}`;
    }

    const tocItem = document.createElement('li');
    tocItem.className = 'toc-list__item';

    const tocLink = document.createElement('a');
    tocLink.href = `#${heading.id}`;
    tocLink.className = 'toc-list__item-link';
    tocLink.textContent = heading.textContent.trim();

    tocLink.addEventListener('click', function (e) {
      e.preventDefault();
      const targetHeading = document.getElementById(heading.id);
      if (targetHeading) {
        targetHeading.scrollIntoView({
          behavior: 'smooth',
          block: 'start',
        });

        highlightHeading(targetHeading);
      }
    });

    tocItem.appendChild(tocLink);
    tocList.appendChild(tocItem);
  });

  tocContainer.appendChild(tocList);

  return tocContainer;
};

const highlightHeading = (heading) => {
  heading.classList.add('heading-highlight');
  setTimeout(() => {
    heading.classList.remove('heading-highlight');
  }, 1000);
};

export default generateTableOfContents;
