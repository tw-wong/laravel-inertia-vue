<template>
  <div>
    <component :is="headerType"></component>
    <div class="container">
      <h2>Forgot password</h2>
      <div v-if="status" class="alert alert-success" role="alert">
        {{ status }}
      </div>    
      <form 
      class="form" @submit.prevent="submit">
      
        <div class="form-group">
          <label for="userEmail" class="font-weight-bold">Email:</label>
          <input
            type="text" id="userEmail"
            v-model="form.email"
            :class="{'is-invalid': errors.email}"
            class="form-control p-3"
            placeholder="Please enter email"
          >
          <div
            v-if="errors.email"
            class="invalid-feedback"
          >
            {{ errors.email }}
          </div>    
        </div>
        
        <button
          type="submit"
          :disabled="form.processing"
          class="btn btn-primary mr-3"
        >Email password reset link</button>
        
        <inertia-link 
          href="/" 
          method="get" as="button" type="button" 
          class="btn btn-secondary">Cancel</inertia-link>      
      </form>
    </div>
  </div>
</template>

<script>
import { inject } from 'vue'
import { useForm } from '@inertiajs/inertia-vue3';
import Layout from '../../Layout'
import Header from '../../Header'

export default {
  name: 'ForgotPassword', 
  
  layout: Layout,
  components: {Header},
  
  props: {
    errors: Object, 
    status: String,
  }, 
  
  setup (props) {
    const route = inject('route');
    const headerType = 'header';
    
    const form = useForm({
      email: null, 
    });    
    
    const submit = () => {        
      form.value.post(route('password.email'), {
        onFinish: () => form.value.reset('email')
      });
    }
        
    return {
      headerType, 
      form,
      submit
    }
  }
}
</script>      