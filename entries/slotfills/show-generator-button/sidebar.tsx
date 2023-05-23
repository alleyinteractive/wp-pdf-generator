import React, { useState } from 'react';

// Components.
import { PluginDocumentSettingPanel } from '@wordpress/edit-post';
import { __ } from '@wordpress/i18n';
import { ClipboardButton, FormToggle } from '@wordpress/components';
import { addQueryArgs } from '@wordpress/url';

import { usePostMetaValue } from '@alleyinteractive/block-editor-tools';
import { useSelect } from '@wordpress/data';

// Styles
import './index.scss';

type CoreEditorStore = {
  getPermalink: Function,
};

function Sidebar(): JSX.Element {
  const [isChecked, setChecked] = usePostMetaValue('wp_pdf_generator_show');
  const [hasCopied, setHasCopied] = useState(false);

  const permalink = addQueryArgs(useSelect((select) => (select('core/editor') as CoreEditorStore).getPermalink(), []), { download_pdf: true });

  return (
    <PluginDocumentSettingPanel title={__('PDF Generator', 'wp-pdf-generator')}>
      <label className="pdf-generator__toggle__label">
        <FormToggle
          className="pdf-generator__toggle"
          checked={isChecked}
          onChange={() => setChecked(!isChecked)}
        />
        Allow PDF downloading of Post?
      </label>
      <div className="pdf-generator__copy">
        <ClipboardButton
          variant="primary"
          text={permalink}
          onCopy={() => setHasCopied(true)}
          onFinishCopy={() => setHasCopied(false)}
        >
          { hasCopied ? 'Copied!' : 'Copy PDF Download Link' }
        </ClipboardButton>
      </div>
    </PluginDocumentSettingPanel>
  );
}

export default Sidebar;
