import React from 'react';

const TwitterViewImage = (props) => {
    console.log('props', props.imagePath);
    return (
        <a href={'/images/' + imagePath} data-lightbox="group"><img src={'/images/' + imagePath} /></a>
    )
}
export default TwitterViewImage;