import React from 'react';

//postsとviewを受け取ってpostsをmapで繰り返し処理,
// return:受け取ったviewコンポーネントにpostを渡す

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