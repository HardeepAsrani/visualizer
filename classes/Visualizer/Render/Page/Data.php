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
 * Renders chart data setup page.
 *
 * @category Visualizer
 * @package Render
 * @subpackage Page
 *
 * @since 1.0.0
 */
class Visualizer_Render_Page_Data extends Visualizer_Render_Page {

	/**
	 * Renders page content.
	 *
	 * @since 1.0.0
	 *
	 * @access protected
	 */
	protected function _renderContent() {
        // Added by Ash/Upwork
        if( defined( 'Visualizer_Pro' ) ){
            global $Visualizer_Pro;
            $Visualizer_Pro->_addEditor();
        }
        // Added by Ash/Upwork

        echo '<div id="canvas">';
			echo '<img src="', VISUALIZER_ABSURL, 'images/ajax-loader.gif" class="loader">';
		echo '</div>';
	}

	/**
	 * Renders sidebar content.
	 *
	 * @since 1.0.0
	 *
	 * @access protected
	 */
	protected function _renderSidebarContent() {
		$upload_link = add_query_arg( array(
			'action' => Visualizer_Plugin::ACTION_UPLOAD_DATA,
			'nonce'  => wp_create_nonce(),
			'chart'  => $this->chart->ID,
		), admin_url( 'admin-ajax.php' ) );

		echo '<li class="group open">';
			echo '<h3 class="group-title">', esc_html__( 'Upload CSV File', Visualizer_Plugin::NAME ), '</h3>';
			echo '<div class="group-content">';
				echo '<iframe id="thehole" name="thehole"></iframe>';

				echo '<p class="group-description">';
                    echo '<a href="">something here</a>';
				echo '</p>';

				echo '<div>';
					echo '<form id="csv-form" action="', $upload_link, '" method="post" target="thehole" enctype="multipart/form-data">';
						echo '<input type="hidden" id="remote-data" name="remote_data">';
						echo '<div class="form-inline">';
						echo '<div class="button button-primary file-wrapper computer-btn">';
							echo '<input type="file" id="csv-file" class="file" name="local_data">';
							esc_attr_e( 'From Computer', Visualizer_Plugin::NAME );
						echo '</div>';

						echo '<a id="remote-file" class="button from-web from-web-btn" href="javascript:;">', esc_html__( 'From Web', Visualizer_Plugin::NAME ), '</a>';
                        // Added by Ash/Upwork
                        if( defined( 'Visualizer_Pro' ) ){
                            global $Visualizer_Pro;
                            $Visualizer_Pro->_addFormElements();
                        }else{
                        // Added by Ash/Upwork
							echo '<div class="just-on-pro"> </div>';
                        }
						echo '</div>';
					echo '</form>';

                    // added by Ash/Upwork
                    if( defined( 'Visualizer_Pro' ) ){
                        global $Visualizer_Pro;
                        $Visualizer_Pro->_addEditorElements();
                    }else{
?>
                    <a href="<?php echo Visualizer_Plugin::PRO_TEASER_URL;?>" title="<?php echo Visualizer_Plugin::PRO_TEASER_TITLE;?>" target="_new">
                        <input type="button" class="button preview preview-btn" id="existing-chart-free" value="<?php esc_attr_e( 'Check PRO Version ', Visualizer_Plugin::NAME );?>">
                    </a>
<?php
                    }
                    // Added by Ash/Upwork

				echo '</div>';
			echo '</div>';
		echo '</li>';

        // changed by Ash/Upwork
		echo '<form id="settings-form" action="', add_query_arg( 'nonce', wp_create_nonce() ), '" method="post">';
        echo $this->sidebar;
		echo '</form>';
        // changed by Ash/Upwork
	}

	/**
	 * Renders toolbar content.
	 *
	 * @since 1.0.0
	 *
	 * @access protected
	 */
	protected function _renderToolbar() {
        // changed by Ash/Upwork
        echo '<div class="toolbar-div">';
		echo '<a class="button button-large" href="', add_query_arg( 'tab', 'types' ), '">';
			esc_html_e( 'Back', Visualizer_Plugin::NAME );
		echo '</a>';
        echo '</div>';

        echo '<div class="toolbar-div rate-the-plugin">';
            echo '<div><b>', esc_html__( 'Like the plugin? Show us your love!', Visualizer_Plugin::NAME ), '</b>';
            echo '<a id="rate-link" href="http://wordpress.org/support/view/plugin-reviews/visualizer" target="_blank">';
                esc_html_e( 'Rate it on WordPress.org', Visualizer_Plugin::NAME );
            echo '</a>';
            echo '</div>';
            echo '<div id="rate-stars">&nbsp;</div>';
        echo '</div>';

		echo '<input type="submit" id="settings-button" class="button button-primary button-large push-right" value="', $this->button, '">';
	}

}