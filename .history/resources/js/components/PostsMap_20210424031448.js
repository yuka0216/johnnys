import React from 'react';
import TwitterViewPostIndex from './TwitterViewPostIndex';

const PostsMap = (props) => {
    console.log('posts', props);
    return (
        props.array.map((eachItem) => {
            return (
                <TwitterViewPostIndex eachItem={eachItem} />
            )
        })
    )
}

export default PostsMap;