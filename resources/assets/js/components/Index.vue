<template>
  <div class="container">
    <router-link class="btn btn-primary" to="/create">新增</router-link>
    <table class="table table-hover">
      <thead>
        <th>標題</th>
        <th>內容</th>
      </thead>
      <tbody>
        <router-link
          tag="tr"
          v-for="post in posts"
          :key="post.id"
          :to="`${post.id}`"
        >
          <td>{{ post.title }}</td>
          <td>{{ post.content }}</td>
        </router-link>
      </tbody>
    </table>
  </div>
</template>

<script>
import axios from 'axios';
export default {
  data: () => {
    return {
      posts: []
    };
  },
  created() {
    axios.get('/note').then(response => {
      this.posts = response.data.data.data;
    });
  }
};
</script>