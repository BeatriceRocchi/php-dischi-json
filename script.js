const { createApp } = Vue;

createApp({
  data() {
    return {
      apiUrl: "server.php",
      diskList: [],
      activeDisk: "",
      newDisk: {
        title: "",
        author: "",
        year: 0,
        cover: "",
        genre: "",
        tracks: 0,
        tracksList: [],
        duration: "",
      },
    };
  },

  methods: {
    getApi() {
      console.log(this.newDisk);
      axios.get(this.apiUrl).then((result) => {
        this.diskList = result.data;
      });
    },

    addNewDisk() {
      console.log(this.newDisk);
    },
  },
  mounted() {
    this.getApi();
  },
}).mount("#app");
