<template>
  <div>
    <div class="row justify-content-center">
      <div class="col-md-6">
        <div class="card mt-2">
          <div class="card-body">
            <!-- {{ this.errorList.title[0] }} -->
            <h5 class="card-title text-center mb-4">Edit Post</h5>
            <span v-if="isLoading">
              <Loading :title="isLoadingText" />
            </span>
            <div v-else>
              <form @submit.prevent="submitForm">
                <div class="mb-3">
                  <label for="name" class="form-label"
                    >Post title <span class="text-danger">*</span></label
                  >
                  <input
                    type="text"
                    class="form-control"
                    v-model="editedTitle"
                    placeholder="Enter post title"
                  />
                  <span class="text-danger" v-if="this.errorList.title">{{
                    this.errorList.title[0]
                  }}</span>
                </div>
                <div class="mb-3">
                  <label for="message" class="form-label"
                    >Description <span class="text-danger">*</span></label
                  >
                  <textarea
                    class="form-control"
                    v-model="editedDescription"
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
      postId: this.$route.params.id,
      editedTitle: "",
      editedDescription: "",

      isLoading: false,
      isLoadingText: "Loading",
      errorList: {},
    };
  },

  async mounted() {
    try {
      const response = await axios.get(
        `http://localhost:8000/api/posts/${this.postId}`
      );
      this.editedTitle = response.data.post.title;
      console.log(response.data.post);
      this.editedDescription = response.data.post.description;
    } catch (error) {
      console.error("Error fetching post:", error);
    }
  },
  methods: {
    async submitForm() {
      try {
        const postData = {
          title: this.editedTitle,
          description: this.editedDescription,
        };

        // Update post data using an API or other data source
        const response = await axios.put(`http://localhost:8000/api/posts/${this.postId}`, postData);
        // Handle successful response (e.g., show success message)
        console.log("Post updated:", response.data);
      } catch (error) {
        console.log("Error updating post:", error);
      }
    },
  },
};
</script>
<style lang="scss" scoped></style>
