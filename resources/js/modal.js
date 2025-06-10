export default class Modal {
  constructor() {
    this.activeModal = null;
    this.init();
  }

  init() {
    this.bindTriggers();
    this.bindCloseEvents();
    this.bindKeyboardEvents();
  }

  bindTriggers() {
    document.addEventListener('click', (e) => {
      const trigger = e.target.closest('[data-modal]');
      if (trigger) {
        e.preventDefault();
        const modalId = trigger.getAttribute('data-modal');
        this.open(modalId);
      }
    });
  }

  bindCloseEvents() {
    document.addEventListener('click', (e) => {
      // Close on modal background click (not modal_box or modal_content)
      if (e.target.classList.contains('modal')) {
        this.close();
      }

      // Close on any element with data-modal-close
      if (
        e.target.hasAttribute('data-modal-close') ||
        e.target.closest('[data-modal-close]')
      ) {
        this.close();
      }
    });
  }

  bindKeyboardEvents() {
    document.addEventListener('keydown', (e) => {
      if (e.key === 'Escape' && this.activeModal) {
        this.close();
      }
    });
  }

  open(modalId) {
    const modal = document.getElementById(modalId);
    if (!modal) {
      console.error(`Modal with ID "${modalId}" not found`);
      return;
    }

    if (this.activeModal) {
      this.close();
    }

    document.body.classList.add('modal-open');
    modal.classList.add('active');
    this.activeModal = modal;
    this.trapFocus(modal);
  }

  close() {
    if (!this.activeModal) return;

    this.activeModal.classList.remove('active');

    setTimeout(() => {
      document.body.classList.remove('modal-open');
      this.activeModal = null;
    }, 300);
  }

  trapFocus(modal) {
    const focusableElements = modal.querySelectorAll(
      'button, [href], input, select, textarea, [tabindex]:not([tabindex="-1"])'
    );

    if (focusableElements.length === 0) return;

    const firstElement = focusableElements[0];
    const lastElement = focusableElements[focusableElements.length - 1];

    firstElement.focus();

    const handleTabKey = (e) => {
      if (e.key === 'Tab') {
        if (e.shiftKey) {
          if (document.activeElement === firstElement) {
            e.preventDefault();
            lastElement.focus();
          }
        } else {
          if (document.activeElement === lastElement) {
            e.preventDefault();
            firstElement.focus();
          }
        }
      }
    };

    modal.addEventListener('keydown', handleTabKey);
  }
}
