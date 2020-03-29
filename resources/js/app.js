/**
 * First we will load all of this project's JavaScript dependencies which
 * includes Vue and other libraries. It is a great starting point when
 * building robust, powerful web applications using Vue and Laravel.
 */

require('./bootstrap');

window.Vue = require('vue');

Vue.component("Namaz", require("./components/Namaz.vue").default);

new Vue({
    el: "#prayer",
    data() {
        return {
            prayers: [
                { id: 1, title: "Sübh", time: "00:00" },
                { id: 2, title: "Günəş", time: "00:00" },
                { id: 3, title: "Zöhr", time: "00:00" },
                { id: 4, title: "Əsr", time: "00:00" },
                { id: 5, title: "Məğrib", time: "00:00" },
                { id: 6, title: "İşa", time: "00:00" }
            ],
            location: "Bakı"
        };
    },
    computed: {
    	tarix: function(){
    		const trx = new Date();
    		return trx.getDate() + "-" + trx.getMonth()+1 + "-" + trx.getFullYear();
    	}
    },
    methods: {
        insertTimes(data) {
            for (i = 0; i < 6; i++) {
                this.prayers[i]["time"] = data.prayers[i];
            }
        }
    },
    mounted() {
        axios
            .get("https://nam.az/api/0")
            .then(response => this.insertTimes(response.data));
    }
});

const app = new Vue({
    el: '#app',
});
