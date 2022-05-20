
// Cycle plugin config
jQuery(document).ready(function($){
    var c3TransitionType = "scrollRight";
    var c3Autostop = parseInt(cycle3_params.autostop);
    var c3Speed = 500;
    var c3Timeout = parseInt(cycle3_params.timeout);
    var c3Sync = 0;
    
    // Cover the scenario of having only one slide
    if ( $("#c3-slider > li").size() == 1 ) {
        if ( c3Autostop == 1 ) {
            // sliding image
            $('#c3-slider').find('.sliding-image').css({'display':'block'}).delay(50).animate({'left':'10px', 'opacity':1}, 250, 'easeOutQuad');
            // sliding text
            $('#c3-slider').find('.sliding-text').css({'display':'block'}).delay(250).animate({'right':'10px', 'opacity':1}, 350, 'easeOutQuad');
        } else {
            // Clone the first slide (only if there's one slide) to be able to initiate the transision effects
            $('#c3-slider li:eq(0)').clone().insertAfter('#c3-slider li:eq(0)');
        }
    }
    
    /* pass custom parameters to cycle 3 */
    $('#c3-slider').cycle({
        fx:                 c3TransitionType,
        easing:             'easeOutQuad',
        autostop:           c3Autostop,
        before:             onBefore,
        after:              onAfter,
        speed:              c3Speed,
        timeout:            c3Timeout,
        sync:               c3Sync,
        randomizeEffects:   0,
        prev:               '#slider-prev',
        next:               '#slider-next',
        pager:              '#c3-nav'
    });

    function onBefore(curr, next, opts, fwd) {
        // sliding image
        $(next).find('.sliding-image').css({'display':'none', 'left':'-940px'});
        // sliding text
        $(next).find('.sliding-text').css({'display':'none', 'right':'-940px'});
    }
    function onAfter(curr, next, opts, fwd) {
        // sliding image
        $(this).find('.sliding-image').css({'display':'block'}).delay(50).animate({'left':'10px', 'opacity':1}, 250, 'easeOutQuad');
        // sliding text
        $(this).find('.sliding-text').css({'display':'block'}).delay(250).animate({'right':'10px', 'opacity':1}, 350, 'easeOutQuad');
    }

    $('#c3-pauseButton').click(function() {
        $('#c3-slider').cycle('pause');
        return false;
    });

    $('#c3-resumeButton').click(function() {
        $('#c3-slider').cycle('resume', true);
        return false;
    });

});




