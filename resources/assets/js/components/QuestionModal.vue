<template lang="html">
  <div id="myModal" class="modal" role="dialog" :style="{display : display}"
    @click.self="$emit('windowClicked')">
    <div class="modal-dialog">

      <!-- Modal content-->
      <div class="modal-content">
        <div class="modal-header">
          <span class="close" @click="$emit('windowClicked')">&times;</span>
          <h4>{{ question.title }}</h4>
        </div>
        <p>{{ question.question }}</p>
      </div>

    </div>
  </div>
</template>

<script>
export default {
  props: ['question', 'display'],
  computed: {
    questionContent: function () {
      return this.question;
    }
  }
}
</script>

<style lang="css">
/* The Modal (background) */
.modal {
    position: fixed; /* Stay in place */
    z-index: 1; /* Sit on top */
    padding-top: 100px; /* Location of the box */
    left: 0;
    top: 0;
    width: 100%; /* Full width */
    height: 100%; /* Full height */
    overflow: auto; /* Enable scroll if needed */
    background-color: rgb(0,0,0); /* Fallback color */
    background-color: rgba(0,0,0,0.4); /* Black w/ opacity */
}

/* Modal Content/Box */
.modal-content {
    background-color: #fefefe;
    margin: 15% auto; /* 15% from the top and centered */
    padding: 20px;
    border: 1px solid #888;
    width: 80%; /* Could be more or less, depending on screen size */
}

.modal-header {
    padding: 2px;
    border: none;
}

.modal-content > p {
  font-weight: 400;
  font-size: 1.2em;
  text-align: justify;
}

/* The Close Button */
.close {
    color: #aaaaaa;
    float: right;
    font-size: 28px;
    font-weight: bold;
}

.close:hover,
.close:focus {
    color: #000;
    text-decoration: none;
    cursor: pointer;
}
</style>
