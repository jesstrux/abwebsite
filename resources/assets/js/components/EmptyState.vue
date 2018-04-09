<template lang="html">
  <div class="no-questions" v-if="numQuestions === 0">
    <h1>Empty</h1>
  </div>
</template>

<script>
export default {
  props: ['questions'],
  data() {
    return {
      numQuestions: -1
    }
  },
  watch: {
    questions() {
      this.numQuestions = this.questions.length;
    }
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
