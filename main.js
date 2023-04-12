const { createApp } = Vue

createApp({
    data() {
      return {
        todos: []
      }
    },
    created() {
        axios.get('server.php')
            .then((response) => {
                this.todos = response.data;
                console.log("esguito")
                console.log(response)
            })
    }
  }).mount('#app')