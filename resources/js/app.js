import 'bootstrap';
import $ from 'jquery';
import Vue from 'vue';
import VeeValidate from 'vee-validate'
require('./bootstrap');
window.$ = window.jQuery = $;
window.route = require('./backend-route');
import store from './store/store';
import CreateNetApp from './vue-components/CreateNetApp.vue'
import getLodash from "lodash/get";
import eachRightLodash from "lodash/eachRight";
import replaceLodash from "lodash/replace";
import CKEditor from '@ckeditor/ckeditor5-vue2';
Vue.use( CKEditor );
Vue.use(VeeValidate, {
    useConstraintAttrs: false,
  })
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
Vue.component('createnetapp',CreateNetApp);

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



})(window.jQuery);

