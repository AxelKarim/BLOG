let isLiked = false;

function toggleLike() {
  const likeButton = document.getElementById('like-button');
  const likeIcon = document.getElementById('like-icon');
  const likeText = document.getElementById('like-text');
  
  if (isLiked) {
    likeIcon.src = 'images-3/like.png';
    isLiked = false;
  } else {
    likeIcon.src = 'images-3/like-blue.png';
    isLiked = true;
  }
}
