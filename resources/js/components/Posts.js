import React from 'react';
import TwitterViewPostIndex from './TwitterViewPostIndex';
import InstaViewPostIndex from './InstaViewPostIndex';

const Posts = ({ posts, viewType, userID }) => {
  const postView = (post, viewType) => {
    if (viewType == "twitter") return <TwitterViewPostIndex key={post.id} post={post} userID={userID} />
    if (viewType == "instagram") return <InstaViewPostIndex key={post.id} post={post} />
  }
  return (
    posts.map((post) => postView(post, viewType, userID))
  )
}

export default Posts;