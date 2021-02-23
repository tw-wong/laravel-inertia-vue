<template>
  <div class="container">
    <div v-if="$page.props.flash.message" class="alert alert-success" role="alert">
      {{ $page.props.flash.message }}
    </div>
    
    <table class="table table-striped table-bordered">
      <thead class="thead-dark">
        <tr>
          <th scope="col">#</th>
          <th scope="col">Title</th>
          <th scope="col">Date</th>
          <th scope="col">Action</th>
        </tr>
      </thead>
      <tbody>
        <tr v-for="(event, index) in events" :key="event.id">
          <th scope="row">{{ index + 1 }}</th>
          <td><inertia-link :href="$route('events.show', event.id)">{{ event.title }}</inertia-link></td>
          <td>{{ event.date_time }}</td>
          <td><a href="">Edit</a> | <a href="">Delete</a></td>
        </tr>
      </tbody>
    </table>
  </div>
</template>

<script>
  import Layout from '../../Layout'

  export default {
    layout: Layout, 
    
    props: {
      events: {
        type: Array,
        required: true
      }
    },    
  }
</script>