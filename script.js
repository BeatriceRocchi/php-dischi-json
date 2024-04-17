const { createApp } = Vue;

createApp({
  data() {
    return {
      apiUrl: "server.php",
      diskList: [],
    };
  },

  methods: {
    getApi() {
      axios.get(this.apiUrl).then((result) => {
        console.log(result.data);
        this.diskList = result.data;
      });
    },
  },
  mounted() {
    this.getApi();
  },
}).mount("#app");
