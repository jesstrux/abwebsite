<template lang="html">
  <div id="myModal" class="modal" role="dialog" :style="{display : display}">
    <div class="modal-dialog">

      <!-- Modal content-->
      <div class="modal-content">
        <div class="modal-header">
          <span class="close" @click="$emit('closeModal')">&times;</span>
          <h4>{{ question.title }}</h4>
        </div>
        <div class="modal-body">
          <p>{{ question.question }}</p>
        </div>
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
    padding-top: 0px; /* Location of the box */
    left: 0;
    top: 0;
    width: 100%; /* Full width */
    height: 100%; /* Full height */
    overflow: auto; /* Enable scroll if needed */
    background-color: rgb(0,0,0); /* Fallback color */
    background-color: rgba(0,0,0,0.4); /* Black w/ opacity */
}

.modal-dialog {
  position: fixed;
  left: 0;
  right: 0;
}

/* Modal Content/Box */
.modal-content {
    background-color: #fefefe;
    margin: 15% auto; /* 15% from the top and centered */
    padding: 20px;
    border: 1px solid #888;
    width: 80%; /* Could be more or less, depending on screen size */
}

.modal-body {
  max-height: 500px;
  overflow: auto;
}

.modal-header {
    padding: 2px;
    border: none;
}

.modal-body > p {
  font-weight: 400;
  font-size: 1.2em;
  text-align: justify;
}

/* The Close Button */
.close {
    color: #aaa;
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
