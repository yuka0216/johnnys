import React from 'react';

const SearchPosts = ({ searchPosts }) => {
    console.log("searchPosts", searchPosts);
    return (
        searchPosts.map((searchPost) => {
            return (
                <div>
                    <p>{searchPost.comment}</p>
                </div>
            )
        })
    )
}

export default SearchPosts;