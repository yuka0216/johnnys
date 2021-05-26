import React, { useState } from 'react';
import Profile from './Profile';
import ProfileEmpty from './ProfileEmpty';

const ProfileCheck = ({ profile }) => {
  if (profile == "empty") {
    return <ProfileEmpty />
  } else {
    return <Profile profile={profile} />
  }
}

export default ProfileCheck;