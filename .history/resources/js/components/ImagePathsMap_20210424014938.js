import React from 'react';
import TwitterViewImage from './TwitterViewImage';

const ImagePathsMap = (props) => {
    console.log('propsImagePathsMap', props);
    props.imagePaths.map((imagePath) => {
        return (
            <TwitterViewImage imagePath={imagePath} />
        )
    })
}

export default ImagePathsMap;