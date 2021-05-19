import React, { useState } from 'react';

const Profile = ({ profiles }) => (
  profiles.map((profile) => (
    <div key={profile.id} className="text-center">
      <img className="d-block mx-auto" src={`/image/${profile.profile_image_path}`} width="100px" />
      <p>{profile.user_id}</p>
      <p>{profile.name}</p>
      <p>{profile.favorite}</p>
      <p>{profile.free_writing}</p>
    </div>
  ))
)

export default Profile;