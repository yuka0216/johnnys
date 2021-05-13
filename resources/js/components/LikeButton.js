import axios from 'axios';
import React, { useState, useEffect } from 'react';

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

  const onClick = async () => {
    if (like == true) {
      try {
        const del = await axios.delete('/api/favorite/' + (post.id) + '/' + (user.id), {
          post_id: post.id,
          user_id: user.id
        })
        response => {
          console.log(response)
        }
        setLikeCount(likeCount - 1);
        setLike(!like);
      } catch (e) {
        console.log("delError", e);
      }
    }
    if (like == false) {
      try {
        const res = await axios.post('/api/favorite', {
          post_id: post.id,
          user_id: user.id
        })
        response => {
          console.log(response);
        }
      } catch (e) {
        console.log("onClickError", e);
      };

      setLikeCount(likeCount + 1);
      setLike(!like);
    }
  }

  // console.log("like", like);

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