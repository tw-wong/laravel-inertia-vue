<template>
  <main>
    <header>      
      <Header />
    </header>
    <article>
      <slot />
    </article>
  </main>
</template>
<script>
  import Header from './Header'
  export default {
    name: 'Layout',
        
    components: {
      Header,
    },  
  }
</script>