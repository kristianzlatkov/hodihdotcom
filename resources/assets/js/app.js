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

import {lazyLoadingInit} from "./components/lazy_loading";

// Lazy loading
$(document).ready(function() {
    lazyLoadingInit();
})

// Navigation
$(document).ready(function() {
   $('#navbarNavDropdown').on('show.bs.collapse', function() {
       $(this).parent().find('.navbar-toggler').first().addClass('is-active')
   });

   $('#navbarNavDropdown').on('hide.bs.collapse', function() {
       $(this).parent().find('.navbar-toggler').first().removeClass('is-active')
   })
});
