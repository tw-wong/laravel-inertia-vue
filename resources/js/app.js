import { App, plugin } from '@inertiajs/inertia-vue'
import Vue from 'vue'
import VueMeta from 'vue-meta'

Vue.use(plugin)
Vue.use(VueMeta)

Vue.prototype.$route = route

const el = document.getElementById('app')

new Vue({
  render: h => h(App, {
    props: {
      initialPage: JSON.parse(el.dataset.page),
      resolveComponent: name => import(`./Pages/${name}`).then(module => module.default), 
      resolveErrors: page => (page.props.errors || {}),
    },
  }),
}).$mount(el);

// JQuery and its plugins
global.$ = global.jQuery  = require('jquery');
global.datepicker         = require('jquery-ui/ui/widgets/datepicker');
