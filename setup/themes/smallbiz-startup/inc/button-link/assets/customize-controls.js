( function( api ) {

	// Extends our custom "smallbiz-startup" section.
	api.sectionConstructor['smallbiz-startup'] = api.Section.extend( {

		// No events for this type of section.
		attachEvents: function () {},

		// Always make the section active.
		isContextuallyActive: function () {
			return true;
		}
	} );

} )( wp.customize );