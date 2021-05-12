import React from 'react';

const InstaViewImage = ({ imagePath }) => (
  <div className="col-md-3">
    <a href={'/images/' + imagePath} data-lightbox="group"><img src={'/images/' + imagePath} /></a>
  </div>
)

export default InstaViewImage;