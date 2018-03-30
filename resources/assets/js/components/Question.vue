<template lang="html">
  <div class="col-md-4 column">
    <h4>{{ question.title }}</h4>
    {{ questionSnippet }}
    <div class="controls">
      <button type="button" class="btn btn-default"
        style="margin: 0 5px 0 0"
        @click="$emit('view-question', question.question)">View</button>
      <button type="button" class="btn btn-default">Archive</button>
    </div>
  </div>
</template>

<script>
export default {
  props: ['question'],
  computed: {
    questionSnippet: function () {
      return (this.question).question.substring(0, 125) + " ...";
    }
  }
}
</script>

<style lang="css">
.column {
  height: 160px;
  overflow: hidden;
  text-align: justify;
}
.controls {
  margin: 15px 0 0;
  display: flex;
  justify-content: flex-end;
}
</style>
