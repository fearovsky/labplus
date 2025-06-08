// resources/tiny/callout-plugin.js
(function () {
  'use strict';

  tinymce.PluginManager.add('callout', function (editor, url) {
    // Register the callout button
    editor.addButton('callout_button', {
      title: 'Insert Callout',
      icon: 'info',
      onclick: function () {
        // Open simple dialog for callout text
        editor.windowManager.open({
          title: 'Insert Callout',
          width: 400,
          height: 200,
          body: [
            {
              type: 'textbox',
              name: 'callout_text',
              label: 'Callout Text',
              multiline: true,
              minHeight: 80,
              value: '',
              placeholder: 'Enter your callout text here...',
            },
          ],
          onsubmit: function (e) {
            var text = e.data.callout_text || '';

            if (text.trim()) {
              var calloutHtml = '<div class="callout">' + text + '</div>';

              editor.insertContent(calloutHtml);
            }
          },
        });
      },
    });

    // Register menu item
    editor.addMenuItem('callout', {
      text: 'Callout',
      context: 'insert',
      onclick: function () {
        editor.buttons.callout_button.onclick();
      },
    });
  });
})();
