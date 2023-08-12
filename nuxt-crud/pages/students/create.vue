<template>
  <div>
    <div class="row justify-content-center">
      <div class="col-md-6">
        <div class="card mt-2">
          <div class="card-body">
            <!-- {{ this.errorList.title[0] }} -->
            <h5 class="card-title text-center mb-4">Create Post</h5>
            <span v-if="isLoading">
              <Loading :title="isLoadingText" />
            </span>
            <div v-else>
              <form @submit.prevent="submitForm">
                <div class="mb-3">
                  <label for="name" class="form-label">Post title <span class="text-danger">*</span></label>
                  <input
                    type="text"
                    class="form-control"
                    v-model="postData.title"
                    placeholder="Enter post title"
                  />
                  <span class="text-danger" v-if="this.errorList.title">{{
                    this.errorList.title[0]
                  }}</span>
                </div>
                <div class="mb-3">
                  <label for="message" class="form-label">Description <span class="text-danger">*</span></label>
                  <textarea
                    class="form-control"
                    v-model="postData.description"
                    rows="4"
                    placeholder="Enter your description"
                  ></textarea>
                  <span class="text-danger" v-if="this.errorList.description">{{
                    this.errorList.description[0]
                  }}</span>
                </div>
                <button type="submit" class="btn btn-primary">Submit</button>
              </form>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
</template>

<script>
import axios from "axios";

export default {
  name: "Post create",
  data() {
    return {
      postData: {
        title: "",
        description: "",
      },
      isLoading: false,
      isLoadingText: "Loading",
      errorList: {},
    };
  },

  methods: {
    submitForm() {
      this.isLoading = true;
      this.isLoadingText = " Saving";
      var formError = this;
      axios
        .post("http://localhost:8000/api/posts", this.postData)
        .then((response) => {
          this.postData.title = "";
          this.postData.description = "";

          this.isLoading = false;
          this.isLoadingText = "Loading";
        })
        .catch((error) => {
          if (error.response) {
            // console.log(error.response.data.errors.description[0]);
            if (error.response.status == 422) {
              formError.errorList = error.response.data.errors;
            }
          }
          formError.isLoading = false;
        });
    },
  },
};
</script>
<style lang="scss" scoped></style>
