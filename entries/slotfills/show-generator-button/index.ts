import { registerPlugin } from '@wordpress/plugins';
import Sidebar from './sidebar';

registerPlugin('wp-pdf-generator-show-generator-button-sidebar', {
  icon: 'download',
  render: Sidebar,
});
