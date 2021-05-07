import React from 'react';
import ImagePathsMap from './ImagePathsMap';
import TwitterViewImage from './TwitterViewImage';

const SearchPosts = ({ searchPosts }) => (
    searchPosts.map((searchPost) => (
        <div className="card">
            <div className="card-body">
                <div>
                    <p>{searchPost.name}</p>
                    <p>{searchPost.comment}</p>
                    <ImagePathsMap post={searchPost} viewImage={TwitterViewImage} />
                    <p>{searchPost.created_at}</p>
                </div>
            </div>
        </div>
    ))
)


export default SearchPosts;