<?php

/*
Plugin Name: Arlo Demo
Plugin URI: https://fullworks.net
Description: Arlo Demo.
Version: 1.0
Author: alan fuller
Author URI: https://fullworks.net
License: GPL2
*/

/*
 *  stops the plugin being called directly
 */
if ( ! defined( 'WPINC' ) ) {
	die;
}

add_action(
'wp_enqueue_scripts',
	/**
	 * loads up arlo script into wp header
	 */
	function () {
		wp_enqueue_script( 'arlo', 'https://connect.arlocdn.net/jscontrols/1.0/init.js', array(), '1.0', false );
	}
);



add_shortcode(
 'arlo_demo',
	/**
     * creates a shortcode [arlo_demo]
     *
     * outputs the arlo demo code as per https://developer.arlo.co/doc/webcontrols/index
     *
	 * @return string
	 */
	function () {
		ob_start();
?>
        <div id="upcoming-events-control1"></div>
        <div id="upcoming-events-control2"></div>
        <script>
            document.addEventListener("arlojscontrolsloaded", function () {
                var upcomingEventsControl = {
                    moduleType: "UpcomingEvents",
                    targetElement: "#upcoming-events-control1",
                    template: "#upcoming-events-control1-template",
                    customUrls: {
                        eventtemplate: "http://example.com/eventtemplatepage.html",
                        venue: "http://example.com/venue.html",
                        presenter: "http://example.com/presenter.html"
                    },
                    top: 5
                };
                var upcomingEventsControl2 = {
                    moduleType: "UpcomingEvents",
                    targetElement: "#upcoming-events-control2",
                    template: "#upcoming-events-control2-template",
                    customUrls: {
                        eventtemplate: "http://example.com/eventtemplatepage.html",
                        venue: "http://example.com/venue.html",
                        presenter: "http://example.com/presenter.html"
                    },
                    top: 10
                };
                new ArloWebControls().start({
                    "platformID": "demo.arlo.co",
                    "modules": [
                        upcomingEventsControl,
                        upcomingEventsControl2
                    ]
                });
            });
        </script>
		<?php
		return ob_get_clean();

    }
);
