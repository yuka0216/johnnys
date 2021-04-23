import React from 'react';

const InstaViewImage = (props) => {
    console.log('props', props.imagePath);
    return (

        <a href={'/images/' + props.imagePath} data-lightbox="group"><img src={'/images/' + props.imagePath} /></a>

    )
}
export default InstaViewImage;