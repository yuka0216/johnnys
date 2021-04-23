import React from 'react';
import TwitterViewImage from './TwitterViewImage';
import InstaViewImage from './InstaViewImage';

const ImagePathsMap = (props, viewImage) => {
    console.log('props', props);
    return (
        props.imagePaths.map((imagePath) => {
            // console.log('propsImagePath', imagePath);
            return (
                <viewImage imagePath={imagePath} />
            )
        })
    )
}


export default ImagePathsMap;