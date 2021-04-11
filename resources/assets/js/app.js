window.Popper = require('@popperjs/core/dist/esm/popper').default;
require('@popperjs/core/dist/esm/popper');
require('es6-promise').polyfill();
require('jquery');
var $ = require('jquery');
import jquery from 'jquery';

global.jQuery = jquery;
global.$ = jquery;
global.jquery = jquery;
require('bootstrap/dist/js/bootstrap');

/*const Swipe = require('swipejs');*/
import {lazyLoadingInit} from "./components/lazy_loading";

// Lazy loading
$(document).ready(function () {
    lazyLoadingInit();
})

// Navigation
$(document).ready(function () {
    $('#navbarNavDropdown').on('show.bs.collapse', function () {
        $(this).fadeIn('slow', function () {
            $(this).addClass('show');
        });

        $(this).prev().addClass('is-active');
    });

    $('#navbarNavDropdown').on('hide.bs.collapse', function () {
        $(this).fadeOut('slow', function () {
            $(this).removeClass('show');
        });
        $(this).prev().removeClass('is-active');
    });

    if($(window).width() < 992) {
        $('#navbarNavDropdown .dropdown-toggle').on('show.bs.dropdown', function () {
            $(this).next().slideDown('fast', function () {
                $(this).addClass('show');
            });
        });

        $('#navbarNavDropdown .dropdown-toggle').on('hide.bs.dropdown', function () {
            $(this).next().slideUp('fast', function () {
                $(this).removeClass('show');
            });
        });
    } else {
        $('#navbarNavDropdown .dropdown-toggle').on('show.bs.dropdown', function () {
            $(this).next().fadeIn('fast', function () {
                $(this).addClass('show');
            });
        });

        $('#navbarNavDropdown .dropdown-toggle').on('hide.bs.dropdown', function () {
            $(this).next().fadeOut('fast', function () {
                $(this).removeClass('show');
            });
        });
    }
});
