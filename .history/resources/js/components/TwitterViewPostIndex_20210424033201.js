import React from 'react';
import ImagePathsMap from './ImagePathsMap';
import TwitterViewImage from './TwitterViewImage';
import LikeButton from './LikeButton'

const TwitterViewPostIndex = (props) => {
    return (
        <div className="card">
            <div className="card-body">
                <p>{props.post.comment}</p>
                <ImagePathsMap array={props.post} viewImage={TwitterViewImage} />
                <p>{props.post.created_at}</p>
                <LikeButton />
            </div>
        </div>
    )
}

export default TwitterViewPostIndex;