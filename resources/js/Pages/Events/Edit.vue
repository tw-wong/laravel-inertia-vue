<template>
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
</template>

<script>
  import Layout from '../../Layout'

  export default {
    name: 'Edit', 
    
    layout: Layout,

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
    
    data() {
      return {
        form: this.$inertia.form({
          title: this.event.title,
          description: this.event.description, 
          date: this.event.date, 
        }),
      }
    }, 
    
    mounted() {
      var self = this;
      $('.datepicker').datepicker({
        onSelect:function(selectedDate, datePicker) {
            self.form.date = selectedDate;
        }, 
        dateFormat: 'yy-mm-dd'
      });
    },    
    
    methods: {
      submit() {
        this.$inertia.put(this.$route('events.update', this.event.id), this.form);
      }
    },
  }
</script>