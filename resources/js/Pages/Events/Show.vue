<template>
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
    
    <inertia-link 
      :href="$route('events.edit', event.id)" 
      method="get" as="button" type="button" 
      class="btn btn-primary mr-3">Edit</inertia-link>
      
    <inertia-link 
      :href="$route('events.index')" 
      method="get" as="button" type="button" 
      class="btn btn-secondary">Back</inertia-link>
  </div>
</template>

<script>
import Layout from '../../Layout'

export default {
  name: 'Show', 
  
  components: {
    Layout, 
  }, 
  
  layout: Layout,  
  
  // metaInfo: {
  //   title: 'Show event',
  //   titleTemplate: '%s - Laravel Inertia.js',
  // }, 
  
  props: {
    event: {
      type: Object,
      required: true
    }, 
    
    title: {
      type: String,
      required: true
    }
  },   
}
</script>
    