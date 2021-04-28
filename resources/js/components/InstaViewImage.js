import React from 'react';

//imagePathを受け取って表示

const InstaViewImage = (props) => {
    return (
        <div className="col-md-3">
            <a href={'/images/' + props.imagePath} data-lightbox="group"><img src={'/images/' + props.imagePath} /></a>
        </div>
    )
}
export default InstaViewImage;