import axios from 'axios';

export default {
    create: function (title, content){
      return axios
        .post('vuenotes', {
            title,
            content
        });
    },
    read: function(id){
        return axios.get(`vuenotes/${id}`).then(response => {
            return response.data;
        });
    },
    remove: function(id){
        return axios.delete(`vuenotes/${id}`);
    },
    update: function(id, title, content){
        return axios.put(`vuenotes/${id}`, {
            title,
            content
        });
    }
};