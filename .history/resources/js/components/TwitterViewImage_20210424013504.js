import React from 'react';

const TwitterViewImage = (props) => {
    console.log('props', props.imagePath);
    return (
        <img src={'/images/' + props.imagePath} width="100px" />
    )
}
export default TwitterViewImage;