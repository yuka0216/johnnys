import React from 'react';

const TwitterViewImage = (props) => {
    console.log('props', props.imagePath);
    return (
        <div>
            <img src={'/images/' + props.imagePath} width="100px" />
        </div>
    )
}
export default TwitterViewImage;