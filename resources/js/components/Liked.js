import axios from 'axios';
import React, { useState, useEffect } from 'react';

const Liked = async ({ post, user, setLike, setLikeCount }) => {
    try {
        const del = await axios.delete('/api/favorite/' + (post.id) + '/' + (user.id), {
            post_id: post.id,
            user_id: user.id
        })
        response => {
            console.log(response)
        }
    } catch (e) {
        console.log("delError", e);
    }
}

export default Liked;

