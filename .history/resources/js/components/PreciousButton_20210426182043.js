import React, { useState, useEffect } from 'react';

const PreciousButton = () => {
    const [precious, setPrecious] = useState({ count: 0, precioused: false });

    const onClick = () => {
        setLike({
            count: precious.count + (precious.precioused ? -1 : 1),
            precioused: !precious.precioused
        });
    }

    return (
        <>
            <button onClick={onClick}>
                {precious.precioused ? <img src={'/image/推しが尊い.jpg'} width="30px" /> : <img src={'/image/like.png'} width="30px" />}
            </button>
            {like.count}
        </>
    );
}
export default LikeButton;