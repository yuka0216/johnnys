import React from 'react';

const InstaViewImage = (props) => {
    return (
        <div className="col-md-3">
            <a href={'/images/' + props.imagePath} data-lightbox="group"><img src={'/images/' + props.imagePath} /></a>
        </div>
    )
}
export default InstaViewImage;