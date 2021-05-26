import React from 'react';

const InstaViewImage = ({ imagePath }) => (
  <div className="image w-25">
    <a href={'/images/' + imagePath} data-lightbox="group"><img src={'/images/' + imagePath} /></a>
  </div>
)

export default InstaViewImage;