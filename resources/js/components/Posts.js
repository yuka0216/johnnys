import React from 'react';
import TwitterViewPostIndex from './TwitterViewPostIndex';
import InstaViewPostIndex from './InstaViewPostIndex';

//postsとviewを受け取ってpostsをmapで繰り返し処理,
// return:受け取ったviewコンポーネントにpostを渡す

const Posts = ({ posts, viewType }) => {
    const postView = (post, viewType) => {
        if (viewType == "twitter") return <TwitterViewPostIndex key={post.id} post={post} />
        if (viewType == "instagram") return <InstaViewPostIndex key={post.id} post={post} />
    }
    return (
        posts.map((post) => postView(post, viewType))
    )
}

export default Posts;