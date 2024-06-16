const { createApp } = Vue

createApp({
  data() {
    return {
        todos: [],
        newTaskName: "",
        //Dati per le richieste
        apiUrl: "../create.php",
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
    },

    addTask() {
      console.log("aggiungi task", this.newTask);

      const newTask = {
        task: this.newTaskName,
        completed: false
      };

      axios.post(this.apiUrl, newTask, this.postRequestConfig).then(results => {
        console.log("Risultati: ", results.data);
        this.todos = results.data;
      });
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