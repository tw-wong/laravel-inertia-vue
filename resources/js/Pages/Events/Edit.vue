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
          <!-- <input
            v-model="form.date_time"
            :class="{'is-invalid': errors.date_time}"
            class="form-control h-auto form-control-solid py-4 px-8"
            type="datetime-local"
            placeholder="please enter date time"
          > -->
          
          <input type="text" class="datepicker" />
          <div
            v-if="errors.date_time"
            class="invalid-feedback text-left"
          >
            {{ errors.date_time }}
          </div>
        </div>
    
        <div class="form-group d-flex flex-wrap flex-center mt-10">
          <button
            type="submit"
            :disabled="form.processing"
            class="btn btn-primary font-weight-bold px-9 py-4 my-3 mx-2"
          >
            Update
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
    layout: Layout,
    
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
          date_time: this.event.date_time, 
        }),
      }
    }, 
    
    methods: {
      submit() {
        this.$inertia.put(this.$route('events.update', this.event.id), this.form);
      }
    },
  }
</script>