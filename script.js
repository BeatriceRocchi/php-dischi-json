const { createApp } = Vue;

createApp({
  data() {
    return {
      apiUrl: "server.php",
      albumList: [],
      activeAlbum: "",
      newAlbum: {
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
      console.log(this.newAlbum);
      axios.get(this.apiUrl).then((result) => {
        this.albumList = result.data;
      });
    },

    addNewAlbum() {
      console.log(this.newAlbum);
    },
  },
  mounted() {
    this.getApi();
  },
}).mount("#app");
