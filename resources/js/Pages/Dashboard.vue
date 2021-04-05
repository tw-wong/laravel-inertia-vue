<template>
  <div>
    <component :is="headerType"></component>
    <div class="container"> 
      This is user dashboard page. <br />
    </div>
  </div>
</template>

<script>
import Layout from '../Layout'
import AppHeader from '../AppHeader'

export default {
  name: 'Dashboard', 
    
  layout: Layout,
  components: {AppHeader},
    
  props: { 
    user: {
      type: Object,
      required: false, 
    },        
  }, 
    
  setup (props) {
    const headerType = 'app-header';
    
    return {
      headerType,
    }
  }
}
</script>