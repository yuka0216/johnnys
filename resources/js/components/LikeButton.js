import axios from 'axios';
import React, { useState, useEffect } from 'react';
import Liked from './Liked';
import NotLiked from './NotLiked';

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

  const onClick = () => {
    if (like) {
      <Liked post={post} user={user} />
      setLikeCount(likeCount - 1);
      setLike(!like);
    } else {
      <NotLiked post={post} user={user} />
      setLikeCount(likeCount + 1);
      setLike(!like);
    }
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