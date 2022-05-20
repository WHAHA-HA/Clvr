
// Cycle plugin config
jQuery(document).ready(function($){
    var c2TransitionType = cycle2_params.fx;
    var c2Speed = parseInt(cycle2_params.speed);
    var c2Timeout = parseInt(cycle2_params.timeout);
    var c2Sync = parseInt(cycle2_params.sync);
    var c2TextTransitionOn = parseInt(cycle2_params.texttrans);

    /* pass custom parameters to cycle 2 */
    $('#c2-slider').cycle({
        fx:                 c2TransitionType,
        before:             onBefore,
        after:              onAfter,
        speed:              c2Speed,
        timeout:            c2Timeout,
        sync:               c2Sync,
        randomizeEffects:   0,
        prev:               '#slider-prev',
        next:               '#slider-next',
        pager:              '#c2-nav'
    });
    function onBefore(curr, next, opts) {
        if (!c2TextTransitionOn){
            $(curr).find('.slide-desc').css({display:'none'});
            $(next).find('.slide-desc').css({display:'none'});
        }
    }
    function onAfter(curr, next, opts) {
        if (!c2TextTransitionOn){
            $(this).find('.slide-desc').css({display:'block'});
        }
    }

    $('#c2-pauseButton').click(function() {
        $('#c2-slider').cycle('pause');
        return false;
    });

    $('#c2-resumeButton').click(function() {
        $('#c2-slider').cycle('resume', true);
        return false;
    });
        
});




