<template>
  <div class="container"> 
    This is home page. 
  </div>
</template>

<script>
  import Layout from '../Layout'

  export default {
    layout: Layout, 
    
    metaInfo: {
      title: 'Home',
      titleTemplate: '%s - Laravel Inertia.js',
    },     
  }
</script>