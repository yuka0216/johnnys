import React from 'react';
import ImagePathsMap from './ImagePathsMap';
import LikeButton from './LikeButton'

const TwitterViewPostIndex = ({ post, userID }) => {
  return (
    <div className="card">
      <div className="card-body">
        <p>{post.name}</p>
        <p>{post.comment}</p>
        <ImagePathsMap key={post.id} post={post} viewType="twitter" />
        <p>{post.created_at}</p>
        <LikeButton postID={post.id} postFavorite={post.favorite} userID={userID} />
      </div>
    </div>
  )
}

export default TwitterViewPostIndex;