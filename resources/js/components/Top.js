import React from 'react';

const Top = ({ userId }) => {
  const [profile, setProfile] = useState([]);

  useEffect(
    async () => {
      try {
        const res = await axios.get('/api/profile' + (userId))
        setPosts(res.data);
        // console.log("res", res);
      } catch (e) {
        console.log("e", e);
      }
    },
    []
  );

  return (
    <div>
      <img src={'/images/' + props.imagePath} width="100px" />
    </div>
  )
}


export default Top;