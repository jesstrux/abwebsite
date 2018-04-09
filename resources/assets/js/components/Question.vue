<template lang="html">
  <div class="col-md-4 column">
    <h4>{{ question.title }}</h4>
    {{ questionSnippet }}
    <div class="controls">
      <button type="button" class="btn btn-default"
        style="margin: 0 5px 0 0"
        @click="$emit('view-question', question)">View</button>
      <button type="button" class="btn btn-default" v-if="!question.archived"
        @click="display = 'block'">
        Archive
      </button>
    </div>
    <confirm-archive :display="display"
      :question-id="question.id"
      @closeModal="display = 'none'"></confirm-archive>
  </div>
</template>

<script>
export default {
  props: ['question'],
  data: function () {
    return {
      display: 'none'
    }
  },
  computed: {
    questionSnippet: function () {
      return (this.question).question.substring(0, 125) + " ...";
    }
  },
  methods: {
    onArchive() {
      this.$root.$emit('archive', this.question.id);
    }
  }
}
</script>

<style lang="css" scoped>
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
