<template>
  <div>
    <component :is="headerType"></component>
    <div class="container">
      <h2>Reset password</h2>
          
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
        
        <div class="form-group">
          <label for="userPassword" class="font-weight-bold">Password:</label>
          <input
            type="password" id="userPassword"
            v-model="form.password"
            :class="{'is-invalid': errors.password}"
            class="form-control p-3"
          >
          <div
            v-if="errors.password"
            class="invalid-feedback"
          >
            {{ errors.password }}
          </div>    
        </div>
        
        <div class="form-group">
          <label for="userPasswordConfirmation" class="font-weight-bold">Confirm password:</label>
          <input
            type="password" id="userPasswordConfirmation"
            v-model="form.password_confirmation"
            :class="{'is-invalid': errors.password_confirmation}"
            class="form-control p-3"
          >
          <div
            v-if="errors.password_confirmation"
            class="invalid-feedback"
          >
            {{ errors.password_confirmation }}
          </div>    
        </div>                
        
        <button
          type="submit"
          :disabled="form.processing"
          class="btn btn-primary mr-3"
        >Reset password</button>
        
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
  name: 'ResetPassword', 
  
  layout: Layout,
  components: {Header},
  
  props: {
    errors: Object,
    email: String,  
    token: String, 
  }, 
  
  setup (props) {
    const route = inject('route');
    const headerType = 'header';
    
    const form = useForm({
      token: props.token, 
      email: props.email, 
      password: null, 
      password_confirmation: null, 
    });    
    
    const submit = () => {      
      form.value.post(route('password.update'));
    }
        
    return {
      headerType,
      form,
      submit
    }
  }
}
</script>      