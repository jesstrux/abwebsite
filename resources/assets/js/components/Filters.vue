<template lang="html">
  <div class="row">
    <button
      :class="['filter', { active: filter == 0 }]"
      @click="$emit('filter-clicked', 0)">
      All
    </button>
    <button
      v-for="category in categories"
      :class="['filter', { active: filter == category.id }]"
      @click="$emit('filter-clicked', category.id)">
      {{ category.name }}
    </button>
  </div>
</template>

<script>
export default {
  props: ['categories', 'filter']
}
</script>

<style lang="css">
/* Style the buttons */
.filter {
  border: none;
  border-radius: 4px;
  outline: none;
  padding: 3px 16px;
  margin: 0 15px 15px;
  background-color: #1ab394;
  cursor: pointer;
  color: white;
  text-transform: capitalize;
}

/* Add a grey background color on mouse-over */
.filter:hover {
  background-color: #bbb;
  color: white;
}

/* Add a dark background color to the active button */
.filter.active {
 background-color: #f8ac59;
 color: white;
}
</style>
