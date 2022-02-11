import 'bootstrap';
import $ from 'jquery';
import Vue from 'vue';

require('./bootstrap');
window.$ = window.jQuery = $;
window.route = require('./backend-route');
import store from './store/store';

import getLodash from "lodash/get";
import eachRightLodash from "lodash/eachRight";
import replaceLodash from "lodash/replace";


window.translate = function (string, args) {
    let value = getLodash(window.i18n, string);

    eachRightLodash(args, (paramVal, paramKey) => {
        value = replaceLodash(value, `:${paramKey}`, paramVal);
    });
    return value;
}

Vue.prototype.trans = (string, args) => {
    return window.translate(string, args);
};

Vue.component('modal', require('./vue-components/common/ModalComponent').default);


const app = new Vue({
    el: '#app',
    store: store
});
(function ($) {



    let closeDismissableAlerts = function () {
        setTimeout(function () {
            /*Close any flash message after some time*/
            $(".alert-dismissible").fadeTo(4000, 500).slideUp(500);
        }, 3000);
    };




    $(window).scroll(function () {
        if ($(this).scrollTop() > 40) {
            $('header .menu').addClass("scrolled");
            $('header .menu').removeClass("border-menu");
        } else {

            $('header .menu').removeClass("scrolled");
            $('header .menu').addClass("border-menu");
        }
    });

    var smoothScrollOnHashChange = function () {
        var hash = window.location.hash;

        if ($(hash).length > 0) {
            var top = $(hash).offset().top;
            console.log(top);
            window.scrollTo({
                top: top - 150,
                left: 0,
                behavior: 'smooth'
            });
            return false;
        }

    }

    let init = function () {
        closeDismissableAlerts();
        window.onhashchange = smoothScrollOnHashChange;
        window.onload = smoothScrollOnHashChange;
    };

    $(function () {
        $(document).ready(function () {
            init();
        })
    });




    // mouse hover
    $(".mouse-cursor-gradient-tracking").on("mousemove", e => {
        let rect = e.target.getBoundingClientRect();
        let x = e.clientX - rect.left;
        let y = e.clientY - rect.top;
        $(this).css("--x", x + "px");
        $(this).css("--y", y + "px");

    });


    // mobile menu

    const mainNavigation = document.querySelector(".main-navigation");
    const overlay = mainNavigation.querySelector(".overlay");
    const toggler = mainNavigation.querySelector(".navbar-toggler");

    const openSideNav = () => mainNavigation.classList.add("active");
    const closeSideNav = () => mainNavigation.classList.remove("active");

    toggler.addEventListener("click", openSideNav);
    overlay.addEventListener("click", closeSideNav);

    document.addEventListener("swiped-right", openSideNav);
    document.addEventListener("swiped-left", closeSideNav);



})(window.jQuery);

