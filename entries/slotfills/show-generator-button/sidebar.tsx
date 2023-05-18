import React from 'react';

// Components.
import { PluginDocumentSettingPanel } from '@wordpress/edit-post';
import { __ } from '@wordpress/i18n';
import { FormToggle } from '@wordpress/components';

import { usePostMetaValue } from '@alleyinteractive/block-editor-tools';
// Styles
import './index.scss';

function Sidebar(): JSX.Element {
  const [isChecked, setChecked] = usePostMetaValue('wp_pdf_generator_show');

  return (
    <PluginDocumentSettingPanel title={__('PDF Generator', 'wp-pdf-generator')}>
      <label className="pdf-generator__toggle__label">
        <FormToggle
          className="pdf-generator__toggle"
          checked={isChecked}
          onChange={() => setChecked(!isChecked)}
        />
        Show PDF Download button?
      </label>
    </PluginDocumentSettingPanel>
  );
}

export default Sidebar;
