( function( api ) {

	// Extends our custom "conference-event-planner" section.
	api.sectionConstructor['conference-event-planner'] = api.Section.extend( {

		// No events for this type of section.
		attachEvents: function () {},

		// Always make the section active.
		isContextuallyActive: function () {
			return true;
		}
	} );

} )( wp.customize );