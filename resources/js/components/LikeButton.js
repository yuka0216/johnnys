import React, { useState, useEffect } from 'react';

const LikeButton = () => {
    const [like, setLike] = useState(false);
    const [likeCount, setLikeCount] = useState(0)
    const onClick = () => {
        setLike(!like);
        setLikeCount(likeCount + (like ? -1 : 1));
    }


    return (
        <>
            <button onClick={onClick}>
                <img src={like ? '/image/ハート.jpg' : '/image/like.png'} width="30px" />
            </button>
            {likeCount}
        </>
    );
}
export default LikeButton;