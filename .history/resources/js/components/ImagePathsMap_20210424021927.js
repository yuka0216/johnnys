import React from 'react';
import TwitterViewImage from './TwitterViewImage';
import InstaViewImage from './InstaViewImage';

const ImagePathsMap = (props) => {
    console.log('props', props);
    return (
        props.imagePaths.map((imagePath) => {
            // console.log('propsImagePath', imagePath);
            return (
                <props.viewImage imagePath={imagePath} />
            )
        })
    )
}


export default ImagePathsMap;