import React from 'react';
import TwitterViewImage from './TwitterViewImage';

const ImagePathsMap = (props) => {
    return (
        props.imagePaths.map((imagePath) => {
            // console.log('propsImagePath', imagePath);
            return (
                <TwitterViewImage imagePath={imagePath} />
            )
        })
    )
}

export default ImagePathsMap;