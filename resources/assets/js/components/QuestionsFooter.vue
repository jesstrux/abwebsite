<template lang="html">

  <div class="row footer">
    <button :disabled="curPage == 1"
      :class="{ active: curPage != 1 }"
      @click="changePage(1)">
      <i class="fa fa-angle-double-left"></i>
    </button>
    <button :disabled="curPage == 1"
      :class="{ active: curPage != 1 }"
      @click="changePage(curPage - 1)">
      <i class="fa fa-angle-left"></i>
    </button>
    <div v-if="paginationBuffer < curPage">
      <button :class="{ active: curPage == 1 }"
        @click="changePage(1)">
        1
      </button>
      <span v-if="(curPage - 2) >= paginationBuffer">...</span>
    </div>
    <div id="pageButtons">
      <button v-for="page in pages"
        :class="{ active: page == curPage }"
        @click="changePage(page)">
        {{page}}
      </button>
    </div>
    <div v-if="(curPage + 2) < lastPage">
      <span v-if="curPage < (lastPage - paginationBuffer)">...</span>
      <button :class="{ active: lastPage == curPage }"
        @click="changePage(lastPage)">
        {{lastPage}}
      </button>
    </div>
    <button :disabled="curPage == lastPage"
      :class="{ active: curPage != lastPage }"
      @click="changePage(curPage + 1)">
      <i class="fa fa-angle-right"></i>
    </button>
    <button :disabled="curPage == lastPage"
      :class="{ active: curPage != lastPage }"
      @click="changePage(lastPage)">
      <i class="fa fa-angle-double-right"></i>
    </button>
  </div>

</template>

<script>
export default {
  props: ['numPages', 'curPage'],
  data: function () {
    return {
      paginationBuffer: 3
    }
  },
  computed: {
    lastPage: function () {
      return this.numPages;
    },
    pages: function () {
      var start = this.curPage - 2;
      var end = this.curPage + 2;
      if(start < 1)
        start = 1;
      if(end > this.lastPage)
        end = this.lastPage;
      var pages = [];
      for(var i = start; i <= end; i++)
        pages.push(i);
      return pages;
    }
  },
  methods: {
    changePage(page) {
      this.$root.$emit('changePage', page);
    }
  }
}
</script>

<style lang="css" scoped>
.footer {
  display: flex;
  justify-content: flex-end;
  border-top: 2px solid #777;
  border-bottom: 2px solid #777;
}

button {
  padding: 0.2em 0.5em;
  margin: 0 0.1em;
  background-color: transparent;
  outline: none;
  border: none;
  font-size: 1.1em;
  cursor: pointer;
}

button, button.disabled, span {
  opacity: 0.4;
}

button.disabled, #pageButtons > button.active {
  pointer-events: none;
}

#pageButtons > button.disabled {
  cursor: pointer;
}

button.active {
  opacity: 1;
  font-family:Bold, sans-serif;
  font-weight: bold;
}
</style>
