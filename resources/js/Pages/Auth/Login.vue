<template>
  <div>
    <component :is="headerType"></component>
    <div class="container">
      <h2>Login</h2>
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
          <div class="form-check">
          <input 
            type="checkbox" id="userRemember" 
            v-model="form.remember"          
            class="form-check-input" 
          >
          <label class="form-check-label" for="userRemember">
            Remember me
          </label>
          </div>
        </div>
        
        <inertia-link 
          :href="$route('password.request')" 
          method="get" 
          class="mr-3">Forgot password?</inertia-link>
                          
        <button
          type="submit"
          :disabled="form.processing"
          class="btn btn-primary mr-3"
        >Login</button>                    
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
  name: 'Login', 
  
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
      password: null, 
      remember: false, 
    });    
    
    const submit = () => {        
      form.value.transform(data => ({
        ... data, 
        remember: data.remember ? 'on' : ''
      }))
      .post(route('login'), {
        onFinish: () => form.value.reset('password')
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