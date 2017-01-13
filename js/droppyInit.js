( function () {

  'use strict';

  var elements = document.querySelectorAll( '[data-droppy-options]' );

  for ( var i = elements.length, element; i--, element = elements[ i ]; ) {

    // Create a new Droppy instance with the specified options.
    new Droppy( element, drupalSettings[ 'droppy' ][ element.getAttribute( 'data-droppy-options' ) ] );
  }

} () );
