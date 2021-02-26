<template>
  <div class="container">
    <div class="row">
        <div class="col-2">Title:</div>
        <div class="col-10">{{ event.title }}</div>
    </div>
    <div class="row">
        <div class="col-2">Description:</div>
        <div class="col-10">{{ event.description }}</div>
    </div>
    <div class="row">
        <div class="col-2">Date time:</div>
        <div class="col-10">{{ event.date }}</div>
    </div>
  </div>
</template>

<script>
  import Layout from '../../Layout'

  export default {
    layout: Layout,
    
    props: {
      event: {
        type: Object,
        required: true
      }
    },  
  }
</script>    
    