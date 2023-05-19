<template>

  <div class="tdevContain" ref="scrollContainer">
    <div class="text-center"><h2>Google Place API</h2> <span class="descriptTextv2">(Nuxt + Laravel)</span></div>
    <div class="text-center"><blockquote>You can search and click restaurant to show in google maps</blockquote></div>
    <div class="input-group mb-3">
      <input v-model="textInput" type="text" class="form-control" placeholder="Recipient's username" aria-label="Recipient's username" aria-describedby="button-addon2">
      <button @click="getText" class="btn btn-outline-secondary" type="button" id="button-addon2"><i class="fa-solid fa-magnifying-glass"></i></button>
    </div>
    
    <div class="mainPlace">
      <!-- looping array results inside dataLoad -->
      <div class="placeShow" v-if="dataLoad" v-for="result in dataLoad.results">
        <div @click="goToGoogle(result.place_id)" class="overAll">
          <div class="imgTab">
            <img v-if="result.img_fromRef" :src="result.img_fromRef" width="75" height="75" />
          </div>
          <div class="detailTab">
            <p class="unstyled">{{ result.name }}</p>
            <p class="unstyled">{{ cutString(result.formatted_address, 0, 50) }}</p>
          </div>
          <div class="reviewTab">
            <i class="fa-solid fa-star"></i><span>{{ result.rating }}</span> <span class="descriptText">({{ result.user_ratings_total }})</span>
          </div>
        </div>
      </div> 
      <!-- looping array results inside dataLoad -->
    </div>
    
  </div>
  
</template>

<script>
export default {
  data() {
    return {
      textInput: 'Bang Sue', //Default for searching
      dataLoad:''
    };
  },
  methods: {
    cutString(str, start, end) {
      return str.slice(start, end);
    },
    goToGoogle(placeid) {
      window.open('https://www.google.com/maps/search/?api=1&query=Google&query_place_id=' + placeid,'_blank'); //Open google maps with place id
    },
    async getText() {

      if(!this.textInput) {
        this.textInput = 'Bang Sue';
      }

      try {
        // Fetching data from laravel api 
        const { data: dataLoad } = await useFetch('http://127.0.0.1:8000/api?keyword=' + this.textInput , {
          cache: 'force-cache' 
        });
        this.dataLoad = dataLoad
      } catch (error) {
        console.error('Error fetching data:', error);

      }
  
    },
  },
};
</script>