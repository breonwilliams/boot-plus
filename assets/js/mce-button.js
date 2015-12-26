(function() {
	tinymce.PluginManager.add('my_mce_button', function( editor, url ) {
		editor.addButton( 'my_mce_button', {
			text: 'Shortcodes',
			icon: false,
			type: 'menubutton',
			menu: [

				{
                    text: 'Full Width Sections',
                    menu: [
                        {
                            text: 'Background Video Section',
                            onclick: function() {
                                editor.insertContent('[background_vid poster="" mp4="" padding=""][/background_vid]');
                            }
                        },
                        {
                            text: 'Background Section Color',
                            onclick: function() {
                                editor.insertContent('[color_section bgcolor="" class=""][/color_section]');
                            }
                        },
                        {
                            text: 'Background Section Image',
                            onclick: function() {
                                editor.insertContent('[img_section bgimg="" class="" overlay=""][/img_section]');
                            }
                        }

                    ]
                },

                {
                    text: 'Modal',
                    onclick: function() {
                                editor.insertContent('[boot_modal button="Modal button" title="Modal Title" class="btn btn-primary" target="modal1" closeclass="btn btn-default" modalsize="modal-lg"][/boot_modal]');
                            }
                },
				
				{
                    text: 'Popup Video',
                    onclick: function() {
                                editor.insertContent('[popup_video class="" url=""][/popup_video]');
                            }
                },
                {
                    text: 'Recent Events',
                    onclick: function() {
                                editor.insertContent('[events-tribe-list cat="" number="2"]');
                            }
                },
                {
                    text: 'Recent Posts',
                    onclick: function() {
                                editor.insertContent('[list_recent_posts category="" posts="2"]');
                            }
                },
                {
                    text: 'Google Map',
                    onclick: function() {
                                editor.insertContent('[googlemap id="myMap1" height="" zoom="15" lat="35.905160" long="-79.046908" title="The University of North Carolina at Chapel Hill"]');
                            }
                },
                {
                    text: 'Custom Div',
                    onclick: function() {
                                editor.insertContent('[custom_div class=""][/custom_div]');
                            }
                }
				
			]
		});
	});
})();