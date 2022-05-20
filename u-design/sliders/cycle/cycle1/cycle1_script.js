
// Cycle plugin config
jQuery(document).ready(function($){
    var c1TransitionType = cycle1_params.fx;
    var c1Speed = parseInt(cycle1_params.speed);
    var c1Timeout = parseInt(cycle1_params.timeout);
    var c1Sync = parseInt(cycle1_params.sync);
    
    /* pass custom parameters to cycle 1 */
    $('#c1-slider').cycle({
        fx:                 c1TransitionType,
        speed:              c1Speed,
        timeout:            c1Timeout,
        sync:               c1Sync,
        randomizeEffects:   0,
        prev:               '#slider-prev',
        next:               '#slider-next',
        pager:              '#c1-nav'
    });

    $('#c1-pauseButton').click(function() {
        $('#c1-slider').cycle('pause');
        return false;
    });

    $('#c1-resumeButton').click(function() {
        $('#c1-slider').cycle('resume', true);
        return false;
    });

});

