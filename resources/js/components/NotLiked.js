import axios from 'axios';
import React, { useState, useEffect } from 'react';

const NotLiked = async ({ post, user }) => {
    try {
        const res = await axios.post('/api/favorite', {
            post_id: post.id,
            user_id: user.id
        })
        response => {
            console.log(response);
        }
    } catch (e) {
        console.log("onClickError", e);
    };
}

export default NotLiked;