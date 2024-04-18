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
    },
  },
  mounted() {
    this.getApi();
  },
}).mount("#app");
