<template>
  <div>    
    <component :is="headerType"></component>
    <div class="container">
      Welcome to the demo CRUD application built using <a href="https://laravel.com/" target="_blank">Laravel</a>, <a href="https://inertiajs.com/" target="_blank">Inertia</a> and <a href="https://v3.vuejs.org/" target="_blank">Vue.js</a>.<br />
      
      Laravel v{{ laravelVersion }} (PHP v{{ phpVersion }})
    </div>
  </div>
</template>

<script>
import Layout from '../Layout'
import Header from '../Header'
import AppHeader from '../AppHeader'

export default {
  name: 'Home', 
  
  layout: Layout, 
  components: {Header, AppHeader},
  
  props: {
    laravelVersion: {
      type: String,
      required: true, 
    },
    
    phpVersion: {
      type: String,
      required: true, 
    },
    
    user: {
      type: Object,
      required: false, 
    },
  },
  
  setup(props){
    const headerType = !Object.is(props.user, null) ? 'app-header' : 'header';
    return {
      headerType,
    }
  }
  
  // metaInfo: {
  //   title: 'Home',
  //   titleTemplate: '%s - Laravel Inertia.js',
  // },     
}
</script>