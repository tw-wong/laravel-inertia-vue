<template>
  <div>
    <component :is="headerType"></component>
    <div class="container">
      <h2>List of event</h2>
      <div v-if="$page.props.flash.message" class="alert alert-success" role="alert">
        {{ $page.props.flash.message }}
      </div>
      
      <table class="table table-striped table-bordered">
        <thead class="thead-dark">
          <tr>
            <th scope="col">#</th>
            <th scope="col">Title</th>
            <th scope="col">Date</th>
          </tr>
        </thead>
        <tbody>
          <tr v-for="(event, index) in events" :key="event.id">
            <th scope="row">{{ index + 1 }}</th>
            <td><inertia-link :href="$route('events.show', event.id)">{{ event.title }}</inertia-link></td>
            <td>{{ event.date }}</td>          
          </tr>
        </tbody>
      </table>
    </div>
  </div>
</template>

<script>
import Layout from '../../Layout'
import Header from '../../Header'
import AppHeader from '../../AppHeader'

export default {
  name: 'Index', 
  
  layout: Layout,  
  components: {Header, AppHeader},
  
  // metaInfo: {
  //   title: 'Event listing',
  //   titleTemplate: '%s - Laravel Inertia.js',
  // }, 
        
  props: {
    events: {
      type: Array,
      required: true,
    }, 
    user: {
      type: Object,
      required: false, 
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