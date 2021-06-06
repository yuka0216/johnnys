import React from 'react';
import ImagePathsMap from './ImagePathsMap';

const SearchPosts = ({ searchPosts }) => (
  searchPosts.map((searchPost) => (
    <div key={searchPost.id} className="card">
      <div className="card-body">
        <div>
          <p>{searchPost.name}@ <a href={`/snowman/talk/${searchPost.thread_id}`}>{searchPost.threadName}スレッド</a></p>
          <p>{searchPost.comment}</p>
          <ImagePathsMap post={searchPost} viewType="instagram" />
          <p>{searchPost.created_at}</p>
        </div>
      </div>
    </div>
  ))
)

export default SearchPosts;