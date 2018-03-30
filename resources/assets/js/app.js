
/**
 * First we will load all of this project's JavaScript dependencies which
 * includes Vue and other libraries. It is a great starting point when
 * building robust, powerful web applications using Vue and Laravel.
 */

require('./bootstrap');

window.Vue = require('vue');

/**
 * Next, we will create a fresh Vue application instance and attach it to
 * the page. Then, you may begin adding components to this application
 * or customize the JavaScript scaffolding to fit your unique needs.
 */

Vue.component('filters', require('./components/Filters.vue'));
Vue.component('questions', require('./components/Questions.vue'));
Vue.component('question', require('./components/Question.vue'));
Vue.component('question-modal', require('./components/QuestionModal.vue'));

window.app = new Vue({
    el: '#abella-cms',
    data: {
      filter: 0,
      all_questions: []
    },
    computed: {
      questions: function () {

        if(this.filter == 0) {
          return this.all_questions;
        }
        else {
          return this.all_questions.filter(question =>
              question.question_category_id == this.filter);
        }

      }
    },
    methods: {
      setAllQuestions: function(data) {
        this.all_questions = data;
      },
      onFilterClicked: function(filter) {
        this.filter = filter;
      }
    }
});
