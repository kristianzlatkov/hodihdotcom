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

const Swiper = require('swiper/swiper-bundle');
import {lazyLoadingInit} from "./components/lazy_loading";

require('lightgallery.js/src/js/lightgallery');

require('lightgallery.js/src/js/lg-utils');
//Validation
require('jquery-validation/dist/jquery.validate');

import * as toastr from 'toastr';
window.toastr = toastr;

// Lazy loading
$(document).ready(function () {
    lazyLoadingInit();
})

// Light gallery init
$(document).ready(function () {
    lightGallery(document.getElementById('lightgallery'))
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

$(document).ready(function () {
    // Articles
    if($(window).width() > 992) {
        var swiper = new Swiper('.swiper-container', {
            slidesPerView: 2,
            spaceBetween: 30,
            pagination: {
                el: '.swiper-pagination',
                clickable: true,
            },
        });
    } else {
        var swiper = new Swiper('.swiper-container', {
            slidesPerView: 1,
            spaceBetween: 30,
            pagination: {
                el: '.swiper-pagination',
                clickable: true,
            },
        });
    }

    // Gallery
    if($(window).width() > 992) {
        var swiperGallery = new Swiper('.swiper-gallery-container', {
            slidesPerView: 3,
            spaceBetween: 30,
            pagination: {
                el: '.swiper-pagination',
                clickable: true,
            },
        });
    } else {
        var swiperGallery = new Swiper('.swiper-gallery-container', {
            slidesPerView: 2,
            spaceBetween: 30,
            pagination: {
                el: '.swiper-pagination',
                clickable: true,
            },
        });
    }
});

$(document).ready(function() {
    $('#subscribe').validate();
    $('#contact-us-form').validate();
});

// Set language for jquery-validation
$(document).ready(() => {
    const lang = $('body').data('locale');
    require('jquery-validation/dist/localization/messages_'+lang);
})
