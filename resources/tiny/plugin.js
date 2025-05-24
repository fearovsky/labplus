(function () {
  'use strict';

  tinymce.PluginManager.add('simple_separator', function (editor, url) {
    editor.addButton('simple_separator_button', {
      text: 'Separator',
      icon: 'hr',
      tooltip: 'Insert Separator',
      onclick: function () {
        editor.windowManager.open({
          title: 'Insert Separator',
          width: 300,
          height: 180,
          body: [
            {
              type: 'textbox',
              name: 'desktop',
              label: 'Desktop (px):',
              value: '40',
            },
            {
              type: 'textbox',
              name: 'mobile',
              label: 'Mobile (px):',
              value: '20',
            },
          ],
          onsubmit: function (e) {
            var html =
              '<hr class="custom-separator" style="--mobile:' +
              e.data.mobile +
              'px;--desktop:' +
              e.data.desktop +
              'px;">';
            editor.insertContent(html);
          },
        });
      },
    });

    // Add preview styles for editor
    editor.on('init', function () {
      editor.dom.addStyle(`
        hr.custom-separator {
          margin: var(--desktop, 40px) 0;
          border: none;
          border-top: 1px solid #ccc;
          position: relative;
        }
      `);
    });
  });
})();
