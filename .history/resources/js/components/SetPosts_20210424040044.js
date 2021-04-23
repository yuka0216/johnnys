import React, { useState, useEffect } from 'react';

const [posts, setPosts] = useState([]);

useEffect(
    () => {
        axios
            .get('/api/mypage')
            .then((res) => {
                console.log('res', res)
                setPosts(res.data);
            })
            .catch((e) => {
                console.log("e", e);
            })
    },
    []
);
return posts;

export default posts;