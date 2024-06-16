const { createApp } = Vue

createApp({
  data() {
    return {
        todos: [],
        newTask: "",
        //Dati per le richieste
        apiUrl: "../list.php",
        postRequestConfig: {
          headers: {
            'Content-Type': 'multipart/form-data'
          }
        }
    }
  },
  methods: {
    markAsCompleted(todo) {
      todo.completed = true;
    }
  },
  mounted() {
    console.log("Recupero i dati dal server");

    axios.get(this.apiUrl).then(results => {
        console.log("Risultati: ", results);
        this.todos = results.data;
    });
  }
}).mount('#app')