import React from 'react';

const ImagePathsMap = (props) => {
    console.log('props', props);
    return (
        props.imagePaths.map((imagePath) => {
            return (
                <props.viewImage imagePath={imagePath} />
            )
        })
    )
}


export default ImagePathsMap;