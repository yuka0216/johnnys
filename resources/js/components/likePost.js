import axios from 'axios';

const likePost = async (post, user) => {
    try {
        return await axios.post('/api/favorite', {
            post_id: post.id,
            user_id: user.id
        })
    } catch (e) {
        console.log("onClickError", e);
    };
}

export default likePost;