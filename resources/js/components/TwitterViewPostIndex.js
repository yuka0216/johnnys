import React from 'react';
import ImagePathsMap from './ImagePathsMap';
import TwitterViewImage from './TwitterViewImage';
import LikeButton from './LikeButton'
import PreciousButton from './PreciousButton';

//postを受け取ってImagePathsMapにpostとviewImageを渡す

const TwitterViewPostIndex = (props) => {
  return (
    <div className="card">
      <div className="card-body">
        <p>{props.post.name}</p>
        <p>{props.post.comment}</p>
        <ImagePathsMap post={props.post} viewImage={TwitterViewImage} />
        <p>{props.post.created_at}</p>
        <LikeButton />
      </div>
    </div>
  )
}

export default TwitterViewPostIndex;