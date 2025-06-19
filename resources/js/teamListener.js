export default () => {
  const teams = document.querySelectorAll('.our-team-groups');
  if (!teams.length) {
    return;
  }

  const contentBox = document.querySelector('.our-team-content');

  const clickHandle = async (e) => {
    const { target } = e;

    const person = target.classList.contains('our-team-groups__list-person')
      ? target
      : target.closest('.our-team-groups__list-person');

    if (!person) {
      return;
    }

    const personId = person.dataset.person;

    const response = await fetch('/wp-json/labplus/v1/load-person', {
      method: 'POST',
      headers: {
        'Content-Type': 'application/json',
      },
      body: JSON.stringify({
        personId,
      }),
    });

    const personData = await response.json();
    // if is success 200
    if (!response.ok) {
      return;
    }

    const currentBox = contentBox.querySelector('.our-team-box');
    if (currentBox) {
      currentBox.remove();
    }

    contentBox.insertAdjacentHTML('beforeend', personData.content);
  };

  const exitHandle = (e) => {
    const { target } = e;

    const closeTarget = target.classList.contains('our-team-box__name-exit')
      ? target
      : target.closest('.our-team-box__name-exit');
    if (!closeTarget) {
      return;
    }

    const currentBox = contentBox.querySelector('.our-team-box');
    if (currentBox) {
      currentBox.remove();
    }
  };

  contentBox.addEventListener('click', exitHandle);

  teams.forEach((team) => {
    team.addEventListener('click', clickHandle);
  });
};
