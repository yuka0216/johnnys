import React from 'react';
import ImagePathsMap from './ImagePathsMap';
import TwitterViewImage from './TwitterViewImage';
import LikeButton from './LikeButton'
import { isConstructorDeclaration } from 'typescript';

const TwitterViewPostIndex = (props) => {
    console.log('eachItem', props.eachItem);
    return (
        <div className="card">
            <div className="card-body">
                <p>{eachItem.comment}</p>
                <ImagePathsMap array={eachItem} viewImage={TwitterViewImage} />
                <p>{eachItem.created_at}</p>
                <LikeButton />
            </div>
        </div>
    )
}

export default TwitterViewPostIndex;