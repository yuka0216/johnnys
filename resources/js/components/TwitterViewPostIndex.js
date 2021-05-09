import React from 'react';
import ImagePathsMap from './ImagePathsMap';
import LikeButton from './LikeButton'

const TwitterViewPostIndex = ({ post }) => (
  <div className="card">
    <div className="card-body">
      <p>{post.name}</p>
      <p>{post.comment}</p>
      <ImagePathsMap key={post.id} post={post} viewType="twitter" />
      <p>{post.created_at}</p>
      <LikeButton />
    </div>
  </div>
)

export default TwitterViewPostIndex;