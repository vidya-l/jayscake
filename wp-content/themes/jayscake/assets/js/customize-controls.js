( function( api ) {

	// Extends our custom "jays-cake" section.
	api.sectionConstructor['jays-cake'] = api.Section.extend( {

		// No events for this type of section.
		attachEvents: function () {},

		// Always make the section active.
		isContextuallyActive: function () {
			return true;
		}
	} );

} )( wp.customize );