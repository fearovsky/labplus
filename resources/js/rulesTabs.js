export default () => {
  const rulesTab = document.querySelector('.rules-tab-tabs');
  if (!rulesTab) {
    return;
  }

  const sections = document.querySelectorAll('.rules-tab-section');

  rulesTab.addEventListener('click', (e) => {
    const target = e.target;

    const tabItem = target.classList.contains('rules-tab-tabs__item')
      ? target
      : target.closest('.rules-tab-tabs__item');
    if (!tabItem) {
      return;
    }

    const targetSection = tabItem.getAttribute('data-section');
    if (!targetSection) {
      return;
    }

    const allTabItems = rulesTab.querySelectorAll('.rules-tab-tabs__item');
    allTabItems.forEach((item) => {
      item.classList.remove('badges-list__item--active');
    });

    tabItem.classList.add('badges-list__item--active');

    sections.forEach((section) => {
      section.classList.remove('rules-tab-section--active');
    });

    const targetSectionElement = document.querySelector(
      `.rules-tab-section[data-section="${targetSection}"]`
    );
    if (
      targetSectionElement &&
      targetSectionElement.classList.contains('rules-tab-section')
    ) {
      targetSectionElement.classList.add('rules-tab-section--active');
    }
  });

  document.addEventListener('click', function (e) {
    if (e.target.closest('.rules-tab-section__badges')) {
      const badgeText = e.target.textContent.trim();
      const tabButtons = document.querySelectorAll('.rules-tab-tabs .badge');

      tabButtons.forEach((button) => {
        if (button.textContent.trim() === badgeText) {
          button.click();
        }
      });
    }
  });
};
