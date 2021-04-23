import React from 'react';

const ImagePathsMap = (props) => {
    console.log('props', props);
    return (
        props.array.map((eachItem) => {
            return (
                <div className="card">
                    <div className="card-body">
                        <p>{post.comment}</p>
                        <ImagePathsMap array={post.imagePaths} viewImage={TwitterViewImage} />
                        <p>{post.created_at}</p>
                        <LikeButton />
                    </div>
                </div>
            )
        })
    )
}


export default ImagePathsMap;