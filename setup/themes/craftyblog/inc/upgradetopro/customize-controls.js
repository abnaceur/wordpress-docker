(function (api) {

	// Extends our custom "Craftyblog" section.
	api.sectionConstructor['craftyblog'] = api.Section.extend({

		// No events for this type of section.
		attachEvents: function () {},

		// Always make the section active.
		isContextuallyActive: function () {
			return true;
		}
	});
	jQuery("#accordion-panel-blog-starter-theme-options").addClass("custom-class");

})(wp.customize);