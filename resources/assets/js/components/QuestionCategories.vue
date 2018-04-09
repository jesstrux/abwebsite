<template lang="html">
  <div :class="['categories-container', { 'has-error': error }]">
    <div class="question-categories">
        <div class="categories-cluster" v-for="n in numClusters">
          <div class="checkbox" v-for="category in sliceCategories(n)" :key="category.id">
            <label>
              <input type="checkbox" name="question_category_id[]"
                :value="category.id"
                @change="onCheckboxChange(category.id, $event)"
                :checked="selectedCategories.indexOf(category.id) != -1">
              {{ category.name }}
            </label>
         </div>
        </div>
    </div>
    <p class="help-block" v-if="error == false" key="default">

        The Question Categories Addressed

    </p>
    <p class="help-block" v-else-if="error == true" key="error">

        Please select atleast one category

    </p>
  </div>
</template>

<script>
export default {
  props: ['categories', 'selectedCategories', 'error'],
  data: function () {
    return {
      checkboxes: 3, //number of check-boxes per cluster
    }
  },
  computed: {
      numClusters() {
        var mod = this.categories.length % this.checkboxes;
        var clusters = Math.trunc(this.categories.length / this.checkboxes);
        if(mod != 0)
          return clusters + 1;
        return clusters;
      }
  },
  methods: {
    sliceCategories(cluster) {
      var start = (cluster - 1) * this.checkboxes;
      var end = start + this.checkboxes;
      if(end > this.categories.length)
        end = this.categories.length;
      return this.categories.slice(start, end);
    },
    onCheckboxChange(id, event) {
      if(event.target.is(':checked')) {
        this.error = false;
        this.selectedCategories.push(id);
      }
      else {
        this.selectedCategories.splice(this.selectedCategories.indexOf(id), 1);
      }
    }
  }
}
</script>

<style lang="css">
.categories-container {
  display: flex;
  flex-direction: column;
}
.question-categories {
  display: flex;
}
.categories-cluster {
  display: flex;
  flex-direction: column;
  margin-right: auto;
}
.text-danger {
  color: #a94442;
}
</style>
