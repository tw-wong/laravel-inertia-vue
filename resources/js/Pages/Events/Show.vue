<template>
  <div>
    <component :is="headerType"></component>
    <div class="container">
      <h2>Event info</h2>
      <div class="row">
        <div class="col-2 font-weight-bold">Title:</div>
        <div class="col-10">{{ event.title }}</div>
      </div>
      <div class="row">
        <div class="col-2 font-weight-bold">Description:</div>
        <div class="col-10">{{ event.description }}</div>
      </div>
      <div class="row">
        <div class="col-2 font-weight-bold">Date:</div>
        <div class="col-10">{{ event.date }}</div>
      </div>
    </div>
  </div>
</template>

<script>
import Layout from '../../Layout'
import Header from '../../Header'
import AppHeader from '../../AppHeader'

export default {
  name: 'Show', 
  
  layout: Layout,  
  components: {Header, AppHeader},
  
  // metaInfo: {
  //   title: 'Show event',
  //   titleTemplate: '%s - Laravel Inertia.js',
  // }, 
  
  props: {
    event: {
      type: Object,
      required: true
    }, 
    
    user: {
      type: Object,
      required: false, 
    },    
    
    title: {
      type: String,
      required: true
    }
  }, 

  setup(props){
    const headerType = !Object.is(props.user, null) ? 'app-header' : 'header';
    return {
      headerType,
    }
  }    
}
</script>
    