import React from 'react';
import Threads from './Threads';

const FavoriteThreads = ({ profile }) => (
    profile.favoriteThreads.map((favoriteThread) =>
        <Threads key={favoriteThread.thread_id} favoriteThread={favoriteThread} />
    ));

export default FavoriteThreads;