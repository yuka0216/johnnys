import axios from 'axios';



const unlikePost = async (post, user) => {
    const params = {
        postId: post.id,
        userId: user.id
    };

    try {
        return await axios.delete('/api/favorite', { data: params })
    } catch (e) {
        console.log("delError", e);
    }
}

export default unlikePost;

