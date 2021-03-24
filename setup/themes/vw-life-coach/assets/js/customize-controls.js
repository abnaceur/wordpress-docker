( function( api ) {

	// Extends our custom "vw-life-coach" section.
	api.sectionConstructor['vw-life-coach'] = api.Section.extend( {

		// No events for this type of section.
		attachEvents: function () {},

		// Always make the section active.
		isContextuallyActive: function () {
			return true;
		}
	} );

} )( wp.customize );