/**
 *
 * Isotope Custom Scripts for "U-Design"
 * 
 * Version: 1.0.0
 * 
 */

jQuery(document).ready(function($){
    var $container = $('#portfolio-container');
    
    $container.isotope({
        itemSelector : '.portfolio-category',
        layoutMode: 'fitRows',
        getSortData: {
            number: function( $elem ) {
                var number = $elem.hasClass('srt-number') ? 
                $elem.find('.srt-number').text() :
                $elem.attr('data-number');
                return parseInt( number, 10 );
            },
            alphabetical: function( $elem ) {
                var name = $elem.find('.srt-name'),
                itemText = name.length ? name : $elem;
                return itemText.text();
            }
        }
    });
      
    var $optionSets = $('#isotope-options .option-set'),
    $optionLinks = $optionSets.find('a');

    $optionLinks.click(function(){
        var $this = $(this);
        // don't proceed if already selected
        if ( $this.hasClass('selected') ) {
            return false;
        }
        var $optionSet = $this.parents('.option-set');
        $optionSet.find('.selected').removeClass('selected');
        $this.addClass('selected');
  
        // make option object dynamically, i.e. { filter: '.my-filter-class' }
        var options = {},
        key = $optionSet.attr('data-option-key'),
        value = $this.attr('data-option-value');
        // parse 'false' as false boolean
        value = value === 'false' ? false : value;
        options[ key ] = value;
        if ( key === 'layoutMode' && typeof changeLayoutMode === 'function' ) {
            // changes in layout modes need extra logic
            changeLayoutMode( $this, options )
        } else {
            // otherwise, apply new options
            $container.isotope( options );
        }
        
        return false;
    
    });
    
    // A fix for transparent border issue in IE versions 8.0 or older
    var ua = $.browser;
    if ( ua.msie && ua.version.slice(0,3) <= "8.0" ) { $container.isotope({ animationOptions: { duration: 0 } }); }
    
});