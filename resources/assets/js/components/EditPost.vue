<template>
    <div class="edit">
      <button class="labot" v-on:click="isShow = !isShow">Labot šo ierakstu</button>
      <div class="modal" v-show="isShow">
        <div class="form-container">
          <h1>Ieraksta labošana</h1>
          <button v-on:click="isShow = !isShow" class="close">
            <i class="fa fa-times" aria-hidden="true"></i>
          </button>
          <form @submit.prevent="submitForm">
            <p>
              <label>Ieraksta virsraksts:
                <input type="text" v-model="oldData.title" name="title">
              </label>
            </p>
            <p>
              <label>Ieraksta teksts:
                <textarea v-model="oldData.text" name="text"></textarea>
              </label>
            </p>
            <button type="submit">Labot</button>
            <p class="response">{{ responseMessage }}</p>
            <div class="errors" v-if="errors">
                <p class="error" v-for="(error, field) in errors"> {{ error.join(', ') }}</p>
            </div>
          </form>
        </div>
      </div>
    </div>
  </template>
  
  <script>
  export default {
    data() {
      return {
        isShow: false,
        oldData: {},
        responseMessage: "",
        errors: [],
      };
    },
    props: ["oldData"],
    methods: {
        submitForm() {
  const data = {
    title: this.oldData.title,
    text: this.oldData.text
  };
  this.responseMessage = '';
  fetch('/api/post/' + this.oldData.id, {
    method: 'POST',
    headers: {
      'Content-Type': 'application/json'
    },
    body: JSON.stringify(data)
  })
    .then(response => {
      if (!response.ok) {
        throw response;
      }
      return response.json();
    })
    .then(data => {
      this.responseMessage = data.message;
      this.errors = [];
      setTimeout(() => {
        window.location.reload(1);
      }, 800);
    })
    .catch(error => {
      error.json().then(errorData => {
        this.errors = errorData.errors;
      });
    });
},
    },
  };
  </script>
  