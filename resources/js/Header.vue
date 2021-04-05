<template>
  <div class="d-flex flex-column flex-md-row align-items-center p-3 px-md-4 mb-3 bg-white border-bottom shadow-sm">
    <h5 class="my-0 mr-md-auto font-weight-normal">
      <inertia-link href="/" class="text-dark">Laravel-Inertia-Vue demo</inertia-link>
    </h5>
    
    <nav class="my-2 my-md-0 mr-md-3">
      <inertia-link :href="$route('events.create')" class="p-2 text-dark">Create event</inertia-link>
      <inertia-link :href="$route('events.index')" class="p-2 text-dark">List of event</inertia-link>
      
      <span v-if="$route().has('register')">
        <inertia-link :href="$route('register')" class="p-2 text-dark">Register</inertia-link>
      </span>
      
      <span v-if="$route().has('login')">
      <inertia-link :href="$route('login')" class="p-2 text-dark">Log in</inertia-link>
      </span>
    </nav>
  </div>
</template>

<script>
export default {
  name: 'Header',
}
</script>