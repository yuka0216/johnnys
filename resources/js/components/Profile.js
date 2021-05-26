import React, { useState } from 'react';

const Profile = ({ profile }) => (
  <div className="text-center">
    <img className="d-block mx-auto" src={`/images/${profile.profile_image_path}`} width="100px" />
    <p>{profile.name}</p>
    <p>推し：{profile.favorite}</p>
    <p>{profile.free_writing}</p>
  </div>
)

export default Profile;