( function( api ) {

	// Extends our custom "freesia-business" section.
	api.sectionConstructor['freesia-business'] = api.Section.extend( {

		// No events for this type of section.
		attachEvents: function () {},

		// Always make the section active.
		isContextuallyActive: function () {
			return true;
		}
	} );

} )( wp.customize );
