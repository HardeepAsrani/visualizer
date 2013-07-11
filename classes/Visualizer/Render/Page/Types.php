<?php

// +----------------------------------------------------------------------+
// | Copyright 2013  Madpixels  (email : visualizer@madpixels.net)        |
// +----------------------------------------------------------------------+
// | This program is free software; you can redistribute it and/or modify |
// | it under the terms of the GNU General Public License, version 2, as  |
// | published by the Free Software Foundation.                           |
// |                                                                      |
// | This program is distributed in the hope that it will be useful,      |
// | but WITHOUT ANY WARRANTY; without even the implied warranty of       |
// | MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE.  See the        |
// | GNU General Public License for more details.                         |
// |                                                                      |
// | You should have received a copy of the GNU General Public License    |
// | along with this program; if not, write to the Free Software          |
// | Foundation, Inc., 51 Franklin St, Fifth Floor, Boston,               |
// | MA 02110-1301 USA                                                    |
// +----------------------------------------------------------------------+
// | Author: Eugene Manuilov <eugene@manuilov.org>                        |
// +----------------------------------------------------------------------+

/**
 * Renders chart type picker page.
 *
 * @category Visualizer
 * @package Render
 *
 * @since 1.0.0
 */
class Visualizer_Render_Page_Types extends Visualizer_Render_Page {

	/**
	 * Renders page body.
	 *
	 * @since 1.0.0
	 *
	 * @access protected
	 */
	protected function _renderBody() {
		echo '<div id="type-picker">';
			foreach ( $this->types as $type ) {
				echo '<div class="type-box type-box-', $type, '">';
					echo '<label class="type-label', $type == $this->type ? ' type-label-selected' : '', '">';
						echo '<input type="radio" class="type-radio" name="type" value="', $type, '"', checked( $type, $this->type, false ), '>';
					echo '</label>';
				echo '</div>';
			}
		echo '</div>';
	}

	/**
	 * Renders toolbar content.
	 *
	 * @since 1.0.0
	 *
	 * @access protected
	 */
	protected function _renderToolbar() {
		echo '<input type="submit" class="button button-primary button-large" value="', esc_attr__( 'Select Chart Type', Visualizer_Plugin::NAME ), '">';
	}

}