(function (api) {

	// Extends our custom "blogshop" section.
	api.sectionConstructor['blogshop'] = api.Section.extend({

		// No events for this type of section.
		attachEvents: function () {},

		// Always make the section active.
		isContextuallyActive: function () {
			return true;
		}
	});
	jQuery("#accordion-panel-blogshop-theme-options").addClass("custom-class");

})(wp.customize);