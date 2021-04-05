<template>
  <div>
    <component :is="headerType"></component>
    <div class="container">
      <h2>Edit event</h2>
      <form
          class="form" @submit.prevent="submit">
      
        <div class="form-group">
          <label for="eventTitle" class="font-weight-bold">Title:</label>
          <input
            type="text" id="eventTitle"
            v-model="form.title"
            :class="{'is-invalid': errors.title}"
            class="form-control p-3"
            placeholder="Please enter title"
          >
          <div
            v-if="errors.title"
            class="invalid-feedback"
          >
            {{ errors.title }}
          </div>    
        </div>
        
        <div class="form-group">
          <label for="eventDescription" class="font-weight-bold">Description:</label>
          <textarea
            id="eventDescription"
            v-model="form.description"
            :class="{'is-invalid': errors.description}"
            class="form-control p-3"
            placeholder="Please enter description"
          ></textarea>
          <div
            v-if="errors.description"
            class="invalid-feedback"
          >
            {{ errors.description }}
          </div>
        </div>
        
        <div class="form-group">
          <label for="eventDate" class="font-weight-bold">Date:</label>
          <input
            type="text" id="eventDate"
            v-model="form.date"
            :class="{'is-invalid': errors.date}"
            class="form-control p-3 datepicker"
            autocomplete="off"
            placeholder="Please enter date"
          >
          <div
            v-if="errors.date"
            class="invalid-feedback"
          >
            {{ errors.date }}
          </div>    
        </div>
        
        <button
          type="submit"
          :disabled="form.processing"
          class="btn btn-primary mr-3"
        >Update</button>
        
        <inertia-link 
          :href="$route('events.index')" 
          method="get" as="button" type="button" 
          class="btn btn-secondary">Cancel</inertia-link>
      </form>
    </div>
  </div>
</template>

<script>
import { inject, onMounted } from 'vue'
import { useForm } from '@inertiajs/inertia-vue3';
import Layout from '../../Layout'
import AppHeader from '../../AppHeader'

export default {
  name: 'Edit', 
  
  layout: Layout,
  components: {AppHeader},

  // metaInfo: {
  //   title: 'Edit event',
  //   titleTemplate: '%s - Laravel Inertia.js',
  // }, 
    
  props: {
    errors: {
      type: Object,
      required: false, 
    },
    
    event: {
      type: Object,
      required: true
    }
  }, 
  
  setup (props) {
    const route = inject('route');
    const headerType = 'app-header';
    
    const form = useForm({
      title: props.event.title,
      description:  props.event.description, 
      date:  props.event.date, 
    });
    
    onMounted(() => {
      $('.datepicker').datepicker({
        onSelect:function(selectedDate) {
          form.value.date = selectedDate;
        }, 
        dateFormat: 'yy-mm-dd'
      });      
    })
    
    const submit = () => {    
      form.value.put(route('events.update', props.event.id));      
    }
    
    return {
      headerType,
      form, 
      submit
    }    
  }
}
</script>