require('./bootstrap');

import Vue from "vue";
import MultiUploader from './components/MultiImageUploader'

window.VBUS = new Vue();

new Vue({
    el: "#app",
    components: {
        MultiUploader
    }
});
