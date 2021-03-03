<template>
  <div class="container">
    <form
        class="form" @submit.prevent="submit">
    
        <div class="form-group mb-5">
          <input
            v-model="form.title"
            :class="{'is-invalid': errors.title}"
            class="form-control h-auto form-control-solid py-4 px-8"
            type="text"
            placeholder="please enter title"
          >
          <div
            v-if="errors.title"
            class="invalid-feedback text-left"
          >
            {{ errors.title }}
          </div>
        </div>
        
        <div class="form-group mb-5">
          <textarea 
            v-model="form.description" 
            placeholder="please enter description" 
            :class="{'is-invalid': errors.description}"
            class="form-control h-auto form-control-solid py-4 px-8"
          ></textarea>
          
          <div
            v-if="errors.description"
            class="invalid-feedback text-left"
          >
            {{ errors.description }}
          </div>
        </div>
        
        <div class="form-group mb-5">
          <input
            v-model="form.date"
            :class="{'is-invalid': errors.date}"
            class="datepicker form-control h-auto form-control-solid py-4 px-8"
            type="text"
            placeholder="please enter date"
          >
          <div
            v-if="errors.date"
            class="invalid-feedback text-left"
          >
            {{ errors.date }}
          </div>
        </div>
    
        <div class="form-group d-flex flex-wrap flex-center mt-10">
          <button
            type="submit"
            :disabled="form.processing"
            class="btn btn-primary font-weight-bold px-9 py-4 my-3 mx-2"
          >
            Create
          </button>
          <inertia-link
            :href="$route('events.index')"
            class="btn btn-light-primary font-weight-bold px-9 py-4 my-3 mx-2"
          >
            Cancel
          </inertia-link>
        </div>    
    </form>
  </div>
</template>

<script>
  import Layout from '../../Layout'

  export default {
    name: 'Create', 
    layout: Layout,
    
    // metaInfo: {
    //   title: 'Create event',
    //   titleTemplate: '%s - Laravel Inertia.js',
    // }, 
    
    props: {
      errors: Object,
    }, 
    
    data() {
      return {
        form: this.$inertia.form({
          title: null,
          description: null, 
          date: null, 
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
        this.$inertia.post(this.$route('events.store'), this.form);
      }
    },
  }
</script>