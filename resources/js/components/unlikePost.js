import axios from 'axios';

const unlikePost = async (post, user) => {
    try {
        return await axios.delete('/api/favorite/' + (post.id) + '/' + (user.id), {
            post_id: post.id,
            user_id: user.id
        })
    } catch (e) {
        console.log("delError", e);
    }
}

export default unlikePost;

