import React from 'react';
import ImagePathsMap from './ImagePathsMap';
import 'bootstrap/dist/css/bootstrap.min.css';

const InstaViewPostIndex = ({ post }) => (
  <ImagePathsMap key={post.id} post={post} viewType="instagram" />
)

export default InstaViewPostIndex;