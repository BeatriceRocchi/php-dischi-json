const { createApp } = Vue;

createApp({
  data() {
    return {
      apiUrl: "server.php",
      albumList: [],
      newAlbum: {
        title: "",
        author: "",
        year: "",
        cover: "",
        genre: "",
        tracks: "",
        tracksList: [],
        duration: "",
        like: false,
      },
    };
  },

  methods: {
    getApi() {
      axios.get(this.apiUrl).then((result) => {
        this.albumList = result.data;
      });
    },

    addNewAlbum() {
      const data = new FormData();
      data.append("newAlbumTitle", this.newAlbum.title);
      data.append("newAlbumAuthor", this.newAlbum.author);
      data.append("newAlbumYear", this.newAlbum.year);
      data.append("newAlbumCover", this.newAlbum.cover);
      data.append("newAlbumGenre", this.newAlbum.genre);
      data.append("newAlbumTracks", this.newAlbum.tracks);
      data.append("newAlbumTracksList", this.newAlbum.tracksList);
      data.append("newAlbumDuration", this.newAlbum.duration);

      axios.post(this.apiUrl, data).then((result) => {
        this.albumList = result.data;
      });

      this.newAlbum = {
        title: "",
        author: "",
        year: "",
        cover: "",
        genre: "",
        tracks: "",
        tracksList: [],
        duration: "",
        like: false,
      };
    },

    deleteAlbum(id) {
      const data = new FormData();
      data.append("idAlbumToDelete", id);

      axios.post(this.apiUrl, data).then((result) => {
        this.albumList = result.data;
      });
    },

    toggleLike(id) {
      const data = new FormData();
      data.append("idAlbumToToggle", id);

      axios.post(this.apiUrl, data).then((result) => {
        this.albumList = result.data;
      });
    },
  },
  mounted() {
    this.getApi();
  },
}).mount("#app");
