<template>
  <div>
    <component :is="headerType"></component>
    <div class="container">
      <h2>Register</h2>
      <form 
      class="form" @submit.prevent="submit">
      
        <div class="form-group">
          <label for="userName" class="font-weight-bold">Name:</label>
          <input
            type="text" id="userName"
            v-model="form.name"
            :class="{'is-invalid': errors.name}"
            class="form-control p-3"
            placeholder="Please enter name"
          >
          <div
            v-if="errors.name"
            class="invalid-feedback"
          >
            {{ errors.name }}
          </div>    
        </div>
        
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
        >Register</button>
        
        <inertia-link 
          href="/" 
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
import Header from '../../Header'

export default {
  name: 'Register', 
  
  layout: Layout,
  components: {Header},
  
  props: {
    errors: Object, 
  }, 
  
  setup (props) {
    const route = inject('route');
    const headerType = 'header';
    
    const form = useForm({
      name: null,
      email: null, 
      password: null, 
      password_confirmation: null, 
    });    
    
    const submit = () => {    
      form.value.post(route('register'));      
    }
        
    return {
        headerType,
        form,
        submit,         
    }
  }
}
</script>