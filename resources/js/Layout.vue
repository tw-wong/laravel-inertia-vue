<template>
  <main>
    <article>
      <slot />
    </article>
    
    
    <Footer />
  </main>
</template>
<script>
import Footer from './Footer'
export default {
  name: 'Layout',
      
  components: {
    Footer,
  },  
}
</script>