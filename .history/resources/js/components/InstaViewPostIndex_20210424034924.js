import React from 'react';
import ImagePathsMap from './ImagePathsMap';
import InstaViewImage from './InstaViewImage';
import 'bootstrap/dist/css/bootstrap.min.css';

const InstaViewPostIndex = (props) => {
    return (
        <ImagePathsMap post={props.post} viewImage={InstaViewImage} />
    )
}

export default InstaViewPostIndex;