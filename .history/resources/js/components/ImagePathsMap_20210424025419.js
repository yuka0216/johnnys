import React from 'react';

// ImagePathsをmapで繰り返し処理
// returnの値は渡されたviewImage毎に変わる

const ImagePathsMap = (props) => {
    console.log('props', props);
    return (
        props.array.imagePaths.map((eachItem) => {
            return (
                <props.viewImage imagePath={eachItem} />
            )
        })
    )
}


export default ImagePathsMap;