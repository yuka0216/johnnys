import React from 'react';


const PostsMap = (props) => {
    return (
        props.posts.map((post) => {
            return (
                <props.view post={post} />
            )
        })
    )
}

export default PostsMap;