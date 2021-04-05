<template>
  <div>
    <component :is="headerType"></component>
    <div class="container">
      <h2>My event</h2>
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
            <td><inertia-link :href="$route('events.edit', event.id)">{{ event.title }}</inertia-link></td>
            <td>{{ event.date }}</td>
            <td><a href="javascript:;" @click="deleteEvent(event.id)">Delete</a></td>
          </tr>
        </tbody>
      </table>
    </div>
  </div>
</template>

<script>
import { inject } from 'vue'
import { Inertia } from '@inertiajs/inertia'
import Layout from '../../Layout'
import AppHeader from '../../AppHeader'

export default {
  name: 'Events', 
  
  layout: Layout,
  components: {AppHeader},
  
  // metaInfo: {
  //   title: 'Event listing',
  //   titleTemplate: '%s - Laravel Inertia.js',
  // }, 
        
  props: {
    events: {
      type: Array,
      required: true
    }
  }, 
  
  setup () {
    const route = inject('route');
    const headerType = 'app-header';
    
    const deleteEvent = (id) => {
      if(confirm("Do you really want to delete?")){        
        Inertia.delete(route('events.destroy', id));
      }
    }
    
    return {
      headerType, 
      deleteEvent,
    }    
  }
}
</script>