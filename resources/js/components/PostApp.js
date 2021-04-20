import React, { useState, useEffect } from 'react';
import ReactDOM from 'react-dom';

function PostApp() {
    const [posts, setPosts] = useState([]);

    useEffect(
        () => {
            axios
                .get('/api/getposts')
                .then((res) => {
                    setPosts(res.data.data);
                })
                .catch((e) => {
                    console.log(e);
                })
        },
        []
    );

    return (
        <>
            {
                posts.map((post) => {
                    return (
                        <div key={post.comment}>
                            {post.created_at} {post.image_path} {post.thread_name}
                        </div>
                    );
                })
            }
        </>
    )
}

ReactDOM.render(
    <PostApp />,
    document.getElementById('postApp')
)