import axios from 'axios';
import React, { useState, useEffect } from 'react';
import unlikePost from './unlikePost';
import likePost from './likePost';

const LikeButton = ({ post, user }) => {

  // useEffect(() => {
  //   initFavorite()
  // }, []);

  // const initFavorite = async () => {
  //   try {
  //     const res = await axios.get('/api/check/favorite/' + post.id + '/' + user.id)
  //     console.log("res", res);
  //     setLike(res.data.isFavorite);
  //     setLikeCount(res.data.count);
  //   } catch (e) {
  //     console.log("initFavoriteError", e);
  //   }
  // }

  const [like, setLike] = useState(post.isLiked);
  const [likeCount, setLikeCount] = useState(post.likeCount);

  console.log("like", like);
  console.log("likeCount", likeCount);

  const onClick = () => {
    if (like) {
      unlikePost(post, user)
      setLikeCount(likeCount - 1);
    } else {
      likePost(post, user)
      setLikeCount(likeCount + 1);
    }
    setLike(!like);
  }

  return (
    <>
      <button onClick={onClick}>
        <img src={like ? '/image/ハート.jpg' : '/image/like.png'} width="30px" />
      </button>
      {likeCount}
    </>
  );
}

export default LikeButton;