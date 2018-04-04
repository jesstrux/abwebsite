<template lang="html">
  <div class="no-questions" v-if="numQuestions === 0">
    <h1>Empty</h1>
  </div>
</template>

<script>
export default {
  data: function () {
    return {
      numQuestions: -1
    }
  },
  created() {
    var currentUrl = window.location.pathname;
    var url = window.Laravel.base_url + '/admin/archived_questions';
    if(currentUrl.indexOf('archived') == -1)
      url= window.Laravel.base_url + '/admin/all_questions';
    axios.get(url).then((response)=>{
        this.numQuestions = response.data.length;
    }).catch((error)=>{
        console.log(error.response.data)
    });
  }
}
</script>

<style lang="css">
.no-questions {
  height: 50vh;
  display: flex;
  align-items: center;
  justify-content: center;
  color: #bbb;
}
h1 {
  font-size: 3.2em;
}
</style>
