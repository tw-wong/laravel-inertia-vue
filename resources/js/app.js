// import { App, plugin } from '@inertiajs/inertia-vue'
// import Vue from 'vue'
// import VueMeta from 'vue-meta'

// Vue.use(plugin)
// Vue.use(VueMeta)

// Vue.prototype.$route = route

// const el = document.getElementById('app')

// new Vue({
//   render: h => h(App, {
//     props: {
//       initialPage: JSON.parse(el.dataset.page),
//       resolveComponent: name => import(`./Pages/${name}`).then(module => module.default), 
//       resolveErrors: page => (page.props.errors || {}),
//     },
//   }),
// }).$mount(el);

// // JQuery and its plugins
// global.$ = global.jQuery  = require('jquery');
// global.datepicker         = require('jquery-ui/ui/widgets/datepicker');

import 'bootstrap'
import { createApp, h } from 'vue'
import { App, plugin } from '@inertiajs/inertia-vue3'
import { InertiaProgress } from '@inertiajs/progress'

// import Popper from 'popper.js';
// import VueMeta from 'vue-meta'

const el = document.getElementById('app')

const app = createApp({
  render: () => h(App, {
    initialPage: JSON.parse(el.dataset.page),
    resolveComponent: name => require(`./Pages/${name}`).default,
  })
});

app.config.globalProperties.$route = route;
app.use(plugin);
app.use(InertiaProgress);
// app.use(Popper);
// app.use(VueMeta);
app.provide('route', route);
app.mount(el);

// // JQuery and its plugins
global.$ = global.jQuery  = require('jquery');
global.datepicker         = require('jquery-ui/ui/widgets/datepicker');