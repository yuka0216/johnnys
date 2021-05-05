import React from 'react';

// postとviewImageを受け取ってpostの中のImagePathsをmapで繰り返し処理
// 受け取ったviewImageコンポーネントにimagePathを渡す

const ImagePathsMap = (props) => {
    // console.log('props', props);
    return (
        props.post.imagePaths.map((imagePath) => {
            return (
                <props.viewImage key={imagePath} imagePath={imagePath} />
            )
        })
    )
}


export default ImagePathsMap;