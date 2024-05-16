( function( window, document ) {
  function jays_cake_keepFocusInMenu() {
    document.addEventListener( 'keydown', function( e ) {
      const jays_cake_nav = document.querySelector( '.sidenav' );
      if ( ! jays_cake_nav || ! jays_cake_nav.classList.contains( 'open' ) ) {
        return;
      }
      const elements = [...jays_cake_nav.querySelectorAll( 'input, a, button' )],
        jays_cake_lastEl = elements[ elements.length - 1 ],
        jays_cake_firstEl = elements[0],
        jays_cake_activeEl = document.activeElement,
        tabKey = e.keyCode === 9,
        shiftKey = e.shiftKey;
      if ( ! shiftKey && tabKey && jays_cake_lastEl === jays_cake_activeEl ) {
        e.preventDefault();
        jays_cake_firstEl.focus();
      }
      if ( shiftKey && tabKey && jays_cake_firstEl === jays_cake_activeEl ) {
        e.preventDefault();
        jays_cake_lastEl.focus();
      }
    } );
  }
  jays_cake_keepFocusInMenu();
} )( window, document );