<template>
  <NuxtLayout name="default">
      <!-- <template #header> Header Changed. </template> -->
    <NuxtPage/>
  </NuxtLayout>
</template>


<script setup lang="ts">
useHead({
  title: 'My App',
  meta: [
    { name: 'description', content: 'My amazing site.' }
  ],
  bodyAttrs: {
    class: 'test'
  },
  script: [ { innerHTML: 'console.log(\'Hello world\')' } ]
})
</script>