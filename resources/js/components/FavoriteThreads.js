import React from 'react';
import Threads from './Threads';

const FavoriteThreads = ({ profile }) => {
    if (profile.favorite == null) {
        return <p>プロフィールに担当の登録をしたら関連のスレッド一覧が表示されます</p>
    } else {
        return (
            profile.favoriteThreads.map((favoriteThread) =>
                <Threads key={favoriteThread.thread_id} favoriteThread={favoriteThread} />
            ));
    }
}
export default FavoriteThreads;