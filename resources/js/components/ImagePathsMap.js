import React from 'react';
import TwitterViewImage from './TwitterViewImage';
import InstaViewImage from './InstaViewImage';

const ImagePathsMap = ({ post, viewType }) => {
  const postView = (viewType, imagePath) => {
    if (viewType == "twitter") return <TwitterViewImage key={imagePath} imagePath={imagePath} />
    if (viewType == "instagram") return <InstaViewImage key={imagePath} imagePath={imagePath} />
  }
  return (
    post.imagePaths.map((imagePath) => postView(viewType, imagePath))
  )
}

export default ImagePathsMap;