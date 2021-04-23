import React from 'react';
import TwitterViewPostIndex from './TwitterViewPostIndex';

const PostsMap = (props) => {
    return (
        props.array.map((eachItem) => {
            return (
                <TwitterViewPostIndex eachItem={eachItem} />
            )
        })
    )
}

export default TwitterViewPostIndex;