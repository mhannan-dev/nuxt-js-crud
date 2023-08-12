<template>
  <div>
    <div class="row justify-content-center">
      <div class="col-md-6">
        <div class="card">
          <div class="card-body">
            <h5 class="card-title text-center mb-4">Create Student</h5>
            <span v-if="isLoading">
              <Loading :title="isLoadingText" />
            </span>

            <div v-else>
              <form @submit.prevent="submitForm">
                <div class="mb-3">
                  <label for="name" class="form-label">Name</label>
                  <input
                    type="text"
                    class="form-control"
                    id="name"
                    placeholder="Enter your name"
                  />
                </div>
                <div class="mb-3">
                  <label for="email" class="form-label">Email</label>
                  <input
                    type="email"
                    class="form-control"
                    id="email"
                    placeholder="Enter your email"
                  />
                </div>
                <div class="mb-3">
                  <label for="message" class="form-label">Message</label>
                  <textarea
                    class="form-control"
                    id="message"
                    rows="4"
                    placeholder="Enter your message"
                  ></textarea>
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
export default {
  name: "Student create",
  data() {
    return {
      student: {
        name: "",
        roll: "",
        mobile: "",
        address: "",
      },
      isLoading: false,
      isLoadingText: "Loading",
    };
  },

  methods: {
    submitForm() {
      // alert('clicked');
      this.isLoading = true;
      this.isLoadingText = " Saving";
    },
  },
};
</script>
<style lang="scss" scoped></style>
