<template>
  <div class="container">
    <div class="form-group">
      <label for="title">標題</label>
      <input type="text" class="form-control" v-model="title">
    </div>
    <div class="form-group">
      <label for="content">內容</label>
      <textarea class="form-control" cols="30" rows="10" v-model="content"></textarea>
    </div>
    <router-link class="btn btn-default" to="/">返回</router-link>
    <button class="btn btn-primary" @click="send">送出</button>
  </div>
</template>
<script>
import api from '../note_api';
export default {
  data: () => {
    return {
      title: '',
      content: ''
    };
  },
  created() {
    const id = this.$route.params.id;
    api.read(id).then( post => {
        this.title = post.title;
        this.content = post.content;
    });
  },
  methods: {
    send() {
      const title = this.title.trim();
      const content = this.content.trim();
      const id = this.$route.params.id;
      api.update(id, title, content)
        .then(response => {
          this.$router.push(`/${id}`);
        });
    }
  }
};
</script>