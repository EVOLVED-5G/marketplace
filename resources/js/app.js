import 'bootstrap';
import $ from 'jquery';
import Vue from 'vue';
import VeeValidate from 'vee-validate'

require('./bootstrap');
window.$ = window.jQuery = $;
window.route = require('./backend-route');
import axios from "axios";
import VueToastr from "vue-toastr";

import store from './store/store';
import CreateNetApp from './vue-components/CreateNetApp.vue'
import getLodash from "lodash/get";
import eachRightLodash from "lodash/eachRight";
import replaceLodash from "lodash/replace";
import CKEditor from '@ckeditor/ckeditor5-vue2';
import editNetapp from "./vue-components/edit-netapp.vue";
import ProductCatalog from "./vue-components/productCatalog.vue";
import PurchasedNetappModal from './vue-components/common/PurchasedNetappModal.vue'
import MarketplaceOverview from './vue-components/admin-components/marketplace-overview.vue'

Vue.use(VueToastr);
Vue.mixin({
    data(){
        return{
        appurl: process.env.MIX_API_URL,
        showPurchasedModel:false,
        }
    },
    methods: {
        saveNetapp(netappId,loggedInUserId,refreshPage=false){
            axios
            .post(`${process.env.MIX_API_URL}/api/save-netapp`, {
              netapp_id: netappId,
              user_id: loggedInUserId,
            })
            .then((response) => {
              this.savedNetapp = true;
              if(refreshPage){
                  window.location.reload();
              }
            })
            .catch((error) => {
              console.log(error);
            });
        },
        unsaveNetapp(savedNetappId,refreshPage=false){
            axios
            .patch(`${process.env.MIX_API_URL}/api/unsave-netapp`, { id: savedNetappId })
            .then((response) => {
              this.savedNetapp = false;
              if(refreshPage){
                window.location.reload();
            }
            })
            .catch((error) => {
              console.log(error);
            });
        },
        purchaseNetapp(formData,refreshPage=false){
            this.handleLoader('show');
            axios
            .post(`${process.env.MIX_API_URL}/api/purchase-netapp`, formData)
            .then((response) => {
                this.handleLoader('hide');
                this.showPurchasedModel=true
            })
            .catch((error) => {
              console.log(error);
            });
        },
        handleLoader(attribute) {
            var yourUl = document.getElementById("loader");
            yourUl.style.display = attribute === "hide" ? "none" : "block";
        },
    },
});

Vue.use(CKEditor);
Vue.use(VeeValidate, {
    useConstraintAttrs: false,
});
axios.create({
    baseURL: process.env.MIX_API_URL + "/api",
    timeout: 1000,
});
window.translate = function (string, args) {
    let value = getLodash(window.i18n, string);

    eachRightLodash(args, (paramVal, paramKey) => {
        value = replaceLodash(value, `:${paramKey}`, paramVal);
    });
    return value;
};

Vue.prototype.trans = (string, args) => {
    return window.translate(string, args);
};

Vue.component(
    "modal",
    require("./vue-components/common/ModalComponent").default
);
Vue.component("createnetapp", CreateNetApp);
Vue.component("edit-netapp", editNetapp);
Vue.component("product-catalog", ProductCatalog);
Vue.component("purchased-netapp-modal",PurchasedNetappModal)
Vue.component('marketplace-overview',MarketplaceOverview)

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

    document.addEventListener("swiped-left", openSideNav);
    document.addEventListener("swiped-right", closeSideNav);



})(window.jQuery);

