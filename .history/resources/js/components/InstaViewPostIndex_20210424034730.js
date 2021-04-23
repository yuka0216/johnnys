import React from 'react';
import ImagePathsMap from './ImagePathsMap';
import InstaViewImage from './InstaViewImage';
import 'bootstrap/dist/css/bootstrap.min.css';

const InstaViewPostIndex = (props) => {
    return (
        <div className="d-flex flex-md-wrap col-md-12">
            <ImagePathsMap post={props.post} viewImage={InstaViewImage} />
        </div>
    )
}

export default InstaViewPostIndex;