( function ( Drupal ) {

  Drupal.behaviors.droppy = {
    attach: function ( context, settings ) {

      var elements = context.querySelectorAll( '[data-droppy-options]' ),
          options;

      for ( var i = elements.length, element; i--, element = elements[ i ]; ) {

        var config = element.getAttribute( 'data-droppy-options' );

        if ( config ) {
          options = settings[ 'droppy' ][ config ];
          new Droppy( element, options );
        }
        else {
          new Droppy( element );
        }
      }
    }
  };

} ( Drupal ) );
