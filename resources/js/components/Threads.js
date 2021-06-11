import React from 'react';

const Threads = ({ favoriteThread }) => (
    <div style={{ marginBottom: "5px" }} className="card">
        <div className="card-body">
            <p># <a href={`/snowman/talk/${favoriteThread.thread_id}`}>{favoriteThread.thread_name}スレッド</a></p>
        </div>
    </div>
)

export default Threads;