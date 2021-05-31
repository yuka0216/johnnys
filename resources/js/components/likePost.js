import axios from 'axios';

const likePost = async (post, user) => {
    try {
        return await axios.post('/api/favorite', {
            postId: post.id,
            userId: user.id
        })
    } catch (e) {
        console.log("onClickError", e);
    };
}

export default likePost;