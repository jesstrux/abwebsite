<template lang="html">
  <div class="col-md-4 column">
    <h4>{{ question.title }}</h4>
    {{ questionSnippet }}
    <div class="controls">
      <button type="button" class="btn btn-default"
        style="margin: 0 5px 0 0"
        @click="$emit('view-question', question)">View</button>
      <button type="button" class="btn btn-default"
        :disabled="loading" @click="archive()" v-if="!archived">
        <transition>
          <span v-if="!loading" key="normal">Archive</span>
          <span v-else key="archive">Archiving</span>
        </transition>
      </button>
    </div>
  </div>
</template>

<script>
export default {
  props: ['question'],
  data: function () {
    return {
      loading: false,
    }
  },
  computed: {
    questionSnippet: function () {
      return (this.question).question.substring(0, 125) + " ...";
    },
    archived: function () {
      return this.question.deleted_at != null;
    }
  },
  methods: {
    archive() {
      this.loading = true;
      this.$root.$emit('archive', this.question.id);
      // this.$root.$on('archived', () => {
      //     this.question.loading = false;
      //     this.$root.$off('archived');
      // });
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
