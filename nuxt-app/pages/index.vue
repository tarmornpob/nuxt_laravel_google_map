<template>

  <div>
    <h2>Welcome to the place api</h2>
      <span>{{ textsearch }}</span>
      <input v-model="inputValue" type="text" placeholder="Enter a value" />
        <button @click="fetchData">Submit</button>
    <hr/>
    <!-- <span> {{ dataLoad.next_page_token }}</span> -->
    <div v-for="result in dataLoad.results">

     <img v-if="result.img_fromRef" :src="result.img_fromRef" width="100" height="100" />

      <span>{{ result.name }}</span>
    </div> 
  </div>
</template>

<script setup>

  const { data: dataLoad } = await useFetch('http://127.0.0.1:8000/api')


</script>
