import React from 'react';

// imagePathを受け取って表示

const TwitterViewImage = (props) => {
    return (
        <img src={'/images/' + props.imagePath} width="100px" />
    )
}
export default TwitterViewImage;