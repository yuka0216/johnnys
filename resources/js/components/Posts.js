import React from 'react';

//postsとviewを受け取ってpostsをmapで繰り返し処理,
// return:受け取ったviewコンポーネントにpostを渡す

const Posts = ({ posts, view }) => (
    posts.map((post) => <view post={post} />)
)


export default Posts;