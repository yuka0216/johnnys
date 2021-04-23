import React from 'react';
import ImagePathsMap from './ImagePathsMap';
import TwitterViewImage from './TwitterViewImage';
import LikeButton from './LikeButton'
import { isConstructorDeclaration } from 'typescript';

const TwitterViewPostIndex = (props) => {
    return (
        <div className="card">
            <div className="card-body">
                <p>{props.eachItem.comment}</p>
                <ImagePathsMap array={props.eachItem} viewImage={TwitterViewImage} />
                <p>{props.eachItem.created_at}</p>
                <LikeButton />
            </div>
        </div>
    )
}

export default TwitterViewPostIndex;