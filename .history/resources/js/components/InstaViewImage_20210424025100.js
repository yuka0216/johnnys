import React from 'react';

const InstaViewImage = (props) => {
    return (
        <a href={'/images/' + props.imagePath} data-lightbox="group"><img src={'/images/' + props.imagePath} /></a>
    )
}
export default InstaViewImage;