<template>
  <div> {{ $page.props.flash.message }}</div>
</template>

<script>
  import Layout from '../../Layout'

  export default {
    // Using a render function
    layout: (h, page) => h(Layout, [page]),

    // Using the shorthand
    layout: Layout,   
    
    props: {
      title: String,
    },
  }
</script>