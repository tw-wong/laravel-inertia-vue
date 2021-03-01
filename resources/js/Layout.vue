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
    components: {
      Header
    },  
  }
</script>