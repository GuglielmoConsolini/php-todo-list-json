const { createApp } = Vue

createApp({
  data() {
    return {
        todos: []
    }
  },
  methods: {

  },
  mounted() {
    console.log("Recupero i dati dal server");

    axios.get("../server.php").then(results => {
        console.log("Risultati: ", results);
        this.todos = results.data;
    });
  }
}).mount('#app')