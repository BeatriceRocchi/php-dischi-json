<!DOCTYPE html>
<html lang="en">

<head>

  <?php
  require_once __DIR__ . '/partials/head.php'
  ?>

</head>

<body>
  <div id="app">
    <header>
      <div class="d-flex justify-content-center align-items-center">
        <img src="./img/logo.png" alt="Logo Spotify" />
        <h2 class="ms-3 text-white">My playlist</h2>
      </div>
    </header>

    <main class="text-center">
      <!-- Offcanvas to add a new album -->
      <button class="btn btn_custom mt-3" type="button" data-bs-toggle="offcanvas" data-bs-target="#staticBackdrop" aria-controls="staticBackdrop">
        Add a new album
      </button>

      <div class="offcanvas offcanvas_custom offcanvas-start" data-bs-backdrop="static" tabindex="-1" id="staticBackdrop" aria-labelledby="staticBackdropLabel">
        <div class="offcanvas-header">
          <h5 class="offcanvas-title" id="staticBackdropLabel">
            New album information:
          </h5>
          <button type="button" class="btn-close bg-white" data-bs-dismiss="offcanvas" aria-label="Close"></button>
        </div>
        <div class="offcanvas-body">
          <div class="row row-cols-2 g-2">
            <div class="col">
              <input v-model="newAlbum.title" type="text" class="form-control" placeholder="Title" aria-label="Title" />
            </div>
            <div class="col">
              <input v-model="newAlbum.author" type="text" class="form-control" placeholder="Author" aria-label="Author" />
            </div>
            <div class="col">
              <input v-model="newAlbum.year" type="text" class="form-control" placeholder="Year" aria-label="Year" />
            </div>
            <div class="col">
              <input v-model="newAlbum.genre" type="text" class="form-control" placeholder="Musical Genre" aria-label="Musical Genre" />
            </div>
            <div class="col">
              <input v-model="newAlbum.tracks" type="text" class="form-control" placeholder="Number of tracks" aria-label="Number of tracks" />
            </div>
            <div class="col">
              <input v-model="newAlbum.duration" type="text" class="form-control" placeholder="Album duration" aria-label="Album duration" />
            </div>
            <div class="col">
              <input v-model="newAlbum.cover" type="text" class="form-control" placeholder="Cover path" aria-label="Cover path" />
            </div>
            <div class="col">
              <textarea v-model="newAlbum.tracksList" class="form-control" placeholder="Tracks list" rows="8" id="tracksList"></textarea>
            </div>
          </div>
          <button @click="addNewAlbum()" class="btn btn_custom mt-3">
            Add album
          </button>
        </div>
      </div>
      <!-- /Offcanvas -->

      <div class="container w-75">
        <div class="row row-cols-3">
          <!-- Card -->
          <div v-for="(album, id) in albumList" :key="id" class="col my-3 text-center">
            <div class="card album_card">
              <img :src="album.cover" class="card-img-top" alt="Immagine disco" />
              <div class="card-body">
                <h5 class="card-title text-capitalize">{{ album.title }}</h5>
                <h6 class="card-text fst-italic fw-normal text-capitalize">
                  {{ album.author }}
                </h6>
                <h6 class="card-title fw-normal">{{ album.year }}</h6>
                <div class="btn_custom my-4"><a :href="`details.php?id=${id}`">More info</a>
                </div>

                <!-- Call to action box: like/dislike and delete -->
                <div class="cta_box d-flex justify-content-end align-items-center">
                  <!-- Like icon -->
                  <i @click="toggleLike(id)" v-if="album.like" class="fa-solid fa-heart"></i>
                  <i @click="toggleLike(id)" v-else class="fa-regular fa-heart"></i>
                  <!-- /Like icon -->

                  <!-- Delete icon to remove the album from the playlist -->
                  <i @click="deleteAlbum(id)" class="fa-regular fa-trash-can"></i>
                  <!-- /Delete icon -->
                </div>
                <!-- /Call to action box -->
              </div>
            </div>
          </div>
          <!-- /Card -->
        </div>
      </div>
    </main>
  </div>

  <!-- JS -->
  <script src="./script.js"></script>
</body>

</html>