import React from 'react';
import ImagePathsMap from './ImagePathsMap';
import InstaViewImage from './InstaViewImage';

const InstaViewPostIndex = (props) => {
    return (
        <div className="d-flex flex-md-wrap col-md-12">
            {
                props.post.map((post) => {
                    return (
                        <div className="col-md-3">
                            <ImagePathsMap array={post} viewImage={InstaViewImage} />
                        </div>
                    )
                })
            }
        </div>

    )
}

export default InstaViewPostIndex;