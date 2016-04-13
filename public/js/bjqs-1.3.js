/*
 * Basic jQuery Slider plug-in v.1.3
 *
 * http://www.basic-slider.com
 *
 * Authored by John Cobb
 * http://www.johncobb.name
 * @john0514
 *
 * Copyright 2011, John Cobb
 * License: GNU General Public License, version 3 (GPL-3.0)
 * http://www.opensource.org/licenses/gpl-3.0.html
 *
 */

;(function($) {

    "use strict";

    $.fn.bjqs = function(o) {
        
        // slider default settings
        var defaults        = {

            // w + h to enforce consistency
            width           : 700,
            height          : 300,

            // transition valuess
            animtype        : 'fade',
            animduration    : 600,      // length of transition
            animspeed       : 6000,     // delay between transitions
            automatic       : true,     // enable/disable automatic slide rotation

            // control and marker configuration
            showcontrols    : false,     // enable/disable next + previous UI elements
            centercontrols  : true,     // vertically center controls
            nexttext        : 'Next',   // text/html inside next UI element
            prevtext        : 'Prev',   // text/html inside previous UI element
            centermarkers   : true,     // horizontally center markers

            // interaction values
            hoverpause      : false,     // enable/disable pause slides on hover

            // presentational options
            randomstart     : false,     // start from a random slide
            responsive      : false     // enable responsive behaviour

        };

        // create settings from defauls and user options
        var settings        = $.extend({}, defaults, o);

        // slider elements
        var $wrapper        = this,
            $slider         = $wrapper.find('ul.bjqs'),
            $slides         = $slider.children('li'),

            // control elements
            $c_wrapper      = null,
            $c_fwd          = null,
            $c_prev         = null,


            // elements for slide animation
            $canvas         = null,
            $clone_first    = null,
            $clone_last     = null;

        // state management object
        var state           = {
            slidecount      : $slides.length,   // total number of slides
            animating       : false,            // bool: is transition is progress
            paused          : false,            // bool: is the slider paused
            currentslide    : 1,                // current slide being viewed (not 0 based)
            nextslide       : 0,                // slide to view next (not 0 based)
            currentindex    : 0,                // current slide being viewed (0 based)
            nextindex       : 0,                // slide to view next (0 based)
            interval        : null              // interval for automatic rotation
        };

        var responsive      = {
            width           : null,
            height          : null,
            ratio           : null
        };

        // helpful variables
        var vars            = {
            fwd             : 'forward',
            prev            : 'previous'
        };
            
        // run through options and initialise settings
        var init = function() {

            // differentiate slider li from content li
            $slides.addClass('bjqs-slide');

            // conf dimensions, responsive or static
            if( settings.responsive ){
                conf_responsive();
            }
            else{
                conf_static();
            }

            // configurations only avaliable if more than 1 slide
            if( state.slidecount > 1 ){

                // enable random start
                if (settings.randomstart){
                    conf_random();
                }

                // create and show controls
                if( settings.showcontrols ){
                    conf_controls();
                }

                // enable pause on hover
                if (settings.hoverpause && settings.automatic){
                    conf_hoverpause();
                }

            } else {
                // Stop automatic animation, because we only have one slide! 
                settings.automatic = false;
            }

            // slide components are hidden by default, show them now
            $slider.show();
            $slides.eq(state.currentindex).show();

            // Finally, if automatic is set to true, kick off the interval
            if(settings.automatic){
                state.interval = setInterval(function () {
                    go(vars.fwd, false);
                }, settings.animspeed);
            }

        };

        var conf_responsive = function() {

            responsive.width    = $wrapper.outerWidth();
            //responsive.ratio    = responsive.width/settings.width,
			//Duong Edit
			responsive.ratio    = 1,
            responsive.height   = settings.height * responsive.ratio;

            if(settings.animtype === 'fade'){

                // initial setup
                $slides.css({
                    'height'        : settings.height,
                    'width'         : '100%'
                });
                $slides.children('div').css({
                    'height'        : settings.height,
                    'width'         : '100%'
                });
                $slider.css({
                    'height'        : settings.height,
                    'width'         : '100%'
                });
                $wrapper.css({
                    'height'        : settings.height,
                    //'max-width'     : settings.width,
					'width'     : settings.width,
                    'position'      : 'relative'
                });
				
				/*
                if(responsive.width < settings.width){

                    $slides.css({
                        'height'        : responsive.height
                    });
                    $slides.children('img').css({
                        'height'        : responsive.height
                    });
                    $slider.css({
                        'height'        : responsive.height
                    });
                    $wrapper.css({
                        'height'        : responsive.height
                    });

                }*/

                $(window).resize(function() {

                    // calculate and update dimensions
                    responsive.width    = $wrapper.outerWidth();
                    //responsive.ratio    = responsive.width/settings.width,
					responsive.ratio    = 1,
                    responsive.height   = settings.height * responsive.ratio;

                    $slides.css({
                        'height'        : responsive.height
                    });
                    $slides.children('div').css({
                        'height'        : responsive.height
                    });
                    $slider.css({
                        'height'        : responsive.height
                    });
                    $wrapper.css({
                        'height'        : responsive.height
                    });

                });

            }


        };

        var resize_complete = (function () {
            
            var timers = {};
            
            return function (callback, ms, uniqueId) {
                if (!uniqueId) {
                    uniqueId = "Don't call this twice without a uniqueId";
                }
                if (timers[uniqueId]) {
                    clearTimeout (timers[uniqueId]);
                }
                timers[uniqueId] = setTimeout(callback, ms);
            };

        })();

        // enforce fixed sizing on slides, slider and wrapper
        var conf_static = function() {

            $slides.css({
                'height'    : settings.height,
                'width'     : settings.width
            });
            $slider.css({
                'height'    : settings.height,
                'width'     : settings.width
            });
            $wrapper.css({
                'height'    : settings.height,
                'width'     : settings.width,
                'position'  : 'relative'
            });

        };


        var conf_controls = function() {

            // create the elements for the controls
            $c_wrapper  = $('<ul class="bjqs-controls"></ul>');
            $c_fwd      = $('<li class="bjqs-next"><a href="#" data-direction="'+ vars.fwd +'">' + settings.nexttext + '</a></li>');
            $c_prev     = $('<li class="bjqs-prev"><a href="#" data-direction="'+ vars.prev +'">' + settings.prevtext + '</a></li>');

            // bind click events
            $c_wrapper.on('click','a',function(e){

                e.preventDefault();
                var direction = $(this).attr('data-direction');

                if(!state.animating){

                    if(direction === vars.fwd){
                        go(vars.fwd,false);
                    }

                    if(direction === vars.prev){
                        go(vars.prev,false);
                    }

                }

            });

            // put 'em all together
            $c_prev.appendTo($c_wrapper);
            $c_fwd.appendTo($c_wrapper);
            $c_wrapper.appendTo($wrapper);

            // vertically center the controls
            if (settings.centercontrols) {

                $c_wrapper.addClass('v-centered');

                // calculate offset % for vertical positioning
                var offset_px   = ($wrapper.height() - $c_fwd.children('a').outerHeight()) / 2,
                    ratio       = (offset_px / settings.height) * 100,
                    offset      = ratio + '%';

                $c_fwd.find('a').css('top', offset);
                $c_prev.find('a').css('top', offset);

            }

        };


        var conf_hoverpause = function() {

            $wrapper.hover(function () {
                if (!state.paused) {
                    clearInterval(state.interval);
                    state.paused = true;
                }
            }, function () {
                if (state.paused) {
                    state.interval = setInterval(function () {
                        go(vars.fwd, false);
                    }, settings.animspeed);
                    state.paused = false;
                }
            });

        };


        var conf_random = function() {

            var rand            = Math.floor(Math.random() * state.slidecount) + 1;
            state.currentslide  = rand;
            state.currentindex  = rand-1;

        };

        var set_next = function(direction) {

            if(direction === vars.fwd){
                
                if($slides.eq(state.currentindex).next().length){
                    state.nextindex = state.currentindex + 1;
                    state.nextslide = state.currentslide + 1;
                }
                else{
                    state.nextindex = 0;
                    state.nextslide = 1;
                }

            }
            else{

                if($slides.eq(state.currentindex).prev().length){
                    state.nextindex = state.currentindex - 1;
                    state.nextslide = state.currentslide - 1;
                }
                else{
                    state.nextindex = state.slidecount - 1;
                    state.nextslide = state.slidecount;
                }

            }

        };

        var go = function(direction, position) {

            // only if we're not already doing things
            if(!state.animating){

                // doing things
                state.animating = true;

                if(position){
                    state.nextslide = position;
                    state.nextindex = position-1;
                }
                else{
                    set_next(direction);
                }

                // fade animation
                if(settings.animtype === 'fade'){

                    // fade out current
                    $slides.eq(state.currentindex).fadeOut(settings.animduration);
                    // fade in next
                    $slides.eq(state.nextindex).fadeIn(settings.animduration, function(){

                        // update state variables
                        state.animating = false;
                        state.currentslide = state.nextslide;
                        state.currentindex = state.nextindex;

                    });

                }
            }

        };

        // lets get the party started :)
        init();

    };

})(jQuery);
