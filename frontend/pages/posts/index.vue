<template>
  <div>
    <div class="row justify-content-center">
      <div class="col-md-10">
        <div class="card">
          <div class="card-body">
            <table class="table table-bordered">
              <thead>
                <tr>
                  <th>#</th>
                  <th>Name</th>
                  <th>Description</th>
                  <th>Action</th>
                </tr>
              </thead>
              <tbody>
                <tr v-for="(post, index) in posts" :key="index">
                  <td>{{ index + 1 }}</td>
                  <td>{{ post.title }}</td>
                  <td>{{ post.description }}</td>
                  <td>
                    <NuxtLink class="btn btn-info btn-sm" :to="`/posts/${post.id}`">Edit</NuxtLink> &nbsp;
                    <NuxtLink class="btn btn-danger btn-sm" @click="deletePost(post.id)">Delete</NuxtLink>
                  </td>
                </tr>
              </tbody>
            </table>
          </div>
        </div>
      </div>
    </div>
  </div>
</template>
<script>
import axios from "axios";
export default {
  data() {
    return {
      postId: this.$route.params.id,
      posts: {},
    };
  },
  async mounted() {
    await this.fetchPostData();
  },

  methods: {
    async fetchPostData() {
      try {
        const response = await axios.get("http://localhost:8000/api/posts");
        this.posts = response.data.posts;
        console.log(response.data.posts);
        // response.data.forEach(function (item, index) {
        // });
      } catch (error) {
        console.error("Error fetching data:", error);
      }
    },

    async deletePost(postId) {
      try {
        console.log(postId);
        const response = await axios.delete(`http://localhost:8000/api/posts/${postId}`);
        console.log('Post deleted:', response.data);
        this.$router.push('/posts'); // Navigate back to posts list
      } catch (error) {
        console.error('Error deleting post:', error);
      }
    }
  }
};
</script>
<style></style>
