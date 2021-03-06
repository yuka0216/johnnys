import React, { useState, useEffect } from 'react';

const PreciousButton = () => {
  const [precious, setPrecious] = useState({ count: 0, precioused: false });

  const onClick = () => {
    setPrecious({
      count: precious.count + (precious.precioused ? -1 : 1),
      precioused: !precious.precioused
    });
  }

  return (
    <>
      <button onClick={onClick}>
        {precious.precioused ? <img src={'/image/推しが尊い.jpg'} width="200px" /> : <img src={'/image/ハート.jpg'} width="25px" />}
      </button>
      {precious.count}
    </>
  );
}
export default PreciousButton;