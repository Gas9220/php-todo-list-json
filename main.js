const { createApp } = Vue

createApp({
    data() {
        return {
            todos: [],
            newTodo: ""
        }
    },
    methods: {
        addTodo() {
            const data = {
                newTodo: this.newTodo
            };

            axios.post('server.php', data, {
                headers: { 'Content-Type': 'multipart/form-data' }
            })
                .then((response) => {
                    this.newTodo = ""
                    this.todos = response.data;
                    console.log(this.todos)
                })
        },
        toggleTodo(index) {
            const data = {
                done: index
            };

            axios.post('server.php', data, {
                headers: { 'Content-Type': 'multipart/form-data' }
            })
                .then((response) => {
                    this.todos = response.data;
                })
        },
        todoStatus(todo) {
            return todo.done ? "Completed" : "To complete"
        },
        fetchTodos() {
            axios.get('server.php')
            .then((response) => {
                this.todos = response.data;
                console.log(response)
            })
        }
    },
    created() {
        this.fetchTodos()
    }
}).mount('#app')