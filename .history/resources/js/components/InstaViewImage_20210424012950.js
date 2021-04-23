import React from 'react';

const InstaViewImage = (props) => {
    console.log('props', props.imagePath);
    return (
        <div>
            <a href={'/images/' + imagePath} data-lightbox="group"><img src={'/images/' + imagePath} /></a>
        </div>
    )
}
export default InstaViewImage;