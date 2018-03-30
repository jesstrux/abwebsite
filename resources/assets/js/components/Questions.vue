<template lang="html">
  <div class="row">
    <question
     v-for="question in questions"
     :key="question.id"
     :question="question"
     @view-question="onViewQuestion">
    </question>
    <question-modal
      :question="question"
      :display="display"
      @windowClicked="onWindowClicked">
    </question-modal>
  </div>
</template>

<script>
export default {
  props: ['questions'],
  data: function () {
    return {
      question: '',
      display: 'none',
    }
  },
  methods: {
    onViewQuestion: function(question) {
      this.question = question;
      this.display = 'block';
    },
    onWindowClicked: function () {
      this.display = 'none';
    }
  }
}
</script>

<style lang="css">
</style>
