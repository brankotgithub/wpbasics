( function( window, document ) {
  function conference_event_planner_keepFocusInMenu() {
    document.addEventListener( 'keydown', function( e ) {
      const conference_event_planner_nav = document.querySelector( '.sidenav' );
      if ( ! conference_event_planner_nav || ! conference_event_planner_nav.classList.contains( 'open' ) ) {
        return;
      }
      const elements = [...conference_event_planner_nav.querySelectorAll( 'input, a, button' )],
        conference_event_planner_lastEl = elements[ elements.length - 1 ],
        conference_event_planner_firstEl = elements[0],
        conference_event_planner_activeEl = document.activeElement,
        tabKey = e.keyCode === 9,
        shiftKey = e.shiftKey;
      if ( ! shiftKey && tabKey && conference_event_planner_lastEl === conference_event_planner_activeEl ) {
        e.preventDefault();
        conference_event_planner_firstEl.focus();
      }
      if ( shiftKey && tabKey && conference_event_planner_firstEl === conference_event_planner_activeEl ) {
        e.preventDefault();
        conference_event_planner_lastEl.focus();
      }
    } );
  }
  conference_event_planner_keepFocusInMenu();
} )( window, document );