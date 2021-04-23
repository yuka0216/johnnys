import React from 'react';


const PostsMap = (props) => {
    console.log('posts', props);
    return (
        props.array.map((eachItem) => {
            return (
                <props.view eachItem={eachItem} />
            )
        })
    )
}

export default PostsMap;