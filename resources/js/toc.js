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

  // Store references to TOC links for active state management
  const tocLinks = [];

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
    tocLink.dataset.target = heading.id;

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

    // Store reference for active state management
    tocLinks.push(tocLink);
  });

  tocContainer.appendChild(tocList);

  // Set up Intersection Observer for active state tracking
  setupActiveStateObserver(headings, tocLinks);

  return tocContainer;
};

const setupActiveStateObserver = (headings, tocLinks) => {
  // Configuration for the observer
  const observerOptions = {
    root: null, // Use viewport as root
    rootMargin: '-20% 0px -80% 0px', // Trigger when heading is in the top 20% of viewport
    threshold: 0,
  };

  // Create intersection observer
  const observer = new IntersectionObserver((entries) => {
    entries.forEach((entry) => {
      const headingId = entry.target.id;
      const correspondingLink = tocLinks.find(
        (link) => link.dataset.target === headingId
      );

      if (entry.isIntersecting) {
        // Remove active class from all items
        tocLinks.forEach((link) => {
          link.parentElement.classList.remove('toc-list__item--active');
        });

        // Add active class to current item
        if (correspondingLink) {
          correspondingLink.parentElement.classList.add(
            'toc-list__item--active'
          );
        }
      }
    });
  }, observerOptions);

  // Observe all headings
  headings.forEach((heading) => {
    observer.observe(heading);
  });

  // Store observer reference for potential cleanup
  if (!window.tocObservers) {
    window.tocObservers = [];
  }
  window.tocObservers.push(observer);
};

const highlightHeading = (heading) => {
  heading.classList.add('heading-highlight');
  setTimeout(() => {
    heading.classList.remove('heading-highlight');
  }, 1000);
};

// Optional: Function to clean up observers (useful for SPA or dynamic content)
const cleanupTocObservers = () => {
  if (window.tocObservers) {
    window.tocObservers.forEach((observer) => observer.disconnect());
    window.tocObservers = [];
  }
};

export default generateTableOfContents;
export { cleanupTocObservers };
