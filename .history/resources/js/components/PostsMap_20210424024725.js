import React from 'react';
import ImagePathsMap from './ImagePathsMap';
import TwitterViewImage from './TwitterViewImage';
import LikeButton from './LikeButton';

const PostsMap = (props) => {
    console.log('props', props);
    return (
        props.array.map((eachItem) => {
            return (
                <div className="card">
                    <div className="card-body">
                        <p>{eachItem.comment}</p>
                        <ImagePathsMap array={eachItem} viewImage={TwitterViewImage} />
                        <p>{post.created_at}</p>
                        <LikeButton />
                    </div>
                </div>
            )
        })
    )
}


export default PostsMap;