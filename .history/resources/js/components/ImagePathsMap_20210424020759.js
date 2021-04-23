import React from 'react';
import TwitterViewImage from './TwitterViewImage';
import InstaViewImage from './InstaViewImage';

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

const ImagePathsMap = (props) => {
    return (
        props.imagePaths.map((imagePath) => {
            // console.log('propsImagePath', imagePath);
            return (
                <InstaViewImage imagePath={imagePath} />
            )
        })
    )
}


export default ImagePathsMap;