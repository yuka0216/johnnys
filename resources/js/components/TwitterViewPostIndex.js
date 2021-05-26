import React from 'react';
import ImagePathsMap from './ImagePathsMap';
import LikeButton from './LikeButton'

const TwitterViewPostIndex = ({ post, user }) => {
  return (
    <div className="card">
      <div className="card-body">
        <p>{post.name} @ {post.threadName}</p>
        <p>{post.comment}</p>
        <ImagePathsMap key={post.id} post={post} viewType="twitter" />
        <p>{post.created_at}</p>
        <LikeButton post={post} user={user} />
      </div>
    </div>
  )
}

export default TwitterViewPostIndex;