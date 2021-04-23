import React from 'react';


const PostsMap = (props) => {
    console.log('posts', props);
    return (
        props.array.map((post) => {
            return (
                <props.view eachItem={post} />
            )
        })
    )
}

export default PostsMap;