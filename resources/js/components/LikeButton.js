import axios from 'axios';
import React, { useState, useEffect } from 'react';

const LikeButton = ({ postID, postFavorite, userID }) => {
  // const [userID, setUserID] = useState([]);
  console.log("userID", userID);

  const [favorite, setFavorite] = useState([]);

  useEffect(() => {
    // initUser()
    initFavorite()
  }, []);

  // const initUser = async () => {
  //   try {
  //     const res = await axios.get('/api/user')
  //     setUserID(res.data.id);
  //     // initFavorite(userID);
  //   } catch (e) {
  //     console.log("initUserError", e);
  //   }
  // }

  const initFavorite = async () => {
    try {
      const res = await axios.get('/api/check/favorite/' + postID + '/' + userID[1])
      // console.log("res", res.data);
      setFavorite(res.data);
    } catch (e) {
      console.log("initFavoriteError", e);
    }
  }

  const [like, setLike] = useState(favorite);
  const [likeCount, setLikeCount] = useState(postFavorite);


  // console.log("postID", postID);
  console.log("favorite", favorite);
  console.log("like", like);

  const onClick = async () => {
    if (like == true) {
      try {
        const del = await axios.delete('/api/favorite/' + (postID) + '/' + (userID), {
          post_id: postID,
          user_id: userID
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
          post_id: postID,
          user_id: userID
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
        <img src={like ? '/image/like.png' : '/image/ハート.jpg'} width="30px" />
      </button>
      {likeCount}
    </>
  );
}

export default LikeButton;