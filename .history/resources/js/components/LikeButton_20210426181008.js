import React, { useState, useEffect } from 'react';

const LikeButton = () => {
    const [like, setLike] = useState({ count: 0, liked: false });

    const onClick = () => {
        setLike({
            count: like.count + (like.liked ? -1 : 1),
            liked: !like.liked
        });
    }

    return (
        <>
            <button onClick={onClick}>
                {like.liked ? '✔' : ''} <img src={'/image/ハート.jpg'} width="10px" />
            </button>
            {like.count}
        </>
    );
}
export default LikeButton;