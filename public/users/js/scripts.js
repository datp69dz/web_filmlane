// scripts.js
function getMoviesByCategory(categoryId) {
// Clear the content initially
document.getElementById("demo").innerHTML = "";

function getMoviesByCategory(categoryId) {
    // Fetch the category data from the server
    fetch('/api/category/' + categoryId)
        .then(response => response.json())
        .then(category => {
            // Access the category name and update the element with the id "demo"
            document.getElementById("demo").innerHTML = category.category_name;
        });
    // Rest of your code for fetching and displaying movies
}

  if (categoryId) {
      fetch('/api/movies/category/' + categoryId)
          .then(response => response.json())
          .then(data => {
              var moviesContainer = document.getElementById('moviesContainer2');
              moviesContainer.innerHTML = ''; // Clear the container

              data.forEach(movie => {
                  var movieDiv = document.createElement('div');
                  movieDiv.className = 'col-lg-3 col-md-6 col-sm-6';
                  movieDiv.innerHTML = 
                      '<div class="product__item">' +
                      '<div class="product__item__pic">' +
                      '<img class="set-bg" style="height:100% ; border-radius:10px" src="storage/uploads/movies/' + movie.image_url + '">' +
                      '<div class="ep"> ' + movie.quality + ' </div>' +
                      '<div class="comment"><i class="fa fa-comments"></i> 11</div>' +
                      '<div class="view"><i class="fa fa-eye"></i> ' + movie.view + ' </div>' +
                      '</div>' +
                      '<div class="product__item__text">' +
                      '<ul>' +
                      '<li>Active</li>' +
                      '</ul>' +
                      '<h5><a href="' + getMovieUrl(movie.id) + '">' + movie.title + '</a></h5>' +
                      '</div>' +
                      '</div>';
                  moviesContainer.appendChild(movieDiv);
              });
          });
  }
}

function getMovieUrl(movieId) {
  // Assuming you have a function to generate the movie.show route URL based on the movie ID.
  // Replace 'generateMovieUrl' with the actual function name or implementation.
  return generateMovieUrl(movieId);
}

function generateMovieUrl(movieId) {
  // Implement the logic to generate the movie URL based on the movieId
  // Replace this with the actual implementation
  return '/movies/' + movieId;
}

