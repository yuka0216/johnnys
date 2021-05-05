import React from 'react';

const SearchPosts = ({ searchPosts }) => {
    console.log("searchPosts", searchPosts);
    return (
        searchPosts.map((searchPost) => {
            return (
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
            )
        })
    )
}

export default SearchPosts;