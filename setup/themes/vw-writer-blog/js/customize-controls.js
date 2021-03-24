( function( api ) {

	// Extends our custom "vw-writer-blog" section.
	api.sectionConstructor['vw-writer-blog'] = api.Section.extend( {

		// No events for this type of section.
		attachEvents: function () {},

		// Always make the section active.
		isContextuallyActive: function () {
			return true;
		}
	} );

} )( wp.customize );