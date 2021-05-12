import React from 'react';
import TwitterViewPostIndex from './TwitterViewPostIndex';
import InstaViewPostIndex from './InstaViewPostIndex';

const Posts = ({ posts, viewType, user }) => {
  const postView = (post, viewType) => {
    if (viewType == "twitter") return <TwitterViewPostIndex key={post.id} post={post} user={user} />
    if (viewType == "instagram") return <InstaViewPostIndex key={post.id} post={post} />
  }
  return (
    posts.map((post) => postView(post, viewType, user))
  )
}

export default Posts;